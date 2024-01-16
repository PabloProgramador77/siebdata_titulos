<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Responsable;
use App\Models\User;
use App\Models\Expedicion;
use Illuminate\Http\Request;
use App\Http\Requests\Archivo\Create;
use App\Http\Requests\Archivo\Read;
use App\Http\Requests\Archivo\Update;
use App\Http\Requests\Archivo\Delete;
use App\Http\Requests\Archivo\Download;
use XMLWriter;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if( auth()->user()->id ){

            $archivos = Archivo::all();

            return view('archivo.index', compact('archivos'));

        }else{

            return redirect('/');

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($request)
    {
        try {
            
            $xml = new XMLWriter;
            $xml->openURI( public_path('xml/'.$request->folio.'.xml') );
            $xml->setIndent( true );

            if( file_exists( public_path('xml/'.$request->folio.'.xml') ) ){

                $xml->startDocument('1.0', 'utf-8');
                    $xml->startElement('TituloElectronico');
                        $xml->writeAttribute('version', '1.0');
                        $xml->writeAttribute('folioControl', $request->folio);
                        $xml->writeAttribute('xmlns:xs', 'http://www.w3.org/2001/XMLSchema-instance');
                        $xml->writeAttribute('xmlns', 'https://www.siged.sep.gob.mx/titulos/');
                        $xml->writeAttribute('xs:schemaLocation', 'https://siged.sep.gob.mx/titulos/');

                        $responsables = Responsable::all();

                        $xml->startElement('FirmaResponsables');
                                
                            foreach( $responsables as $responsable ){

                                $xml->startElement('FirmaResponsable');
                                    $xml->writeAttribute('nombre', mb_strtoupper( $responsable->nombre, 'utf-8' ));
                                    $xml->writeAttribute('primerApellido', mb_strtoupper( $responsable->primerApellido, 'utf-8' ));
                                    
                                    if( $responsable->segundoApellido != '' ){
                                        $xml->writeAttribute('segundoApellido', mb_strtoupper( $responsable->segundoApellido, 'utf-8' ));
                                    }

                                    $xml->writeAttribute('curp', mb_strtoupper( $responsable->curp, 'utf-8' ));
                                    $xml->writeAttribute('idCargo', $responsable->cargo->id);
                                    $xml->writeAttribute('cargo', mb_strtoupper( $responsable->cargo->descripcion, 'utf-8' ));
                                    
                                    if( $responsable->titulo != '' ){
                                        $xml->writeAttribute('abrTitulo', mb_strtoupper( $responsable->titulo, 'utf-8' ));
                                    }

                                    $xml->writeAttribute('sello', $this->sello( $responsable, $request ));
                                    $xml->writeAttribute('certificadoResponsable', $responsable->certificado->noCertificado);
                                    $xml->writeAttribute('noCertificadoResponsable', $responsable->certificado->serial);
                                $xml->endElement();
                            }
                            
                        $xml->endElement();
                        
                        $ipes = User::find( auth()->user()->id );

                        $xml->startElement('Institucion');
                            $xml->writeAttribute('cveInstitucion', $ipes->clave);
                            $xml->writeAttribute('nombreInstitucion', mb_strtoupper( $ipes->name, 'utf-8' ));
                        $xml->endElement();

                        $expedicion = Expedicion::find( $request->idExpedicion );

                        $xml->startElement('Carrera');
                            $xml->writeAttribute('cveCarrera', $expedicion->alumno->carrera->clave);
                            $xml->writeAttribute('nombreCarrera', mb_strtoupper( $expedicion->alumno->carrera->nombre, 'utf-8' ));
                            $xml->writeAttribute('fechaInicio', $expedicion->alumno->fechaInicio);
                            $xml->writeAttribute('fechaTerminacion', $expedicion->alumno->fechaTermino);
                            $xml->writeAttribute('idAutorizacionReconocimiento', $expedicion->alumno->carrera->autoridad->idAutoridad);
                            $xml->writeAttribute('autorizacionReconocimiento', mb_strtoupper( $expedicion->alumno->carrera->autoridad->nombre ));
                            $xml->writeAttribute('numeroRvoe', $expedicion->alumno->carrera->rvoe);
                        $xml->endElement();

                        $xml->startElement('Profesionista');
                            $xml->writeAttribute('correoElectronico', $expedicion->alumno->email);

                            if( $expedicion->alumno->segundoApellido != '' ){
                                $xml->writeAttribute('segundoApellido', mb_strtoupper( $expedicion->alumno->segundoApellido, 'utf-8' ));
                            }
                            
                            $xml->writeAttribute('primerApellido', mb_strtoupper( $expedicion->alumno->primerApellido, 'utf-8' ));
                            $xml->writeAttribute('nombre', mb_strtoupper( $expedicion->alumno->nombre, 'utf-8' ));
                            $xml->writeAttribute('curp', $expedicion->alumno->curp);
                        $xml->endElement();

                        $xml->startElement('Expedicion');
                            $xml->writeAttribute('fechaExpedicion', $expedicion->created_at->format('Y-m-d'));
                            $xml->writeAttribute('idModalidadTitulacion', $expedicion->titulacion->idTitulacion);
                            $xml->writeAttribute('modalidadTitulacion', mb_strtoupper( $expedicion->titulacion->nombre, 'utf-8' ));

                            if( $expedicion->fechaExamen != '' ){
                                $xml->writeAttribute('fechaExamenProfesional', $expedicion->fechaExamen);
                            }

                            if( $expedicion->fechaExencion != '' ){
                                $xml->writeAttribute('fechaExencionExamenProfesional', $expedicion->fechaExencion);
                            }

                            $xml->writeAttribute('cumplioServicioSocial', $expedicion->servicioSocial);
                            $xml->writeAttribute('idFundamentoLegalServicioSocial', $expedicion->fundamento->idFundamento);
                            $xml->writeAttribute('fundamentoLegalServicioSocial', mb_strtoupper( $expedicion->fundamento->nombre, 'utf-8' ));
                            $xml->writeAttribute('idEntidadFederativa', $expedicion->entidad->idEntidad);
                            $xml->writeAttribute('entidadFederativa', mb_strtoupper( $expedicion->entidad->nombre, 'utf-8' ));
                        $xml->endElement();

                        $xml->startElement('Antecedente');
                            $xml->writeAttribute('institucionProcedencia', mb_strtoupper( $expedicion->alumno->antecedente->nombre, 'utf-8' ));
                            $xml->writeAttribute('idTipoEstudioAntecedente', $expedicion->alumno->antecedente->estudio->idEstudio);
                            $xml->writeAttribute('tipoEstudioAntecedente', mb_strtoupper( $expedicion->alumno->antecedente->estudio->nombre, 'utf-8' ));
                            $xml->writeAttribute('idEntidadFederativa', $expedicion->alumno->antecedente->entidad->idEntidad);
                            $xml->writeAttribute('entidadFederativa', mb_strtoupper( $expedicion->alumno->antecedente->entidad->nombre, 'utf-8' ));
                            $xml->writeAttribute('fechaInicio', $expedicion->alumno->antecedente->fechaInicio);
                            $xml->writeAttribute('fechaTerminacion', $expedicion->alumno->antecedente->fechaTermino);

                            if( $expedicion->alumno->antecedente->cedula != '' ){
                                $xml->writeAttribute('noCedula', $expedicion->alumno->antecedente->cedula);
                            }
                        $xml->endElement();

                    $xml->endElement();
                $xml->fullEndElement();

                return true;

            }else{

                return false;

            }

        } catch (\Throwable $th) {
            
            echo "Error: ".$th->getMessage();

            return false;

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Create $request)
    {
        try {

            if( $this->create($request) == true ){

                $archivo = Archivo::create([

                    'folio' => $request->folio,
                    'idExpedicion' => $request->idExpedicion

                ]);

                if( $archivo->id ){

                    $datos['exito'] = true;

                }

            }else{

                $datos['exito'] = false;
                $datos['mensaje'] = 'Archivo XML no creado.';

            }

        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        }

        return response()->json($datos);
    }

    /**
     * Display the specified resource.
     */
    public function show(Read $request)
    {
        try {
            
            $archivo = Archivo::find( $request->id );

            if( $archivo->id ){

                $datos['exito'] = true;
                $datos['folio'] = $archivo->folio;
                $datos['id'] = $archivo->id;
                $datos['idExpedicion'] = $archivo->idExpedicion;

            }
        
        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        }

        return response()->json($datos);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Archivo $archivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request)
    {
        try {

            $archivo = Archivo::find( $request->id );

            if( $archivo->id ){

                rename( public_path('xml/'.$archivo->folio.'.xml'), public_path('xml/'.$request->folio.'.xml'));

                $archivo = Archivo::where('id', '=', $request->id)
                    ->update([
    
                        'folio' => $request->folio
    
                    ]);

                $this->create($request);
    
                $datos['exito'] = true;

            }

        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        }

        return response()->json($datos);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delete $request)
    {
        try {
            
            $archivo = Archivo::find( $request->id );

            if( $archivo->id ){

                unlink(public_path('xml/'.$archivo->folio.'.xml'));

                if( !file_exists(public_path('xml/'.$archivo->folio.'.xml')) ){

                    $archivo->delete();

                    $datos['exito'] = true;

                }else{

                    $datos['exito'] = false;
                    $datos['mensaje'] = 'El archivo XML a borrar no existe.';

                }

            }

        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        }

        return response()->json($datos);
    }

    /**
     * Creación del sello de firma
     */
    public function sello(Responsable $responsable, $request){
        try {
            
            $cadena = '';

            $cadena.='||1.0|'.$request->folioArchivo.'|'.mb_strtoupper($responsable->curp, 'utf-8').'|'.$responsable->cargo->id.'|'.mb_strtoupper($responsable->cargo->descripcion, 'utf-8').'|'.mb_strtoupper($responsable->titulo, 'utf-8').'|';

            $ipes = User::find( auth()->user()->id );

            $cadena.=$ipes->clave.'|'.mb_strtoupper($ipes->name, 'utf-8').'|';

            $expedicion = Expedicion::find( $request->idExpedicion );

            $cadena.=$expedicion->alumno->carrera->clave.'|'.mb_strtoupper($expedicion->alumno->carrera->nombre, 'utf-8').'|'.$expedicion->alumno->fechaInicio.'|'.$expedicion->alumno->fechaTermino.'|'.$expedicion->alumno->carrera->autoridad->idAutoridad.'|'.mb_strtoupper($expedicion->alumno->carrera->autoridad->nombre, 'utf-8').'|'.$expedicion->alumno->carrera->rvoe.'|';
            $cadena.=mb_strtoupper($expedicion->alumno->curp, 'utf-8').'|'.mb_strtoupper($expedicion->alumno->nombre, 'utf-8').'|'.mb_strtoupper($expedicion->alumno->primerApellido, 'utf-8').'|'.mb_strtoupper($expedicion->alumno->segundoApellido, 'utf-8').'|'.$expedicion->alumno->email.'|';
            $cadena.=$expedicion->created_at->format('Y-m-d').'|'.$expedicion->titulacion->idTitulacion.'|'.mb_strtoupper($expedicion->titulacion->nombre, 'utf-8').'|'.$expedicion->fechaExamen.'|'.$expedicion->fechaExencion.'|'.$expedicion->servicioSocial.'|'.$expedicion->fundamento->idFundamento.'|'.mb_strtoupper($expedicion->fundamento->nombre, 'utf-8').'|'.$expedicion->entidad->idEntidad.'|'.mb_strtoupper($expedicion->entidad->nombre, 'utf-8').'|';
            $cadena.=mb_strtoupper($expedicion->alumno->antecedente->nombre, 'utf-8').'|'.$expedicion->alumno->antecedente->estudio->idEstudio.'|'.mb_strtoupper($expedicion->alumno->antecedente->estudio->nombre, 'utf-8').'|'.$expedicion->alumno->antecedente->entidad->idEntidad.'|'.mb_strtoupper($expedicion->alumno->antecedente->entidad->nombre, 'utf-8').'|'.$expedicion->alumno->antecedente->fechaInicio.'|'.$expedicion->alumno->antecedente->fechaTermino.'|'.$expedicion->alumno->antecedente->cedula.'||'; 

            openssl_sign( $cadena, $sello, $responsable->firma->firma );
            $sello = base64_encode( $sello );

            return $sello;

        } catch (\Throwable $th) {
            
            return $sello;
            
        }
    }

    /**
     * Descarga de XML
     */
    public function descarga($idArchivo){
        try {
            
            $archivo = Archivo::find( $idArchivo );

            if( $archivo->id ){

                if( file_exists( public_path( 'xml/'.$archivo->folio.'.xml' ) ) ){

                    $headers = [

                        'Content-Type' => 'application/xml',

                    ];

                    return response()->download( public_path( 'xml/'.$archivo->folio.'.xml', $archivo->folio.'.xml', $headers ) );

                }

            }

        } catch (\Throwable $th) {
            
            echo $th->getMessage();
        }

    }
}

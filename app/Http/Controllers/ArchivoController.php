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

                                    $xml->writeAttribute('sello', '');
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
}

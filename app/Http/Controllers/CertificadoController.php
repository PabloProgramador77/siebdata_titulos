<?php

namespace App\Http\Controllers;

use App\Models\Certificado;
use App\Models\Responsable;
use Illuminate\Http\Request;
use App\Http\Requests\Certificado\Validar;
use App\Http\Requests\Certificado\Store;

class CertificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Validar $request)
    {
        try {
            
            if( $request->file('archivo')->getClientOriginalExtension() === 'cer' ){

                $datos['exito'] = true;

            }else{

                $datos['exito'] = false;
                $datos['mensaje'] = 'Archivo no valido/permitido.';

            }

        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        }

        return response()->json($datos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request)
    {
        try {
            
            if( $this->archivar( $request ) == true ){

                if( $this->descrifrar( $request ) == true ){

                    if( $this->serial( $request ) == true ){

                        if( $this->certificado( $request ) == true ){

                            $certificado = Certificado::create([

                                'nombre' => $request->file('archivo')->getClientOriginalName(),
                                'serial' => session()->get('serial'),
                                'noCertificado' => session()->get('certificado'),
                                'idResponsable' => $request->id

                            ]);

                            if( $certificado->id ){

                                $datos['exito'] = true;
                                
                                session()->forget('serial');
                                session()->forget('certificado');

                            }

                        }else{

                            $datos['exito'] = false;
                            $datos['mensaje'] = 'No fue posible obtener el certificado. Intenta de nuevo.';

                        }

                    }else{

                        $datos['exito'] = false;
                        $datos['mensaje'] = 'No fue posible obtener el serial. Intenta de nuevo.';

                    }

                }else{

                    $datos['exito'] = false;
                    $datos['mensaje'] = 'No fue posible descifrar el archivo. Intenta de nuevo.';

                }

            }else{

                $datos['exito'] = false;
                $datos['mensaje'] = 'No se logró almacenar el archivo. Intenta de nuevo.';

            }

        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mnesaje'] = $th->getMessage();

        }

        return response()->json($datos);
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificado $certificado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificado $certificado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificado $certificado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificado $certificado)
    {
        //
    }

    /**
     * Archivo de CER
     * @param Request file
     * @return boolean
     */
    public function archivar($request){
        try {
            
            if( file_exists( public_path('files') ) ){

                $request->file('archivo')->move('files', $request->file('archivo')->getClientOriginalName());

                return true;

            }else{

                mkdir( public_path('files'), 0777, true );

                $request->file('archivo')->move('files', $request->file('archivo')->getClientOriginalName());

                return true;

            }

        } catch (\Throwable $th) {
            
            return false;

        }
    }

    /**
     * Descifrado de CER
     * @param Request file
     * @return boolean
     */
    public function descrifrar($request){
        try {

            $archivoCer = $request->file('archivo')->getClientOriginalName();

            shell_exec( public_path('openssl-1.0.2p/bin/openssl x509 -inform DER -in '.public_path('files/'.$archivoCer).' -outform PEM -out '.public_path('files/'.$archivoCer).'.pem'));

            if( file_exists( public_path('files/'.$archivoCer.'.pem') ) ){

                return true;

            }else{

                return false;

            }

        } catch (\Throwable $th) {
            
            return false;

        }
    }

    /**
     * Obtniendo serial del certificado descifrado
     * @param Request 
     * @return boolean
     */
    public function serial( $request ){
        try {
            
            $serial = '';
            $noCer = '';
            $i = 0;
            $archivoCer = $request->file('archivo')->getClientOriginalName();

            $noCer = shell_exec( public_path('openssl-1.0.2p/bin/openssl x509 -text -inform PEM -in '.public_path('files/'.$archivoCer.'.pem -noout -serial')));

            if( $noCer == '' ){

                return false;

            }else{

                $i = strpos($noCer, 'serial=');
                $noCer= substr($noCer, $i+7);
                $noCer = trim($noCer);
                $serial = mb_eregi_replace('[\n|\r|\r\n|\t]', '', $noCer);

                if( $serial == '' ){

                    return false;

                }else{

                    session()->put('serial', $serial);

                    return true;

                }

            }

        } catch (\Throwable $th) {
            
            return false;

        }
    }

    /**
     * Obteniendo certificado del descrifado
     * @param Request
     * @return boolean
     */
    public function certificado( $request ){
        try {
            
            $certificado = '';
            $i = 0;
            $f = 0;
            $archivoCer = $request->file('archivo')->getClientOriginalName();

            $certificado = shell_exec( public_path('openssl-1.0.2p/bin/openssl x509 -text -inform PEM -in '.public_path('files/'.$archivoCer.'.pem')) );

            $i = strpos($certificado, 'BEGIN CERTIFICATE');
            $f = strpos($certificado, 'END CERTIFICATE');
            $certificado = substr($certificado, $i+22, (int)($f-6)-($i+22));
            $certificado = trim($certificado);
            $certificado = mb_ereg_replace('[\n|\r|\r\n|\t]', '', $certificado);

            if( $certificado == '' ){

                return false;

            }else{

                session()->put('certificado', $certificado);

                return true;

            }

        } catch (\Throwable $th) {
            
            return false;

        }
    }
}

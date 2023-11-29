<?php

namespace App\Http\Controllers;

use App\Models\Firma;
use Illuminate\Http\Request;
use App\Http\Requests\Firma\Validar;
use App\Http\Requests\Firma\Store;
use Illuminate\Support\Facades\Hash;

class FirmaController extends Controller
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
            
            if( $request->file('archivo')->getClientOriginalExtension() == 'key' ){

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

                if( $this->descifrar( $request ) == true ){

                    if( $this->firma( $request ) == true ){

                        $firma = Firma::create([

                            'nombre' => $request->file('archivo')->getClientOriginalName(),
                            'firma' => session()->get('firma'),
                            'passwordFirma' => Hash::make( $request->password ),
                            'idResponsable' => $request->id

                        ]);

                        if( $firma->id ){

                            $datos['exito'] = true;

                            session()->forget('firma');

                        }

                    }else{

                        $datos['exito'] = false;
                        $datos['mensaje'] = 'No se logró extraer la firma. Intenta de nuevo.';

                    }

                }else{

                    $datos['exito'] = false;
                    $datos['mensaje'] = 'No se logró descifrar la firma. Intenta de nuevo.';

                }

            }else{

                $datos['exito'] = false;
                $datos['mensaje'] = 'No se logró almacenar el archivo. Intenta de nuevo.';

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
    public function show(Firma $firma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Firma $firma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Firma $firma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Firma $firma)
    {
        //
    }

    /**
     * Archivando KEY
     * @param Request
     * @return boolean
     */
    public function archivar( $request ){
        try {
            
            if( file_exists( public_path('files') ) ){

                $request->file('archivo')->move('files', $request->file('archivo')->getClientOriginalName() );

                return true;

            }else{

                mdkir( public_path('files'), 0777, true );

                $request->file('archivo')->move('files', $request->file('archivo')->getClientOriginalName() );

                return true;

            }

        } catch (\Throwable $th) {
            
            return false;

        }
    }

    /**
     * Descifrando KEY
     * @param Request
     * @return boolean
     */
    public function descifrar( $request ){
        try {
            
            $archivoKey = $request->file('archivo')->getClientOriginalName();

            shell_exec( public_path('openssl-1.0.2p/bin/openssl pkcs8 -inform DER -in '.public_path('files/'.$archivoKey.' -outform PEM -out '.public_path('files/'.$archivoKey.'.pem -passin pass:'.$request->password))) );

            if( file_exists(public_path('files/'.$archivoKey.'.pem')) ){

                return true;

            }else{

                return false;

            }

        } catch (\Throwable $th) {
            
            return false;

        }
    }

    /**
     * Extraer firma de KEY
     * @param Request
     * @return boolean
     */
    public function firma( $request ){
        try {
            
            $firma = '';

            $archivoKey = $request->file('archivo')->getClientOriginalName();
            
            $firma = shell_exec(public_path('openssl-1.0.2p/bin/openssl rsa -inform PEM -outform PEM -in '.public_path('files/'.$archivoKey.'.pem')));

            if( $firma == '' ){

                return false;

            }else{

                session()->put('firma', $firma);

                return true;

            }

        } catch (\Throwable $th) {
            
            return false;

        }
    }
}

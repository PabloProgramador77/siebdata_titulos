<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
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

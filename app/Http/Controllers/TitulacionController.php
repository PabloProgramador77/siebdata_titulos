<?php

namespace App\Http\Controllers;

use App\Models\Titulacion;
use Illuminate\Http\Request;
use App\Http\Requests\Titulacion\Create;
use App\Http\Requests\Titulacion\Read;
use App\Http\Requests\Titulacion\Update;
use App\Http\Requests\Titulacion\Delete;

class TitulacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if( auth()->user()->id ){

            $titulaciones = Titulacion::all();

            return view('titulacion.index', compact('titulaciones'));

        }else{

            return redirect('/');

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Create $request)
    {
        try {
            
            $titulacion = Titulacion::create([

                'idTitulacion' => $request->idTitulacion,
                'nombre' => $request->nombre

            ]);

            if( $titulacion->id ){

                $datos['exito'] = true;

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
            
            $titulacion = Titulacion::find($request->id);

            if( $titulacion->id ){
                
                $datos['exito'] = true;
                $datos['nombre'] = $titulacion->nombre;
                $datos['idTitulacion'] = $titulacion->idTitulacion;
                $datos['id'] = $titulacion->id;

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
    public function edit(Titulacion $titulacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request)
    {
        try {
            
            $titulacion = Titulacion::where('id', '=', $request->id)
                ->update([

                    'idTitulacion' => $request->idTitulacion,
                    'nombre' => $request->nombre

                ]);

            $datos['exito'] = true;

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
            
            $titulacion = Titulacion::find($request->id);

            if( $titulacion->id ){

                $titulacion->delete();

                $datos['exito'] = true;

            }

        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        }

        return response()->json($datos);
    }
}

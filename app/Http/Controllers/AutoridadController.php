<?php

namespace App\Http\Controllers;

use App\Models\Autoridad;
use Illuminate\Http\Request;
use App\Http\Requests\Autoridad\Create;
use App\Http\Requests\Autoridad\Read;
use App\Http\Requests\Autoridad\Update;
use App\Http\Requests\Autoridad\Delete;

class AutoridadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if( auth()->user()->id ){

            $autoridades = Autoridad::all();

            return view('autoridad.index', compact('autoridades'));

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
            
            $autoridad = Autoridad::create([

                'idAutoridad' => $request->idAutoridad,
                'nombre' => $request->nombre

            ]);

            if( $autoridad->id ){

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
            
            $autoridad = Autoridad::find($request->id);

            if( $autoridad->id ){

                $datos['exito'] = true;
                $datos['idAutoridad'] = $autoridad->idAutoridad;
                $datos['nombre'] = $autoridad->nombre;
                $datos['id'] = $autoridad->id;

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
    public function edit(Autoridad $autoridad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request)
    {
        try {
            
            $autoridad = Autoridad::where('id', '=', $request->id)
                ->update([

                    'idAutoridad' => $request->idAutoridad,
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
            
            $autoridad = Autoridad::find($request->id);

            if( $autoridad->id ){

                $autoridad->delete();

                $datos['exito'] = true;

            }

        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        }

        return response()->json($datos);
    }
}

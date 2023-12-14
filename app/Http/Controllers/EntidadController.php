<?php

namespace App\Http\Controllers;

use App\Models\Entidad;
use Illuminate\Http\Request;
use App\Http\Requests\Entidad\Create;
use App\Http\Requests\Entidad\Read;
use App\Http\Requests\Entidad\Update;
use App\Http\Requests\Entidad\Delete;

class EntidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if( auth()->user()->id ){

            $entidades = Entidad::all();

            return view('entidad.index', compact('entidades'));

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
            
            $entidad = Entidad::create([

                'idEntidad' => $request->idEntidad,
                'nombre' => $request->nombre

            ]);

            if( $entidad->id ){

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
            
            $entidad = Entidad::find($request->id);

            if( $entidad->id ){

                $datos['exito'] = true;
                $datos['idEntidad'] = $entidad->idEntidad;
                $datos['nombre'] = $entidad->nombre;
                $datos['id'] = $entidad->id;

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
    public function edit(Entidad $entidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request)
    {
        try {
            
            $entidad = Entidad::where('id', '=', $request->id)
                ->update([

                    'idEntidad' => $request->idEntidad,
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
            
            $entidad = Entidad::find($request->id);

            if( $entidad->id ){

                $entidad->delete();

                $datos['exito'] = true;

            }

        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        }

        return response()->json($datos);
    }
}

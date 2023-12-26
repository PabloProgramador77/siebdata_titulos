<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Autoridad;
use Illuminate\Http\Request;
use App\Http\Requests\Carrera\Create;
use App\Http\Requests\Carrera\Read;
use App\Http\Requests\Carrera\Update;
use App\Http\Requests\Carrera\Delete;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if( auth()->user()->id ){

            $carreras = Carrera::all();
            $autoridades= Autoridad::all();

            return view('carrera.index', compact('carreras', 'autoridades'));

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
            
            $carrera = Carrera::create([

                'nombre' => $request->nombre,
                'rvoe' => $request->rvoe,
                'clave' => $request->clave,
                'idAutoridad' => $request->autoridad

            ]);

            if( $carrera->id ){

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
            
            $carrera = Carrera::find($request->id);

            if( $carrera->id ){

                $datos['exito'] = true;
                $datos['id'] = $carrera->id;
                $datos['nombre'] = $carrera->nombre;
                $datos['rvoe'] = $carrera->rvoe;
                $datos['clave'] = $carrera->clave;
                $datos['idAutoridad'] = $carrera->autoridad->id;
                $datos['autoridad'] = $carrera->autoridad->nombre;

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
    public function edit(Carrera $carrera)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request)
    {
        try {
            
            $carrera = Carrera::where('id', '=', $request->id)
                ->update([

                    'nombre' => $request->nombre,
                    'rvoe' => $request->rvoe,
                    'clave' => $request->clave,
                    'idAutoridad' => $request->autoridad

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
            
            $carrera = Carrera::find($request->id);

            if( $carrera->id ){

                $carrera->delete();

                $datos['exito'] = true;

            }

        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        }

        return response()->json($datos);
    }
}

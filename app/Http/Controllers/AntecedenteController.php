<?php

namespace App\Http\Controllers;

use App\Models\Antecedente;
use Illuminate\Http\Request;
use App\Http\Requests\Antecedente\Create;
use App\Http\Requests\Antecedente\Read;
use App\Http\Requests\Antecedente\Update;

class AntecedenteController extends Controller
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
            
            $antecedente = Antecedente::create([

                'nombre' => $request->nombre,
                'fechaInicio' => $request->fechaInicio,
                'fechaTermino' => $request->fechaTermino,
                'idAlumno' => $request->alumno,
                'idEstudio' => $request->estudio,
                'idEntidad' => $request->entidad,
                'cedula' => $request->cedula

            ]);

            if( $antecedente->id ){

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
            
            $antecedente = Antecedente::find( $request->id );

            if( $antecedente->id ){

                $datos['exito'] = true;
                $datos['nombre'] = $antecedente->nombre;
                $datos['fechaInicio'] = $antecedente->fechaInicio;
                $datos['fechaTermino'] = $antecedente->fechaTermino;
                $datos['cedula'] = $antecedente->cedula;
                $datos['idEstudio'] = $antecedente->idEstudio;
                $datos['estudio'] = $antecedente->estudio->nombre;
                $datos['idEntidad'] = $antecedente->idEntidad;
                $datos['entidad'] = $antecedente->entidad->nombre;
                $datos['id'] = $antecedente->id;

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
    public function edit(Antecedente $antecedente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request)
    {
        try {
            
            $antecedente = Antecedente::where('id', '=', $request->id)
                ->update([

                    'nombre' => $request->nombre,
                    'fechaInicio' => $request->fechaInicio,
                    'fechaTermino' => $request->fechaTermino,
                    'idEstudio' => $request->estudio,
                    'idEntidad' => $request->entidad,
                    'cedula' => $request->cedula

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
    public function destroy(Antecedente $antecedente)
    {
        //
    }
}

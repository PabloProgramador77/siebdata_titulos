<?php

namespace App\Http\Controllers;

use App\Models\Expedicion;
use App\Models\Alumno;
use App\Models\Fundamento;
use App\Models\Titulacion;
use App\Models\Entidad;
use Illuminate\Http\Request;
use App\Http\Requests\Expedicion\Create;
use App\Http\Requests\Expedicion\Read;
use App\Http\Requests\Expedicion\Update;
use App\Http\Requests\Expedicion\Delete;

class ExpedicionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if( auth()->user()->id ){

            $expediciones = Expedicion::all();
            $alumnos = Alumno::all();
            $fundamentos = Fundamento::all();
            $titulaciones = Titulacion::all();
            $entidades = Entidad::all();

            return view('expedicion.index', compact('expediciones', 'alumnos', 'fundamentos', 'titulaciones', 'entidades'));

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
            
            $expedicion = Expedicion::create([

                'servicioSocial' => $request->servicio,
                'idFundamento' => $request->fundamento,
                'idAlumno' => $request->alumno,
                'idTitulacion' => $request->titulacion,
                'idEntidad' => $request->entidad,
                'fechaExamen' => $request->fechaExamen,
                'fechaExencion' => $request->fechaExencion

            ]);

            if( $expedicion->id ){

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
            
            $expedicion = Expedicion::find( $request->id );

            if( $expedicion->id ){

                $datos['exito'] = true;
                $datos['id'] = $expedicion->id;
                $datos['servicio'] = $expedicion->servicioSocial;
                $datos['idAlumno'] = $expedicion->alumno->id;
                $datos['nombreAlumno'] = $expedicion->alumno->nombre;
                $datos['primerApellido'] = $expedicion->alumno->primerApellido;
                $datos['segundoApellido'] = $expedicion->alumno->segundoApellido;
                $datos['idFundamento'] = $expedicion->fundamento->id;
                $datos['nombreFundamento'] = $expedicion->fundamento->nombre;
                $datos['idTitulacion'] = $expedicion->titulacion->id;
                $datos['nombreTitulacion'] = $expedicion->titulacion->nombre;
                $datos['idEntidad'] = $expedicion->entidad->id;
                $datos['nombreEntidad'] = $expedicion->entidad->nombre;
                $datos['fechaExamen'] = $expedicion->fechaExamen;
                $datos['fechaExencion'] = $expedicion->fechaExencion;

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
    public function edit(Expedicion $expedicion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request)
    {
        try {
            
            $expedicion = Expedicion::where('id', '=', $request->id)
                ->update([

                    'servicioSocial' => $request->servicio,
                    'idFundamento' => $request->fundamento,
                    'idAlumno' => $request->alumno,
                    'idTitulacion' => $request->titulacion,
                    'idEntidad' => $request->entidad,
                    'fechaExamen' => $request->fechaExamen,
                    'fechaExencion' => $request->fechaExencion

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
            
            $expedicion = Expedicion::find( $request->id );

            if( $expedicion->id ){

                $expedicion->delete();

                $datos['exito'] = true;

            }

        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        }

        return response()->json($datos);
    }
}

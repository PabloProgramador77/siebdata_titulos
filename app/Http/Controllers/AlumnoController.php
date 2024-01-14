<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Estudio;
use App\Models\Entidad;
use Illuminate\Http\Request;
use App\Http\Requests\Alumno\Create;
use App\Http\Requests\Alumno\Read;
use App\Http\Requests\Alumno\Update;
use App\Http\Requests\Alumno\Delete;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if( auth()->user()->id ){

            $alumnos = Alumno::all();
            $carreras = Carrera::all();
            $estudios = Estudio::all();
            $entidades = Entidad::all();

            return view('alumno.index', compact('alumnos', 'carreras', 'estudios', 'entidades'));

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
            
            $alumno = Alumno::create([

                'nombre' => $request->nombre,
                'primerApellido' => $request->primerApellido,
                'segundoApellido' => $request->segundoApellido,
                'curp' => $request->curp,
                'email' => $request->email,
                'idCarrera' => $request->idCarrera,
                'fechaInicio' => $request->fechaInicio,
                'fechaTermino' => $request->fechaTermino

            ]);

            if( $alumno->id ){

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
            
            $alumno = Alumno::find($request->id);

            if( $alumno->id ){

                $datos['exito'] = true;
                $datos['nombre'] = $alumno->nombre;
                $datos['primerApellido'] = $alumno->primerApellido;
                $datos['segundoApellido'] = $alumno->segundoApellido;
                $datos['curp'] = $alumno->curp;
                $datos['email'] = $alumno->email;
                $datos['idCarrera'] = $alumno->idCarrera;
                $datos['carrera'] = $alumno->carrera->nombre;
                $datos['fechaInicio'] = $alumno->fechaInicio;
                $datos['fechaTermino'] = $alumno->fechaTermino;
                $datos['id'] = $alumno->id;

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
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request)
    {
        try {
            
            $alumno = Alumno::where('id', '=', $request->id)
                ->update([

                    'nombre' => $request->nombre,
                    'primerApellido' => $request->primerApellido,
                    'segundoApellido' => $request->segundoApellido,
                    'curp' => $request->curp,
                    'email' => $request->email,
                    'idCarrera' => $request->idCarrera,
                    'fechaInicio' => $request->fechaInicio,
                    'fechaTermino' => $request->fechaTermino

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
            
            $alumno = Alumno::find($request->id);

            if( $alumno->id ){

                $alumno->delete();

                $datos['exito'] = true;

            }

        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        }

        return response()->json($datos);
    }
}

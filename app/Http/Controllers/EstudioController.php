<?php

namespace App\Http\Controllers;

use App\Models\Estudio;
use Illuminate\Http\Request;
use App\Http\Requests\Estudio\Create;
use App\Http\Requests\Estudio\Read;
use App\Http\Requests\Estudio\Update;
use App\Http\Requests\Estudio\Delete;

class EstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if( auth()->user()->id ){

            $estudios = Estudio::all();

            return view('estudio.index', compact('estudios'));

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
            
            $estudio = Estudio::create([

                'idEstudio' => $request->idEstudio,
                'nombre' => $request->nombre

            ]);

            if( $estudio->id ){

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
            
            $estudio = Estudio::find($request->id);

            if( $estudio->id ){

                $datos['exito'] = true;
                $datos['id'] = $estudio->id;
                $datos['idEstudio'] = $estudio->idEstudio;
                $datos['nombre'] = $estudio->nombre;

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
    public function edit(Estudio $estudio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request)
    {
        try {
            
            $estudio = Estudio::where('id', '=', $request->id)
                ->update([

                    'idEstudio' => $request->idEstudio,
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
            
            $estudio = Estudio::find($request->id);

            if( $estudio->id ){

                $estudio->delete();

                $datos['exito'] = true;

            }

        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        }

        return response()->json($datos);
    }
}

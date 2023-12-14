<?php

namespace App\Http\Controllers;

use App\Models\Fundamento;
use Illuminate\Http\Request;
use App\Http\Requests\Fundamento\Create;
use App\Http\Requests\Fundamento\Read;
use App\Http\Requests\Fundamento\Update;
use App\Http\Requests\Fundamento\Delete;

class FundamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if( auth()->user()->id ){

            $fundamentos = Fundamento ::all();

            return view('fundamento.index', compact('fundamentos'));

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
            
            $fundamento = Fundamento::create([

                'idFundamento' => $request->idFundamento,
                'nombre' => $request->nombre

            ]);

            if( $fundamento->id ){

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
            
            $fundamento = Fundamento::find($request->id);

            if( $fundamento->id ){

                $datos['exito'] = true;
                $datos['id'] = $fundamento->id;
                $datos['idFundamento'] = $fundamento->idFundamento;
                $datos['nombre'] = $fundamento->nombre;

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
    public function edit(Fundamento $fundamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request)
    {
        try {
            
            $fundamento = Fundamento::where('id', '=', $request->id)
                ->update([

                    'idFundamento' => $request->idFundamento,
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
            
            $fundamento = Fundamento::find($request->id);

            if( $fundamento->id ){

                $fundamento->delete();

                $datos['exito'] = true;

            }

        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        }

        return response()->json($datos);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use App\Models\Cargo;
use Illuminate\Http\Request;
use App\Http\Requests\Responsable\Store;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            
            if( auth()->user()->id ){

                $responsables = Responsable::orderBy('updated_at', 'desc')
                    ->get();

                $cargos = Cargo::orderBy('id', 'asc')->get();

                return view('responsable.index', compact('responsables', 'cargos'));

            }

        } catch (\Throwable $th) {
            
            echo $th->getMessage();

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
    public function store(Store $request)
    {
        try {
            
            $responsable = Responsable::create([

                'nombre' => $request->nombre,
                'primerApellido' => $request->primerApellido,
                'segundoApellido' => $request->segundoApellido,
                'curp' => $request->curp,
                'titulo' => $request->titulo,
                'idCargo' =>$request->cargo

            ]);

            if( $responsable->id ){

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
    public function show(Responsable $responsable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Responsable $responsable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Responsable $responsable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Responsable $responsable)
    {
        //
    }
}

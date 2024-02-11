<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Permisos\Create;
use App\Http\Requests\Permisos\Read;
use App\Http\Requests\Permisos\Update;
use App\Http\Requests\Permisos\Delete;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if( auth()->user()->id ){

            $permisos = Permission::all();

            return view('permisos.index', compact('permisos'));

        }else{

            return redirect('/permisos');

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
            
            $permiso = Permission::create([

                'name' => $request->nombre,
                'guard' => 'web',

            ]);

            $datos['exito'] = true;

        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        }

        return response()->json( $datos );
    }

    /**
     * Display the specified resource.
     */
    public function show(Read $request)
    {
        try {
            
            $permiso = Permission::find( $request->id );

            if( $permiso->id ){

                $datos['exito'] = true;
                $datos['nombre'] = $permiso->name;
                $datos['id'] = $permiso->id;

            }

        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        }

        return response()->json( $datos );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request)
    {
        try {
            
            $permiso = Permission::find( $request->id );

            if( $permiso->id ){

                $permiso = Permission::where('id', '=', $request->id)
                    ->update([

                        'name' => $request->nombre

                    ]);

                $datos['exito'] = true;

            }

        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        }

        return response()->json( $datos );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delete $request)
    {
        try {
            
            $permiso = Permission::find( $request->id );

            if( $permiso->id ){

                $permiso->delete();

                $datos['exito'] = true;

            }

        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        }

        return response()->json($datos);
    }
}

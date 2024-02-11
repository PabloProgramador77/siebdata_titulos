<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Roles\Create;
use App\Http\Requests\Roles\Read;
use App\Http\Requests\Roles\Update;
use App\Http\Requests\Roles\Delete;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if( auth()->user()->id ){

            $roles = Role::all();

            return view('roles.index', compact('roles'));

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
            
            $rol = Role::create([

                'name' => $request->nombre,
                'guard' => 'web'

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
            
            $rol = Role::find( $request->id );

            if( $rol->id ){

                $datos['exito'] = true;
                $datos['nombre'] = $rol->name;
                $datos['id'] = $rol->id;

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
            
            $rol = Role::find( $request->id );

            if( $rol->id ){

                $rol = Role::where('id', '=', $request->id)
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
            
            $rol = Role::find( $request->id );

            if( $rol->id ){

                $rol->delete();

                $datos['exito'] = true;

            }

        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        }

        return response()->json( $datos );
    }
}

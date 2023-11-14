<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UpdateUser;

class UserController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        try {
            
            if( auth()->user()->id ){

                $user = User::find( auth()->user()->id );

                return view('profile', compact('user'));

            }

        } catch (\Throwable $th) {
            
            echo "Fatal Error: ".$th->getMessage();

        }
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
    public function update(UpdateUser $request)
    {
        try {

            if( $request->password != '' ){

                $user = User::where('id', '=', $request->id)
                ->update([

                    'name' => $request->name,
                    'clave' => $request->clave,
                    'email' => $request->email,
                    'password' => Hash::make( $request->password )

                ]);

            }else{

                $user = User::where('id', '=', $request->id)
                ->update([

                    'name' => $request->name,
                    'clave' => $request->clave,
                    'email' => $request->email

                ]);

            }

            $datos['exito'] = true;
            
        } catch (\Throwable $th) {
            
            $datos['exito'] = false;
            $datos['mensaje'] = $th->getMessage();

        } catch(\Illuminate\Database\QueryException $e){

            $datos['exito'] = false;
            $datos['mensaje'] = $e->getMessage();

        }

        return response()->json( $datos );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

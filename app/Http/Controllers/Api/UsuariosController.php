<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuarios::where('email', '<>', 'admin@procu.tlx') -> get();
        return $usuarios;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = [
            'nombre' => 'required|string|min:5',
            'email' => 'required|email|',
            'password' => 'required|string'
        ];
        $this -> validate($request, $datos);
            $dato = new Usuarios;
            $dato -> name = $request -> nombre;
            $dato -> email = $request -> email;
            $dato -> password = Crypt::encryptString($request -> password);
            $dato -> save();

            return response("creado", 200) -> header('Content-Type', 'application/json');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Usuarios::findOrFail(Auth::id());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = [
            'nombre' => 'required|string|min:5',
            'email' => 'required|email|'
        ];

        $this -> validate($request, $datos);
            $dato = Usuarios::findOrFail($id);
            $dato -> name = $request -> name; 
            $dato -> email = $request -> email; 
            $dato -> save();

            return response("actualizado", 200) -> header('Content-Type', 'application/json');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dato = Usuarios::where('id',$id) -> delete();

        return response("Eliminado", 200) -> header('Content-Type', 'application/json');
    }

    public function clave(Request $request, $id)
    {
        $dato = Usuarios::findOrFail($id);
        $dato -> password = Crypt::encryptString($request -> password);
        $dato -> save();

        return response("Cambiado", 200) -> header('Content-Type', 'application/json');
    }

    public function passwordUpdate(Request $request, $id){
        $dato = Usuarios::findOrFail($id);
        $reglas = [
            'password'  => 'required|string|min:6'
        ];
        $mensajes = [
            'password.required'     => 'Password requerida',
            'passwordNew.required'  => 'Password requerida',
            'passwordNew.min'       => 'Password debe tener al menos 6 caracteres'
        ];
        $this -> validate($request, $reglas, $mensajes);

        if(Hash::check($request['password'], $dato -> password)){
            $dato -> password = Crypt::encryptString($request -> passwordNew);
            $dato -> save();
        }else{
            return response(['message' => 'La contraseña actual no coincide'], 500) -> header('Co0ntent-Type', 'application/json');
        }

        return response('Contraseña actualizada', 200) -> header('Content-Type', 'application/json');
    }
}

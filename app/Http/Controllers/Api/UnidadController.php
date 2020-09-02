<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dependencias;
use App\Models\Usuarios;

class UnidadController extends Controller
{
    
    public function index()
    {
        $usuarios = Usuarios::where('id', '>', 1)->get();
        dump($usuarios);
        return view('registros.unidad', ['usuarios' => $usuarios]);
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $datos = [
            'nombre' => 'required',
            'id' => 'required'
        ];
        $this -> validate($request, $datos);
        $dato = new Dependencias;
        $dato -> nombre = $request -> nombre;
        $dato -> usuario_id = $request -> id;
        $dato -> save();

        return redirect('/dev/registrar_victimas');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}

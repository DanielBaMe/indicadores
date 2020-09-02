<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Models\Denuncias;
use App\Models\Indicadores;
use Auth;

class DenunciasController extends Controller
{
    public function index(){
        $denuncias = Denuncias::all();
        return $denuncias;
    }

    public function store(Request $request, $id){
        $datos = [
            'denuncias' => 'required',
            'querellas' => 'required',
            'total' => 'required'
        ];
        $this -> validate($request, $datos);
        $indicador = Indicadores::where('id_usuario', $id)->latest()->first();
        $dato = new Denuncias;
        $dato -> denuncias = $request -> denuncias;
        $dato -> querellas = $request -> querellas;
        $dato -> total = $request -> total;
        $indicador->denuncias()->save($dato);

        return redirect('/dev/registrar_victimas');
    }

    public function update(Request $request, $id){
        $datos = [
            'denuncias' => 'required',
            'querellas' => 'required',
            'total' => 'required'
        ];
        $this -> validate($request, $datos);

        $dato = Denuncias::findOrFail($id);
        $dato -> denuncias = $request -> denuncias;
        $dato -> querellas = $request -> querellas;
        $dato -> total = $request -> total;
        $dato -> save();

        return response("ok", 200) -> header('Content-Type', 'application/json');
    }

    public function show($id){
        $dato = Denuncias::findOrFail($id);
        return $dato;
    }
}

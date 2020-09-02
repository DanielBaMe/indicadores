<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Models\Victimas;
use App\Models\Indicadores;
use Auth;

class VictimasController extends Controller
{
    public function index(){
        $victimas = Victimas::all();
        return $victimas;
    }

    public function store(Request $request, $id){
        $datos = [
            'hombreas' => 'required',
            'mujeres' => 'required',
            'total' => 'required'
        ];
        $this -> validate($request, $datos);
        $indicador = Indicadores::where('id_usuario', $id)->latest()->first();
        $dato = new Victimas;
        $dato -> hombreas = $request -> hombreas;
        $dato -> mujeres = $request -> mujeres;
        $dato -> total = $request -> total;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  

        return redirect('/dev/registrar_carpetas');
    }

    public function update(Request $request, $id){
        $datos = [
            'hombreas' => 'required',
            'mujeres' => 'mujeres',
            'total' => 'required'
        ];
        $this -> validate($request, $datos);

        $dato = Victimas::findOrFail($id);
        $dato -> hombreas = $request -> hombreas;
        $dato -> mujeres = $request -> mujeres;
        $dato -> total = $request -> total;
        $dato -> save();

        return response("ok", 200) -> header('Content-Type', 'application/json');
    }

    public function show($id){
        $dato = Victimas::findOrFail($id);
        return $dato;
    }
}

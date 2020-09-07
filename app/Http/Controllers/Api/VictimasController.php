<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Models\Victimas;
use App\Models\Indicadores;
use App\Models\Dependencias;
use Auth;

class VictimasController extends Controller
{
    public function index()
    {
        $victimas = Victimas::all();
        return $victimas;
    }

    public function store(Request $request, $id)
    {
        $datos = [
            'hombres' => 'required|integer|min:1',
            'mujeres' => 'required|integer|min:1',
            'otros'   => 'required|integer|min:1'
        ];
        $this->validate($request, $datos);

        $unidad = Dependencias::where('usuario_id', $id)->get();
        $prueba = $unidad[0];
        $id_dependencia = $prueba['id'];

        $indicador = Indicadores::where('id_dependencia', $id_dependencia)->latest()->first();

        $suma = $request->denuncias + $request->querellas;

        $dato = new Victimas;
        $dato->hombres = $request->hombres;
        $dato->mujeres = $request->mujeres;
        $dato->otros = $request->otros;
        $dato->total = $suma;

        $indicador->victimas()->save($dato);
        return redirect('/dev/registrar_carpetas');
    }

    public function update(Request $request, $id)
    {
        $datos = [
            'hombreas' => 'required',
            'mujeres' => 'mujeres',
            'total' => 'required'
        ];
        $this->validate($request, $datos);

        $dato = Victimas::findOrFail($id);
        $dato->hombreas = $request->hombreas;
        $dato->mujeres = $request->mujeres;
        $dato->total = $request->total;
        $dato->save();

        return response("ok", 200)->header('Content-Type', 'application/json');
    }

    public function show($id)
    {
        $dato = Victimas::findOrFail($id);
        return $dato;
    }
}

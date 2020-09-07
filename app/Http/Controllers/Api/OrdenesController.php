<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Models\Ordenes;
use App\Models\Indicadores;
use App\Models\Dependencias;
use Auth;

class OrdenesController extends Controller
{
    public function index()
    {
        $ordenes = Ordenes::all();
        return $ordenes;
    }

    public function store(Request $request, $id)
    {
        $datos = [
            'imputados'         => 'required|integer|min:1',
            'juez'              => 'required|integer|min:1',
            'ordcumplicados'    => 'required|integer|min:1',
            'ordurgentes'       => 'required|integer|min:1',
            'urgentescumplicas' => 'required|integer|min:1'
        ];
        $this->validate($request, $datos);

        $unidad = Dependencias::where('usuario_id', $id)->get();
        $prueba = $unidad[0];
        $id_dependencia = $prueba['id'];

        $indicador = Indicadores::where('id_dependencia', $id_dependencia)->latest()->first();

        $suma = $request->denuncias + $request->querellas;

        $dato = new Ordenes;
        $dato->imputados = $request->imputados;
        $dato->juez_control = $request->juez;
        $dato->ordenes_cumplidas = $request->ordcumplicados;
        $dato->ordenes_urgentes = $request->ordurgentes;
        $dato->urgentes_cumplidas = $request->urgentescumplicas;
        $dato->total = $suma;

        $indicador->ordenes()->save($dato);

        return redirect('/dev/registrar_detenidos');
    }

    public function show($id)
    {
        $dato = Ordenes::findOrFail($id);
        return $dato;
    }

    public function update(Request $request, $id)
    {
        $datos = [
            'imputados' => 'required',
            'juez' => 'required',
            'ordcumplicados' => 'required',
            'ordurgentes' => 'required',
            'urgentescumplicas' => 'required',
            'total' => 'required'
        ];
        $this->validate($request, $datos);

        $dato = Ordenes::findOrFail($id);
        $dato->imputados = $request->imputados;
        $dato->juez_control = $request->juez;
        $dato->ordenes_cumplidas = $request->ordcumplicados;
        $dato->ordenes_urgentes = $request->ordurgentes;
        $dato->urgentes_cumplidas = $request->urgentescumplicas;
        $dato->total = $request->total;
        $dato->save();

        return response("ok", 200)->header('Content-Type', 'application/json');
    }
}

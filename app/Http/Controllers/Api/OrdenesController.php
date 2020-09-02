<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Models\Ordenes;
use App\Models\Indicadores;
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
            'imputados' => 'required',
            'juez' => 'required',
            'ordcumplicados' => 'required',
            'ordurgentes' => 'required',
            'urgentescumplicas' => 'required',
            'total' => 'required'
        ];
        $this -> validate($request, $datos);
        $indicador = Indicadores::where('id_usuario', $id)->latest()->first();
        $dato = new Ordenes;
        $dato -> imputados = $request -> imputados;
        $dato -> juez_control = $request -> juez;
        $dato -> ordenes_cumplidas = $request -> ordcumplicados;
        $dato -> ordenes_urgentes = $request -> ordurgentes;
        $dato -> urgentes_cumplidas = $request -> urgentescumplicas;
        $dato -> total = $request -> total;
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
        $this -> validate($request, $datos);

        $dato = Ordenes::findOrFail($id);
        $dato -> imputados = $request -> imputados;
        $dato -> juez_control = $request -> juez;
        $dato -> ordenes_cumplidas = $request -> ordcumplicados;
        $dato -> ordenes_urgentes = $request -> ordurgentes;
        $dato -> urgentes_cumplidas = $request -> urgentescumplicas;
        $dato -> total = $request -> total;
        $dato -> save();

        return response("ok", 200) -> header('Content-Type', 'application/json');
    }
}

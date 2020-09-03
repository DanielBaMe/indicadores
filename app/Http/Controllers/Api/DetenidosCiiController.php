<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Models\DetenidosCii;
use App\Models\Indicadores;
use App\Models\Dependencias;
use Auth;

class DetenidosCiiController extends Controller
{

    public function index()
    {
        $detenidos = DetenidosCii::all();
        return $detenidos;
    }

    public function store(Request $request, $id)
    {
        $datos = [
            'flagancia'     => 'required|integer|min:1',
            'aprehension'   => 'required|integer|min:1',
            'caso'          => 'required|integer|min:1',
            'total'         => 'required'
        ];
        $this->validate($request, $datos);

        $unidad = Dependencias::where('usuario_id', $id)->get();
        $prueba = $unidad[0];
        $id_dependencia = $prueba['id'];

        $indicador = Indicadores::where('id_dependencia', $id_dependencia)->latest()->first();

        $dato = new DetenidosCii;
        $dato->flagancia = $request->flagancia;
        $dato->orden_aprehension = $request->aprehension;
        $dato->caso_urgente = $request->caso;
        $dato->total = $request->total;

        $indicador->carpetasProcedimientos()->save($dato);

        return redirect('/dev/registrar_carpetas_procedimentales');
    }

    public function show($id)
    {
        $dato = DetenidosCii::findOrFail($id);
        return $dato;
    }

    public function update(Request $request, $id)
    {
        $datos = [
            'flagancia' => 'required',
            'aprehension' => 'required',
            'caso' => 'required',
            'total' => 'required'
        ];
        $this->validate($request, $datos);

        $dato = DetenidosCii::findOrFail($id);
        $dato->flagancia = $request->flagancia;
        $dato->orden_aprehension = $request->aprehension;
        $dato->caso_urgente = $request->caso;
        $dato->total = $request->total;
        $dato->save();

        return response("ok", 200)->header('Content-Type', 'application/json');
    }
}

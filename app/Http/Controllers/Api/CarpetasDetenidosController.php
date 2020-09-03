<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Models\CarpetasDetenidos;
use App\Models\Indicadores;
use App\Models\Dependencias;
use Auth;

class CarpetasDetenidosController extends Controller
{

    public function index()
    {
        $carpetas = CarpetasDetenidos::all();
        return $carpetas;
    }

    public function store(Request $request, $id)
    {
        $datos = [
            'detenido_flagancia' => 'required|integer|min:1',
            'sin_detenidos'      => 'required|integer|min:1',
            'total'              => 'required'
        ];
        $this -> validate($request, $datos);

        $unidad = Dependencias::where('usuario_id', $id)->get();
        $prueba = $unidad[0];
        $id_dependencia = $prueba['id'];

        $indicador = Indicadores::where('id_dependencia', $id_dependencia)->latest()->first();

        $dato = new CarpetasDetenidos;
        $dato -> detenido_flagancia = $request -> detenido_flagancia;
        $dato -> sin_detenidos = $request -> sin_detenidos;
        $dato -> total = $request -> total;

        $indicador->carpetasDetenidos()->save($dato);

        return redirect('/dev/registrar_ordenes');
    }

    public function show($id)
    {
        $dato = CarpetasDetenidos::findOrFail($id);
        return $dato;
    }

    public function update(Request $request, $id)
    {
        $datos = [
            'detenido_flagancia' => 'required',
            'sin_detenidos' => 'required',
            'total' => 'required'
        ];
        $this -> validate($request, $datos);

        $dato = CarpetasDetenidos::findOrFail($id);
        $dato -> detenido_flagancia = $request -> detenido_flagancia;
        $dato -> sin_detenidos = $request -> sin_detenidos;
        $dato -> total = $request -> total;
        $dato -> save();

        return response("ok", 200) -> header('Content-Type', 'application/json');
    }

}

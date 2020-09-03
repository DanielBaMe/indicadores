<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Models\VinculadosProceso;
use App\Models\Indicadores;
use App\Models\Dependencias;
use Auth;

class VinculadosProcesoController extends Controller
{

    public function index()
    {
        $vinculados = VinculadosProceso::all();
        return $vinculados;
    }

    public function store(Request $request, $id)
    {
        $datos = [
            'oficiosa'  => 'required|integer|min:1',
            'noficiosa' => 'required|integer|min:1',
            'otramedida'=> 'required|integer|min:1',
            'sinmedida' => 'required|integer|min:1',
            'total'     => 'required|integer|min:1'
        ];
        $this->validate($request, $datos);

        $unidad = Dependencias::where('usuario_id', $id)->get();
        $prueba = $unidad[0];
        $id_dependencia = $prueba['id'];

        $indicador = Indicadores::where('id_dependencia', $id_dependencia)->latest()->first();

        $dato = new VinculadosProceso;
        $dato->pris_prev_oficiosa = $request->oficiosa;
        $dato->pris_prev_no_oficiosa = $request->noficiosa;
        $dato->otra_medida = $request->otramedida;
        $dato->sin_medida = $request->sinmedida;
        $dato->total = $request->total;

        $indicador->carpetasDetenidos()->save($dato);

        return redirect('/dev/registrar_imputados');
    }

    public function show($id)
    {
        $dato = VinculadosProceso::findOrFail($id);
        return $dato;
    }

    public function update(Request $request, $id)
    {
        $datos = [
            'oficiosa' => 'required',
            'noficiosa' => 'required',
            'otramedida' => 'required',
            'sinmedida' => 'required',
            'total' => 'required'
        ];
        $this->validate($request, $datos);

        $dato = VinculadosProceso::findOrFail($id);
        $dato->pris_prev_oficiosa = $request->oficiosa;
        $dato->pris_prev_no_oficiosa = $request->noficiosa;
        $dato->otra_medida = $request->otramedida;
        $dato->sin_medida = $request->sinmedida;
        $dato->total = $request->total;
        $dato->save();

        return response("ok", 200)->header('Content-Type', 'application/json');
    }
}

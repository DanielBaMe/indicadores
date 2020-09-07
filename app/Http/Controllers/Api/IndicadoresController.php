<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use App\Models\Indicadores;
use App\Models\Dependencias;
use Illuminate\Support\Facades\Crypt;

class IndicadoresController extends Controller
{

    public function index($id)
    {
        $desencriptado = Crypt::decrypt($id);
        if ($desencriptado > 1) {
            $unidad = Dependencias::where('usuario_id', $desencriptado)->latest()->first();

            $indicadores = Indicadores::where('id_dependencia', $unidad['id'])->get();
            return view('menuRegistros', ['indicadores' => $indicadores]);
        } else {
            $indicadores = Indicadores::all();
            return view('menuRegistros', ['indicadores' => $indicadores]);
        }
    }

    public function store(Request $request, $id)
    {
        $desencriptado = Crypt::decrypt($id);
        $datos = [
            'anio'       => 'required|integer|min:2017|max:2023',
            'mes'        => 'required|integer|min:1|max:12'
        ];
        $this->validate($request, $datos);

        $unidad = Dependencias::where('usuario_id', $desencriptado)->latest()->first();
        $dato = new Indicadores;
        $dato->anio            = $request->anio;
        $dato->mes             = $request->mes;
        $dato->id_dependencia  = $unidad['id'];
        $dato->save();
        return redirect('/registrar_denuncias');
    }

    public function show($id)
    {
        $dato = Indicadores::findOrFail($id);
        return $dato;
    }

    public function update(Request $request, $id)
    {
        $datos = [
            'id_dependencia',
            'id_denuncias',
            'id_victimas',
            'id_carpetas_detenidos',
            'id_ordenes',
            'id_detendos_cii',
            'id_procedimientos_cii',
            'id_procedimientos_vinculaciones',
            'id_vinculados_proceso',
            'id_imputados',
        ];
        $dato = Indicadores::findOrFail($id);
        $dato->id_dependencia                     = $request->id_dependencia;
        $dato->id_denuncias                       = $request->id_denuncias;
        $dato->id_victimas                        = $request->id_victimas;
        $dato->id_carpetas_detenidos              = $request->id_carpetas_detenidos;
        $dato->id_ordenes                         = $request->id_ordenes;
        $dato->id_detendos_cii                    = $request->id_detendos_cii;
        $dato->id_procedimientos_cii              = $request->id_procedimientos_cii;
        $dato->id_procedimientos_vinculaciones    = $request->id_procedimientos_vinculaciones;
        $dato->id_vinculados_proceso              = $request->id_vinculados_proceso;
        $dato->id_imputados                       = $request->id_imputados;

        $dato->save();

        return response("ok", 200)->header('Content-Type', 'application/json');
    }
}

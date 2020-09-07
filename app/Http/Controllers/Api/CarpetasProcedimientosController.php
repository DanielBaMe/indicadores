<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Models\CarpetasProcedimientosCii;
use App\Models\Indicadores;
use App\Models\Dependencias;
use Auth;

class CarpetasProcedimientosController extends Controller
{

    public function index()
    {
        $carpetas = CarpetasProcedimientosCii::all();
        return $carpetas;
    }

    public function store(Request $request, $id)
    {
        $datos = [
            'archivo'                   => 'required|integer|min:1',
            'abstencion'                => 'required|integer|min:1',
            'ejercicio'                 => 'required|integer|min:1',
            'criterio'                  => 'required|integer|min:1',
            'incompetencia'             => 'required|integer|min:1',
            'acumulacion'               => 'required|integer|min:1',
            'sobreisimiento'            => 'required|integer|min:1',
            'ocausa'                    => 'required|integer|min:1',
            'odecision'                 => 'required|integer|min:1',
            'tramite'                   => 'required|integer|min:1',
            'vinculados'                => 'required|integer|min:1',
            'oemasccnacuerdo'           => 'required|integer|min:1',
            'oemascsnacuerdo'           => 'required|integer|min:1',
            'resueltosmediacion'        => 'required|integer|min:1',
            'resueltosaconciliacion'    => 'required|integer|min:1',
            'resueltosacuerdo'          => 'required|integer|min:1'
        ];
        $this->validate($request, $datos);

        $unidad = Dependencias::where('usuario_id', $id)->get();
        $prueba = $unidad[0];
        $id_dependencia = $prueba['id'];

        $indicador = Indicadores::where('id_dependencia', $id_dependencia)->latest()->first();

        $suma = $request->denuncias + $request->querellas;

        $dato = new CarpetasProcedimientosCii;
        $dato->arch_temporal = $request->archivo;
        $dato->abstencion = $request->abstencion;
        $dato->no_ejercicio = $request->ejercicio;
        $dato->criterio = $request->criterio;
        $dato->incompetencia = $request->incompetencia;
        $dato->acumulacion = $request->acumulacion;
        $dato->sobreisimiento = $request->sobreisimiento;
        $dato->otra_causa = $request->ocausa;
        $dato->otra_decision = $request->odecision;
        $dato->tramite_investigacion = $request->tramite;
        $dato->vinculados = $request->vinculados;
        $dato->oemasc_sn_acuerdo = $request->oemasccnacuerdo;
        $dato->oemasc_cn_acuerdo = $request->oemascsnacuerdo;
        $dato->resueltos_oemasc_mediacion = $request->resueltosmediacion;
        $dato->resueltos_oemasc_conciliacion = $request->resueltosaconciliacion;
        $dato->resueltos_oemasc_acuerdo = $request->resueltosacuerdo;
        $dato->total = $suma;

        $indicador->carpetasProcedimientos()->save($dato);

        return redirect('/registrar_procedimientos');
    }


    public function show($id)
    {
        $dato = CarpetasProcedimientosCii::findOrFail($id);
        return $dato;
    }

    public function update(Request $request, $id)
    {
        $datos = [
            'archivo' => 'required',
            'abstencion' => 'required',
            'ejercicio' => 'required',
            'criterio' => 'required',
            'incompetencia' => 'required',
            'acumulacion' => 'required',
            'sobreisimiento' => 'required',
            'ocausa' => 'required',
            'odecision' => 'required',
            'tramite' => 'required',
            'vinculados' => 'required',
            'oemasccnacuerdo' => 'required',
            'oemascsnacuerdo' => 'required',
            'resueltosmediacion' => 'required',
            'resueltosaconciliacion' => 'required',
            'resueltosacuerdo' => 'required',
            'total' => 'required'
        ];
        $this->validate($request, $datos);

        $dato = CarpetasProcedimientosCii::findOrFail($id);
        $dato->arch_temporal = $request->archivo;
        $dato->abstencion = $request->abstencion;
        $dato->no_ejercicio = $request->ejercicio;
        $dato->criterio = $request->ejercicio;
        $dato->incompetencia = $request->archivo;
        $dato->acumulacion = $request->ejercicio;
        $dato->sobreisimiento = $request->archivo;
        $dato->otra_causa = $request->ejercicio;
        $dato->otra_desicion = $request->archivo;
        $dato->tramite_investigacion = $request->ejercicio;
        $dato->vinculados = $request->archivo;
        $dato->oemasc_sn_acuerdo = $request->ejercicio;
        $dato->oemasc_cn_acuerdo = $request->archivo;
        $dato->resueltos_oemasc_mediacion = $request->ejercicio;
        $dato->resueltos_oemasc_conciliacion = $request->archivo;
        $dato->resueltos_oemasc_acuerdo = $request->ejercicio;
        $dato->total = $request->total;
        $dato->save();

        return response("ok", 200)->header('Content-Type', 'application/json');
    }
}

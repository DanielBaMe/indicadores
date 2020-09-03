<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Models\ProcedimientosVinculaciones;
use App\Models\Indicadores;
use App\Models\Dependencias;
use Auth;

class ProcedimientosVinculacionesController extends Controller
{

    public function index()
    {
        $procedimientos = ProcedimientosVinculaciones::all();
        return $procedimientos;
    }

    public function store(Request $request, $id)
    {
        $datos = [
            'juez' => 'required|integer|min:1',
            'oportunidad' => 'required|integer|min:1',
            'tramitesusp' => 'required|integer|min:1',
            'cumplimientosusp' => 'required|integer|min:1',
            'resueltosotros' => 'required|integer|min:1',
            'tramiteProces' => 'required|integer|min:1',
            'resueltoAbreviado' => 'required|integer|min:1',
            'tramiteTribunal' => 'required|integer|min:1',
            'resueltosOtral' => 'required|integer|min:1',
            'oemascSn' => 'required|integer|min:1',
            'oemascCn' => 'required|integer|min:1',
            'resueltosMediacion' => 'required|integer|min:1',
            'resueltosConciliacion' => 'required|integer|min:1',
            'resueltosAcuerdo' => 'required|integer|min:1',
            'total' => 'required'
        ];
        $this->validate($request, $datos);

        $unidad = Dependencias::where('usuario_id', $id)->get();
        $prueba = $unidad[0];
        $id_dependencia = $prueba['id'];

        $indicador = Indicadores::where('id_dependencia', $id_dependencia)->latest()->first();

        $dato = new ProcedimientosVinculaciones;
        $dato->tramite_juez = $request->denuncias;
        $dato->criterio_oportunidad = $request->querellas;
        $dato->tramite_suspencion = $request->denuncias;
        $dato->cumplimiento_suspencion = $request->querellas;
        $dato->resueltos_otros = $request->denuncias;
        $dato->tramite_proces_abreviado = $request->querellas;
        $dato->resuelto_proces_abreviado = $request->denuncias;
        $dato->tramite_tribunal = $request->querellas;
        $dato->resueltos_juicio_oral = $request->denuncias;
        $dato->oemasc_sn_acuerdo = $request->querellas;
        $dato->oemasc_cn_acuerdo = $request->querellas;
        $dato->resueltos_oemasc_mediacion = $request->querellas;
        $dato->resueltos_oemasc_conciliacion = $request->querellas;
        $dato->resueltos_oemasc_acuerdo = $request->querellas;
        $dato->total = $request->total;

        $indicador->carpetasDetenidos()->save($dato);

        return redirect('/dev/registrar_vinculados');
    }


    public function show($id)
    {
        $dato = ProcedimientosVinculaciones::findOrFail($id);
        return $dato;
    }

    public function update(Request $request, $id)
    {
        $datos = [
            'juez' => 'required',
            'oportunidad' => 'required',
            'tramitesusp' => 'required',
            'cumplimientosusp' => 'required',
            'resueltosotros' => 'required',
            'tramiteProces' => 'required',
            'resueltoAbreviado' => 'required',
            'tramiteTribunal' => 'required',
            'resueltosOtral' => 'required',
            'oemascSn' => 'required',
            'oemascCn' => 'required',
            'resueltosMediacion' => 'required',
            'resueltosConciliacion' => 'required',
            'resueltosAcuerdo' => 'required',
            'total' => 'required'
        ];
        $this->validate($request, $datos);

        $dato = ProcedimientosVinculaciones::findOrFail($id);
        $dato->tramite_juez = $request->denuncias;
        $dato->criterio_oportunidad = $request->querellas;
        $dato->tramite_suspencion = $request->denuncias;
        $dato->cumplimiento_suspencion = $request->querellas;
        $dato->resueltos_otros = $request->denuncias;
        $dato->tramite_proces_abreviado = $request->querellas;
        $dato->resuelto_proces_abreviado = $request->denuncias;
        $dato->tramite_tribunal = $request->querellas;
        $dato->resueltos_juicio_oral = $request->denuncias;
        $dato->oemasc_sn_acuerdo = $request->querellas;
        $dato->oemasc_cn_acuerdo = $request->querellas;
        $dato->resueltos_oemasc_mediacion = $request->querellas;
        $dato->resueltos_oemasc_conciliacion = $request->querellas;
        $dato->resueltos_oemasc_acuerdo = $request->querellas;
        $dato->total = $request->total;
        $dato->save();

        return response("ok", 200)->header('Content-Type', 'application/json');
    }
}

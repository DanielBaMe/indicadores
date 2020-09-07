<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Models\ProcedimientosVinculaciones;
use App\Models\Indicadores;
use App\Models\Dependencias;

use App\Models\CarpetasProcedimientosCii;

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
            'juez'                  => 'required|integer|min:1',
            'oportunidad'           => 'required|integer|min:1',
            'tramitesusp'           => 'required|integer|min:1',
            'cumplimientosusp'      => 'required|integer|min:1',
            'resueltosotros'        => 'required|integer|min:1',
            'tramiteProces'         => 'required|integer|min:1',
            'resueltoAbreviado'     => 'required|integer|min:1',
            'tramiteTribunal'       => 'required|integer|min:1',
            'resueltosOtral'        => 'required|integer|min:1',
            'oemascSn'              => 'required|integer|min:1',
            'oemascCn'              => 'required|integer|min:1',
            'resueltosMediacion'    => 'required|integer|min:1',
            'resueltosConciliacion' => 'required|integer|min:1',
            'resueltosAcuerdo'      => 'required|integer|min:1'
        ];
        $this->validate($request, $datos);

        $unidad = Dependencias::where('usuario_id', $id)->latest()->first();
        $indicador = Indicadores::where('id_dependencia', $unidad['id'])->latest()->first();

        $carpetas = CarpetasProcedimientosCii::where('indicadores_id', $indicador['id'])->latest()->first();

        $suma = $request->denuncias + $request->querellas;

        if ($suma >= $carpetas['vinculados']) {
            $dato = new ProcedimientosVinculaciones;
            $dato->tramite_juez = $request->juez;
            $dato->criterio_oportunidad = $request->oportunidad;
            $dato->tramite_suspencion = $request->tramitesusp;
            $dato->cumplimiento_suspencion = $request->cumplimientosusp;
            $dato->resueltos_otros = $request->resueltosotros;
            $dato->tramite_proces_abreviado = $request->tramiteProces;
            $dato->resuelto_proces_abreviado = $request->resueltoAbreviado;
            $dato->tramite_tribunal = $request->tramiteTribunal;
            $dato->resueltos_juicio_oral = $request->resueltosOtral;
            $dato->oemasc_sn_acuerdo = $request->oemascSn;
            $dato->oemasc_cn_acuerdo = $request->oemascCn;
            $dato->resueltos_oemasc_mediacion = $request->resueltosMediacion;
            $dato->resueltos_oemasc_conciliacion = $request->resueltosConciliacion;
            $dato->resueltos_oemasc_acuerdo = $request->resueltosAcuerdo;
            $dato->total = $suma;

            $indicador->procedimientosVinc()->save($dato);

            return redirect('/registrar_vinculados');
        } else {
            echo "La suma de los reactivos 8.1 a 8.14 no es igual o mayor a la registrada en el reactivo 7.11.";
        }
    }


    public function show($id)
    {
        $dato = ProcedimientosVinculaciones::findOrFail($id);
        return $dato;
    }

    public function update(Request $request, $id)
    {
        $datos = [
            'juez'                  => 'required|integer|min:1',
            'oportunidad'           => 'required|integer|min:1',
            'tramitesusp'           => 'required|integer|min:1',
            'cumplimientosusp'      => 'required|integer|min:1',
            'resueltosotros'        => 'required|integer|min:1',
            'tramiteProces'         => 'required|integer|min:1',
            'resueltoAbreviado'     => 'required|integer|min:1',
            'tramiteTribunal'       => 'required|integer|min:1',
            'resueltosOtral'        => 'required|integer|min:1',
            'oemascSn'              => 'required|integer|min:1',
            'oemascCn'              => 'required|integer|min:1',
            'resueltosMediacion'    => 'required|integer|min:1',
            'resueltosConciliacion' => 'required|integer|min:1',
            'resueltosAcuerdo'      => 'required|integer|min:1'
        ];
        $this->validate($request, $datos);

        $dato = ProcedimientosVinculaciones::findOrFail($id);
        $dato->tramite_juez = $request->juez;
        $dato->criterio_oportunidad = $request->oportunidad;
        $dato->tramite_suspencion = $request->tramitesusp;
        $dato->cumplimiento_suspencion = $request->cumplimientosusp;
        $dato->resueltos_otros = $request->resueltosotros;
        $dato->tramite_proces_abreviado = $request->tramiteProces;
        $dato->resuelto_proces_abreviado = $request->resueltoAbreviado;
        $dato->tramite_tribunal = $request->tramiteTribunal;
        $dato->resueltos_juicio_oral = $request->resueltosOtral;
        $dato->oemasc_sn_acuerdo = $request->oemascSn;
        $dato->oemasc_cn_acuerdo = $request->oemascCn;
        $dato->resueltos_oemasc_mediacion = $request->resueltosMediacion;
        $dato->resueltos_oemasc_conciliacion = $request->resueltosConciliacion;
        $dato->resueltos_oemasc_acuerdo = $request->resueltosAcuerdo;
        $dato->total = $request->total;
        $dato->save();

        return response("ok", 200)->header('Content-Type', 'application/json');
    }
}

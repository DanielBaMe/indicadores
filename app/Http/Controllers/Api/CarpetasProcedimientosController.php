<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Models\CarpetasProcedimientosCii;
use App\Models\Indicadores;
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
        $this -> validate($request, $datos);
        $indicador = Indicadores::where('id_usuario', $id)->latest()->first();
        $dato = new CarpetasProcedimientosCii;
        $dato -> arch_temporal = $request -> archivo;
        $dato -> abstencion = $request -> abstencion;
        $dato -> no_ejercicio = $request -> ejercicio;
        $dato -> criterio = $request -> ejercicio;
        $dato -> incompetencia = $request -> archivo;
        $dato -> acumulacion = $request -> ejercicio;
        $dato -> sobreisimiento = $request -> archivo;
        $dato -> otra_causa = $request -> ejercicio;
        $dato -> otra_desicion = $request -> archivo;
        $dato -> tramite_investigacion = $request -> ejercicio;
        $dato -> vinculados = $request -> archivo;
        $dato -> oemasc_sn_acuerdo = $request -> ejercicio;
        $dato -> oemasc_cn_acuerdo = $request -> archivo;
        $dato -> resueltos_oemasc_mediacion = $request -> ejercicio;
        $dato -> resueltos_oemasc_conciliacion = $request -> archivo;
        $dato -> resueltos_oemasc_acuerdo = $request -> ejercicio;
        $dato -> total = $request -> total;
        $indicador->carpetasProcedimientos()->save($dato);

        return redirect('/dev/registrar_vinculados');
    
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
        $this -> validate($request, $datos);
        
        $dato = CarpetasProcedimientosCii::findOrFail($id);
        $dato -> arch_temporal = $request -> archivo;
        $dato -> abstencion = $request -> abstencion;
        $dato -> no_ejercicio = $request -> ejercicio;
        $dato -> criterio = $request -> ejercicio;
        $dato -> incompetencia = $request -> archivo;
        $dato -> acumulacion = $request -> ejercicio;
        $dato -> sobreisimiento = $request -> archivo;
        $dato -> otra_causa = $request -> ejercicio;
        $dato -> otra_desicion = $request -> archivo;
        $dato -> tramite_investigacion = $request -> ejercicio;
        $dato -> vinculados = $request -> archivo;
        $dato -> oemasc_sn_acuerdo = $request -> ejercicio;
        $dato -> oemasc_cn_acuerdo = $request -> archivo;
        $dato -> resueltos_oemasc_mediacion = $request -> ejercicio;
        $dato -> resueltos_oemasc_conciliacion = $request -> archivo;
        $dato -> resueltos_oemasc_acuerdo = $request -> ejercicio;
        $dato -> total = $request -> total;
        $dato -> save();

        return response("ok", 200) -> header('Content-Type', 'application/json');
    }
}

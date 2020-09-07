<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use App\Models\Indicadores;
use App\Models\Dependencias;

class IndicadoresController extends Controller
{

    public function index($id)
    {
        if ($id > 1) {
            $unidad = Dependencias::where('usuario_id', $id)->get();
            $prueba = $unidad[0];
            $id_dependencia = $prueba['id'];

            $indicadores = Indicadores::where('id_dependencia', $id_dependencia)->get();
            return view('menuRegistros', ['indicadores' => $indicadores]);
        } else {
            $indicadores = Indicadores::all();
            return view('menuRegistros', ['indicadores' => $indicadores]);
        }
    }

    public function store(Request $request)
    {
        $datos = [
            'anio'       => 'required|integer|min:2017|max:2023',
            'mes'        => 'required|integer|min:1|max:12',
            'id_usuario' => 'required|integer'
        ];
        $this->validate($request, $datos);

        //$registros = Indicadores::where('id_usuario', $id);
        // if(empty($tamanio)){
        $iduser = $request->id_usuario;
        $unidad = Dependencias::where('usuario_id', $iduser)->get();
        //dump($unidad[0]);
        $prueba = $unidad[0];
        $id = $prueba['id'];
        $dato = new Indicadores;
        $dato->anio            = $request->anio;
        $dato->mes             = $request->mes;
        $dato->id_dependencia  = $id;
        $dato->save();
        return redirect('/dev/registrar_denuncias');
        // }else{
        //     foreach($registros as $registro){
        //         if(($registro-> anio) == ($dato-> anio) && ($registro -> mes) == ($dato -> mes) ){
        //             return false;
        //         }else{
        //             $dato = new Indicadores;
        //             $dato -> anio           = $request -> anio;
        //             $dato -> mes            = $request -> mes;
        //             $dato -> id_usuario     = $request -> id_usuario;
        //             $dato -> save();

        //             return redirect('/detenidosView');
        //         }
        //     }
        // }
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

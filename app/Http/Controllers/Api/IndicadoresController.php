<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Models\Indicadores;
use Auth;

class IndicadoresController extends Controller
{

    public function index($id)
    {
        $indicadores = Indicadores::where('id_usuario', $id)->get();
        return view('menuRegistros', ['indicadores' => $indicadores]);
    }

    public function store(Request $request)
    {
        $datos = [
            'anio' => 'required',
            'mes' => 'required',
            'id_usuario' => 'required'
        ];
        $this -> validate($request, $datos);

        //$registros = Indicadores::where('id_usuario', $id);
        // if(empty($tamanio)){
            $dato = new Indicadores;
            $dato -> anio           = $request -> anio;
            $dato -> mes            = $request -> mes;
            $dato -> id_usuario     = $request -> id_usuario;
            $dato -> save();
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
        $dato -> id_dependencia                     = $request -> id_dependencia;
        $dato -> id_denuncias                       = $request -> id_denuncias;
        $dato -> id_victimas                        = $request -> id_victimas;
        $dato -> id_carpetas_detenidos              = $request -> id_carpetas_detenidos;
        $dato -> id_ordenes                         = $request -> id_ordenes;
        $dato -> id_detendos_cii                    = $request -> id_detendos_cii;
        $dato -> id_procedimientos_cii              = $request -> id_procedimientos_cii;
        $dato -> id_procedimientos_vinculaciones    = $request -> id_procedimientos_vinculaciones;
        $dato -> id_vinculados_proceso              = $request -> id_vinculados_proceso;
        $dato -> id_imputados                       = $request -> id_imputados;

        $dato -> save();

        return response("ok", 200) -> header('Content-Type', 'application/json');
    }
    

}

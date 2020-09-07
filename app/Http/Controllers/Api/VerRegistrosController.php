<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Indicadores;
use App\Models\Denuncias;
use App\Models\CarpetasDetenidos;
use App\Models\CarpetasProcedimientosCii;
use App\Models\DetenidosCii;
use App\Models\Imputados;
use App\Models\Ordenes;
use App\Models\ProcedimientosVinculaciones;
use App\Models\Victimas;
use App\Models\VinculadosProceso;

use Auth;

class VerRegistrosController extends Controller
{
public function verTodo($id){

        $denuncias = Denuncias::where('indicadores_id', $id)->latest()->first();
        $carpetasD = CarpetasDetenidos::where('indicadores_id', $id)->latest()->first();
        $carpetasP = CarpetasProcedimientosCii::where('indicadores_id', $id)->latest()->first();
        $detenidos = DetenidosCii::where('indicadores_id', $id)->latest()->first();
        $imputados = Imputados::where('indicadores_id', $id)->latest()->first();
        $ordenes = Ordenes::where('indicadores_id', $id)->latest()->first();
        $proced = ProcedimientosVinculaciones::where('indicadores_id', $id)->latest()->first();
        $victimas = Victimas::where('indicadores_id', $id)->latest()->first();
        $vinculados = VinculadosProceso::where('indicadores_id', $id)->latest()->first();

        return view('/registros/visualizarRegistro', ['denuncias' => $denuncias, 'carpetasD' => $carpetasD,
        'carpetasP' => $carpetasP, 'detenidos' => $detenidos, 'imputados'=>$imputados, 'ordenes' => $ordenes,
        'procedimientos' => $proced, 'victimas' => $victimas, 'vinculados' =>$vinculados ]);
    }
}
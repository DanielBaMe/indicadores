<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Models\DetenidosCii;
use App\Models\Indicadores;
use App\Models\Dependencias;
use SweetAlert;
use App\Models\CarpetasDetenidos;
use App\Models\Ordenes;


class DetenidosCiiController extends Controller
{

    public function index()
    {
        $detenidos = DetenidosCii::all();
        return $detenidos;
    }

    public function store(Request $request, $id)
    {
        $datos = [
            'flagancia'     => 'required|integer|min:1',
            'aprehension'   => 'required|integer|min:1',
            'caso'          => 'required|integer|min:1'
        ];
        $this->validate($request, $datos);

        $unidad = Dependencias::where('usuario_id', $id)->latest()->first();
        $indicador = Indicadores::where('id_dependencia', $unidad['id'])->latest()->first();

        $carpetas = CarpetasDetenidos::where('indicadores_id', $indicador['id'])->latest()->first();
        $ordenes = Ordenes::where('indicadores_id', $indicador['id'])->latest()->first();

        $suma = $request->flagancia + $request->aprehension + $request->caso;

        $reactivoUno = $request->flagancia;
        $reactivoDos = $request->aprehension;
        $reactivoTres = $request->caso;

        if ($reactivoUno >= $carpetas['detenido_flagancia']) {
            if($reactivoDos == $ordenes['ordenes_cumplidas']){
                if($reactivoTres == $ordenes['urgentes_cumplidas']){
                    $dato = new DetenidosCii;
                    $dato->flagancia = $request->flagancia;
                    $dato->orden_aprehension = $request->aprehension;
                    $dato->caso_urgente = $request->caso;
                    $dato->total = $suma;
            
                    $indicador->carpetasProcedimientos()->save($dato);
            
                    return redirect('/registrar_carpetas_procedimentales');
                }else{
                    echo "El número de detenidos por orden de aprehensión no es igual al registrado en el reactivo 5.5.";
                }
            }else{
                echo "El número de detenidos por orden de aprehensión no es igual al registrado en el reactivo 5.3.";
            }
        }else{
            //echo "El numero de detenidos en flagancia no es igual o mayor al registrado en el reactivo 4.1";
            alert()->warning('no cumple', 'Error');
        }
    }

    public function show($id)
    {
        $dato = DetenidosCii::findOrFail($id);
        return $dato;
    }

    public function update(Request $request, $id)
    {
        $datos = [
            'flagancia' => 'required',
            'aprehension' => 'required',
            'caso' => 'required',
            'total' => 'required'
        ];
        $this->validate($request, $datos);

        $dato = DetenidosCii::findOrFail($id);
        $dato->flagancia = $request->flagancia;
        $dato->orden_aprehension = $request->aprehension;
        $dato->caso_urgente = $request->caso;
        $dato->total = $request->total;
        $dato->save();

        return response("ok", 200)->header('Content-Type', 'application/json');
    }
}

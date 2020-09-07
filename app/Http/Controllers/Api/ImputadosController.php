<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Models\Imputados;
use App\Models\Indicadores;
use App\Models\Dependencias;
use Auth;

class ImputadosController extends Controller
{

    public function index()
    {
        $imputados = Imputados::all();
        return $imputados;
    }

    public function store(Request $request, $id)
    {
        $datos = [
            'condena'   => 'required|integer|min:1',
            'absuelto'  => 'required|integer|min:1',
            'conoral'   => 'required|integer|min:1',
            'absoloral' => 'required|integer|min:1'
        ];
        $this->validate($request, $datos);

        $unidad = Dependencias::where('usuario_id', $id)->latest()->first();
        $indicador = Indicadores::where('id_dependencia', $unidad['id'])->latest()->first();

        $suma = $request->condena + $request->absuelto + $request->conoral + $request->absoloral;

        $dato = new Imputados;
        $dato->sent_conden = $request->condena;
        $dato->sent_absolut = $request->absuelto;
        $dato->conden_oral = $request->conoral;
        $dato->absolut_oral = $request->absoloral;
        $dato->total = $suma;

        $indicador->carpetasProcedimientos()->save($dato);

        return redirect('/admin');
    }

    public function show($id)
    {
        $dato = Imputados::findOrFail($id);
        return $dato;
    }

    public function update(Request $request, $id)
    {
        $datos = [
            'condena' => 'required',
            'absuelto' => 'required',
            'conoral' => 'required',
            'absoloral' => 'required',
            'total' => 'required'
        ];
        $this->validate($request, $datos);

        $dato = Imputados::findOrFail($id);
        $dato->sent_conden = $request->condena;
        $dato->sent_absolut = $request->absuelto;
        $dato->conden_oral = $request->conoral;
        $dato->absolut_oral = $request->absoloral;
        $dato->total = $request->total;
        $dato->save();

        return response("ok", 200)->header('Content-Type', 'application/json');
    }
}

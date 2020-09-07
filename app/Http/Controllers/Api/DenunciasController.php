<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Denuncias;
use App\Models\Indicadores;
use App\Models\Dependencias;
use RealRashid\SweetAlert\Facades\Alert;

class DenunciasController extends Controller
{
    public function index()
    {
        $denuncias = Denuncias::all();
        return $denuncias;
    }

    public function store(Request $request, $id)
    {
        $datos = [
            'denuncias' => 'required|integer|min:1',
            'querellas' => 'required|integer|min:1'
        ];
        $this->validate($request, $datos);

        $unidad = Dependencias::where('usuario_id', $id)->latest()->first();
        $indicador = Indicadores::where('id_dependencia', $unidad['id'])->latest()->first();

        $suma = $request->denuncias + $request->querellas;

        $dato = new Denuncias;
        $dato->denuncias = $request->denuncias;
        $dato->querellas = $request->querellas;
        $dato->total = $suma;

        $indicador->denuncias()->save($dato);
        Alert::success('Registrado', 'Registro guardado');
        return redirect('/registrar_victimas');
    }

    public function update(Request $request, $id)
    {
        $datos = [
            'denuncias' => 'required',
            'querellas' => 'required',
            'total' => 'required'
        ];
        $this->validate($request, $datos);

        $dato = Denuncias::findOrFail($id);
        $dato->denuncias = $request->denuncias;
        $dato->querellas = $request->querellas;
        $dato->total = $request->total;
        $dato->save();

        return response("ok", 200)->header('Content-Type', 'application/json');
    }

    public function show($id)
    {
        $dato = Denuncias::findOrFail($id);
        return $dato;
    }
}

<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Denuncias;
use App\Models\Indicadores;
use App\Models\Dependencias;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Usuarios;
use Illuminate\Support\Arr;

class CambiarMPController extends Controller
{
    public function index()
    {
        $usuanidades = [ 'id', 'nombre', 'dependencia'];
        $unidades = Dependencias::all();
        $usuarios = Usuarios::where('id', '>', 1) -> get();
        foreach($unidades as $unidad){
            foreach($usuarios as $usuario){
                if(($usuario->id) == ($unidad->usuario_id))
                $usuanidades = Arr::add(['id', $usuario->id], ['nombre',$usuario->nombre], ['dependencia', $unidad->nombre]);
            }
        }
        return view('cambiar', ['datos' => $usuanidades]);;
    }

    public function store(Request $request, $id)
    {


        // $unidad = Dependencias::where('usuario_id', $id)->latest()->first();

        // $suma = $request->denuncias + $request->querellas;

        // $dato = new Denuncias;
        // $dato->denuncias = $request->denuncias;
        // $dato->querellas = $request->querellas;
        // $dato->total = $suma;

        // $indicador->denuncias()->save($dato);
        // Alert::success('Registrado', 'Registro guardado');
        // return redirect('/registrar_victimas');
    }

    public function update(Request $request, $id)
    {
        // $datos = [
        //     'denuncias' => 'required',
        //     'querellas' => 'required',
        //     'total' => 'required'
        // ];
        // $this->validate($request, $datos);

        // $dato = Denuncias::findOrFail($id);
        // $dato->denuncias = $request->denuncias;
        // $dato->querellas = $request->querellas;
        // $dato->total = $request->total;
        // $dato->save();

        return response("ok", 200)->header('Content-Type', 'application/json');
    }

    public function show($id)
    {
        // $dato = Denuncias::findOrFail($id);
        // return $dato;
    }
}

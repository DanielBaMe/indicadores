<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="utf-8">
    <title></title>
</head>

<body>
    @extends('layouts.app')
    @section ('content')
    @php
    $id_usuario = auth()->id();
    @endphp

    <h4>Id usuario {{$id_usuario}}</h4>

    <div style="padding: 60px 160px 0px 160px" class="container d-flex flex-column ">
        <h1>Victimas</h1>
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="/dev/carpetas_procedimientos/nueva/{{$id_usuario}}" method="POST" class="form-inline align-items-center justify-content-center" autocomplete="off" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group mx-sm-3 mb-2">
                <div>
                    <input id="archivo" name="archivo" placeholder="Archivo" type="number" min="1"></br>
                    <input id="abstencion" name="abstencion" placeholder="abstencion" type="number" min="1"></br>
                    <input id="ejercicio" name="ejercicio" placeholder="ejercicio" type="number" min="1"></br>
                    <input id="criterio" name="criterio" placeholder="criterio" type="number" min="1"></br>
                    <input id="incompetencia" name="incompetencia" placeholder="incompetencia" type="number" min="1"></br>
                    <input id="acumulacion" name="acumulacion" placeholder="acumulacion" type="number" min="1"></br>
                    <input id="sobreisimiento" name="sobreisimiento" placeholder="sobreisimiento" type="number" min="1"></br>
                </div>
                <div>
                    <input id="ocausa" name="ocausa" placeholder="ocausa" type="number" min="1"></br>
                    <input id="odecision" name="odecision" placeholder="odecision" type="number" min="1"></br>
                    <input id="tramite" name="tramite" placeholder="tramite" type="number" min="1"></br>
                    <input id="vinculados" name="vinculados" placeholder="vinculados" type="number" min="1"></br>
                    <input id="oemasccnacuerdo" name="oemasccnacuerdo" placeholder="oemasccnacuerdo" type="number" min="1"></br>
                    <input id="oemascsnacuerdo" name="oemascsnacuerdo" placeholder="oemascsnacuerdo" type="number" min="1"></br>
                    <input id="resueltosmediacion" name="resueltosmediacion" placeholder="resueltosmediacion" type="number" min="1"></br>
                    <input id="resueltosaconciliacion" name="resueltosaconciliacion" placeholder="resueltosaconciliacion" type="number" min="1"></br>
                    <input id="resueltosacuerdo" name="resueltosacuerdo" placeholder="resueltosacuerdo" type="number" min="1">
                </div>
                <input id="total" name="total">
            </div>
            <button type="submit" class="btn btn-success mb-2">guardar</button>
        </form>
    </div>
    @endsection
</body>

</html>
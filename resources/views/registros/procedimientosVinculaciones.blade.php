<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <title>Denuncias</title>

</head>

<body>
    @extends('layouts.prueba')
    @section('content')
    @php
    $id_usuario = auth()->id();
    @endphp

    <div style="padding: 60px 160px 0px 160px" class="container d-flex flex-column ">
        <h1>Procedimientos vinculacionales</h1>
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="/dev/procedimientos_vinculaciones/nueva/{{$id_usuario}}" method="POST" class="form-inline align-items-center justify-content-center" autocomplete="off" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-6">
                    <input id="juez" name="juez" placeholder="juez" type="number" min="1">
                    <input id="oportunidad" name="oportunidad" placeholder="oportunidad" type="number" min="1">
                    <input id="tramitesusp" name="tramitesusp" placeholder="tramitesusp" type="number" min="1">
                    <input id="cumplimientosusp" name="cumplimientosusp" placeholder="cumplimientosusp" type="number" min="1">
                    <input id="resueltosotros" name="resueltosotros" placeholder="resueltosotros" type="number" min="1">
                    <input id="tramiteProces" name="tramiteProces" placeholder="tramiteProces" type="number" min="1">
                    <input id="resueltoAbreviado" name="resueltoAbreviado" placeholder="resueltoAbreviado" type="number" min="1">
                </div>
                <div class="col-6">
                    <input id="tramiteTribunal" name="tramiteTribunal" placeholder="tramiteTribunal" type="number" min="1">
                    <input id="resueltosOtral" name="resueltosOtral" placeholder="resueltosOtral" type="number" min="1">
                    <input id="oemascSn" name="oemascSn" placeholder="oemascSn" type="number" min="1">
                    <input id="oemascCn" name="oemascCn" placeholder="oemascCn" type="number" min="1">
                    <input id="resueltosMediacion" name="resueltosMediacion" placeholder="resueltosMediacion" type="number" min="1">
                    <input id="resueltosConciliacion" name="resueltosConciliacion" placeholder="resueltosConciliacion" type="number" min="1">
                    <input id="resueltosAcuerdo" name="resueltosAcuerdo" placeholder="resueltosAcuerdo" type="number" min="1">
                </div>


            </div>
            <button type="submit" class="btn btn-success mb-2">guardar</button>
        </form>
    </div>
    @endsection
</body>

</html>
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
        <h1>Crear Usuarios</h1>
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="/dev/usuario/nuevo" method="POST" class="form-inline align-items-center justify-content-center" autocomplete="off" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group mx-sm-3 mb-2">
                <input id="nombre" name="nombre" placeholder="nombre" type="text" min="4" autocomplete="off">
                <input id="email" name="email" placeholder="email" type="email" min="4"  autocomplete="off">
                <input id="password" name="password" type="password" min="4"  autocomplete="off">
            </div>
            <button type="submit" class="btn btn-success mb-2">guardar</button>
        </form>
    </div>
    @endsection
</body>

</html>
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
        <form action="/dev/detenidos/nueva/{{$id_usuario}}" method="POST" class="form-inline align-items-center justify-content-center" autocomplete="off" enctype="multipart/form-data">
            {{ csrf_field() }}
          
            <div class="form-group mx-sm-3 mb-2">
                <input id="flagancia" name="flagancia" placeholder="Flagancia" type="number" min="1">
                <input id="aprehension" name="aprehension" placeholder="Aprehension" type="number" min="1">
                <input id="caso_urgente" name="caso_urgente" placeholder="Urgente" type="number" min="1">
                
                <input id="total" name="total">
            </div>
            <button type="submit" class="btn btn-success mb-2">guardar</button>
        </form>
    </div>
    @endsection
</body>

</html>
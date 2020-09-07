<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <title>Denuncias</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
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
        <form action="/dev/victimas/nueva/{{$id_usuario}}" method="POST" class="form-inline align-items-center justify-content-center" autocomplete="off" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group mx-sm-3 mb-2">
                <input id="hombres" name="hombres" placeholder="Hombres" type="number" min="1">
                <input id="mujeres" name="mujeres" placeholder="Mujeres" type="number" min="1">
                <input id="otros" name="otros" placeholder="otros" type="number" min="1">
            </div>
            <button type="submit" class="btn btn-success mb-2">guardar</button>
        </form>
    </div>
</body>

</html>
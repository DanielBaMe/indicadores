<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  <meta charset="utf-8">

  <title>Denuncias</title>

</head>

<body>
  @extends('layouts.prueba')
  @section('content')
  @include('sweetalert::alert')
  @php
  $id_usuario = auth()->id();
  @endphp
  <div style="padding: 60px 160px 0px 160px" class="container d-flex flex-column ">
    <h1>Denuncias</h1>
    @if(count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <form action="/dev/denuncias/nueva/{{$id_usuario}}" method="POST" class="form-inline align-items-center justify-content-center" autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="form-group mx-sm-3 mb-2">
        <input id="denuncias" name="denuncias" placeholder="Denuncias" type="number" min="1">
        <input id="querellas" name="querellas" placeholder="Querellas" type="number" min="1">
      </div>
      <button type="submit" class="btn btn-success mb-2">guardar</button>
    </form>
  </div>
  @endsection
</body>

</html>
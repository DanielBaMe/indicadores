<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Registro</title>
</head>

<body>
  @extends('layouts.app')
  @section ('content')
  @php
  $id_usuario = auth()->id();
  $id = Crypt::encrypt($id_usuario);
  @endphp

  <div style="padding: 60px 160px 0px 160px" class="container d-flex flex-column ">
    <h1>Fecha del registro</h1>
    @if(count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <form action="/dev/indicadores/nueva/{{$id}}" method="POST" class="form-inline align-items-center justify-content-center" autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group mx-sm-3 mb-2">
        <input id="mes" name="mes" placeholder="Mes" type="number" min="01" max="12" required>
        <input id="anio" name="anio" placeholder="Año" type="number" min="2017" max="2023" required>
  
      </div>
      <button type="submit" class="btn btn-success mb-2">guardar</button>
      <button><a href="{{ url("/admin") }}">Cancelar</a></button>
    </form>
  </div>
  @endsection
</body>

</html>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Principal</title>
</head>

<body>
  @extends('layouts.app')
  @section ('content')
  @php
  $id_usuario = auth()->id();
  @endphp

  <h4>Id usuario {{$id_usuario}}</h4>


  <a href="{{ url("/dev/fecha") }}">nuevo registro</a>
  </br>
  <a href="{{ url("/dev/indicadores/{$id_usuario}") }}">ver registros</a>
  @endsection
</body>

</html>
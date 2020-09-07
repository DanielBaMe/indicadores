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
  <div class="container">


    @if($id_usuario > 1)
    <a href="{{ url("/dev/fecha") }}">nuevo registro</a>
    </br>
    <a href="{{ url("/dev/indicadores/{$id_usuario}") }}">ver registros</a>
    </br>
    @endif
    @if($id_usuario == 1)
    <!-- <a href="{{ url("/dev/nuevo_usuario") }}">Crear usuario nuevo</a>
  </br>
  </br>
  <a href="{{ url("/dev/unidad") }}">Crear x cosa</a>
  </br>
  </br> -->
    <a href="{{ url("/dev/indicadores/{$id_usuario}") }}">ver registros</a>
    @endif
  </div>
  @endsection
</body>

</html>
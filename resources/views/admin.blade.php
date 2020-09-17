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
    @php
    $id = Crypt::encrypt($id_usuario);
    @endphp
    <a href="{{ url("/iniciar_registro") }}">nuevo registro</a>
    </br>
    <a href="{{ url("/dev/indicadores/{$id}") }}">ver registros</a>
    </br>
    @endif
    @if($id_usuario == 1)
    @php
    $id = Crypt::encrypt($id_usuario);
    @endphp
    <!-- <a href="{{ url("/dev/nuevo_usuario") }}">Crear usuario nuevo</a> -->
    <a href="{{ url("/dev/indicadores/{$id}") }}">ver registros</a>
    <a href="{{ url("/dev/grafica/{$id}")}}">Ver graficas</a>
    @endif
  </div>
  @endsection
</body>

</html>
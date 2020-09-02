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
  <button><a href="/dev/detenidos">Crear registro de detenidos</a></button>
  <br/>
  <button><a href="/dev/carpetasDetenidos">Crear registro de carpetas de detenidos</a></button>
  <br/>
  <button><a href="/dev/carpetasProcedimientos">Crear registro de carpetas con procedimientos</a></button>
  <br/>
  <button><a href="/dev/denuncias">Crear registro de denuncias</a></button>
  <br/>
  <button><a href="/dev/imputados">Crear registro de imputados</a></button>
  <br/>
  <button><a href="/dev/ordenes">Crear registro de ordenes</a></button>
  <br/>
  <button><a href="/dev/procedimientosVinculaciones">Crear registro de procedimientos con vinculaciones</a></button>
  <br/>
  <button><a href="/dev/victimas">Crear registro de victimas</a></button>
  <br/>
  <button><a href="/dev/vinculados_a_proceso">Crear registro de vinculados a proceso</a></button>

  @endsection
</body>

</html>
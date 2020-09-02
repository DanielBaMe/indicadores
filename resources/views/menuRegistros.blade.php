<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Registros</title>
</head>

<body>
  @extends('layouts.app')
  @section ('content')
  @php
  $id_usuario = auth()->id();
  @endphp

  <h4>Id usuario {{$id_usuario}}</h4>

  <table>
    <thead>
      <tr>
        <th hidden> id</th>
        <th> Año</th>
        <th> Mes </th>
        <th> Editar </th>
      </tr>
    </thead>
    <tbody>
      @foreach($indicadores as $indicador)
      <tr>
        <td hidden> {{$indicador->id}} </td>
        <td> {{$indicador->anio}} </td>
        <td> {{$indicador->mes}} </td>
        <td><a href="{{ url("/dev/menu") }}">Editar</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>

  @endsection
</body>

</html>

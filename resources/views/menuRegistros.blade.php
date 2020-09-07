<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <title>Registros</title>
</head>

<body>
  @extends('layouts.app')
  @section ('content')
  @php
  $id_usuario = auth()->id();
  @endphp
  <div class="container">
    @php
    $tam = count($indicadores)
    @endphp
    @if($tam > 0)
    <div>
      <table>
        <thead>
          <tr>
            <th hidden> id</th>
            <th> Año</th>
            <th> Mes </th>
            <th> Acciones </th>
          </tr>
        </thead>
        <tbody>
          @foreach($indicadores as $indicador)
          <tr>
            <td hidden> {{$indicador->id}} </td>
            <td> {{$indicador->anio}} </td>
            <td> {{$indicador->mes}} </td>
            <td>
              @if($indicador->anio == 2020)
              <a href="{{ url("/dev/menu") }}">Editar</a>
              @endif
              <a href="{{ url("/dev/verRegistro/{$indicador->id}") }}">Ver registro</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @endif
    @if($tam == 0)
    <div>
      <h1>No hay registros creados por el usuario</h1>
    </div>
    @endif
  </div>
  @endsection
</body>

</html>
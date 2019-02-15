<?php
// We change the headers of the page so that the browser will know what sort of file is dealing with. Also, we will tell the browser it has to treat the file as an attachment which cannot be cached.
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Costos.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
@extends('reporte')

@section('contenido')
<div class="col-md-7 col-md-offset-2">
  <div class="row">
    <table class="table table-striped table-bordered"  style="table-layout: fixed">
      <thead>
        <tr>
          <th class="text-center">Nombre del paquete</th>
          <th class="text-center">Fecha de salida</th>
          <th class="text-center">Costo</th>
        </tr>
      </thead>
      <tbody>
        @foreach($costos as $costo)
          <tr>
            <td style="max-width: 10px; overflow: hidden; white-space: wrap;">{{$costo->NombrePaquete}}</td>
            <td style="max-width: 100px; overflow: hidden; white-space: wrap;">{{ \Carbon\Carbon::parse($costo->FechaSalida)->format('d/m/Y')}}</td>
            <td style="max-width: 100px; overflow: hidden; white-space: wrap;">{{$costo->CostoAlquilerTransporte}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

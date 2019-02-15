@extends('master')

@section('head')

@endsection
@section('Title')
  <strong>Los 10 paquetes con mayores costos de transporte</strong>
@endsection
@section('contenido')


<div class="row">
  <div class="col-md-7 col-md-offset-2">
    <a class="btn btn-info" title="Descargar como PDF" href="{{ route('adminPaquete.costos.excel')}}"><i class="fa Example of download fa-download"></i></a>
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

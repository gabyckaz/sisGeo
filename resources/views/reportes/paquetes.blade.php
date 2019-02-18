@extends('master')

@section('head')
@section('Title')
<STRONG>Paquetes realizados desde {{ \Carbon\Carbon::parse($fechainicio)->format('d-m-Y')}} hasta {{ \Carbon\Carbon::parse($fechafin)->format('d-m-Y')}}</STRONG>
@endsection

@section('contenido')

<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="box box-warning">
      <div class="box-header">
        <h3 class="box-title"><b>Total: {{$totalpaquetes}}</b></h3>
        <div class="box-tools pull-right">
          <a class="btn btn-success" title="Descargar como Excel" href="{{ route('paquetes.excel',[$fechainicio,$fechafin])}}">Descargar <i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
        </div>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th class="text-center">Nombre Paquete</th>
                <th class="text-center">Precio ofertado</th>
                <th class="text-center">Cupos ofertados</th>
                <th class="text-center">Costo total Transporte</th>
                <th class="text-center">Categoría</th>
                <th class="text-center">País</th>
                <th class="text-center">Fecha</th>
              </tr>
            </thead>
            <tbody>
              @foreach($paquetes as $paquete)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{$paquete->NombrePaquete}}</td>
                  <td>$ {{$paquete->Precio}}</td>
                  <td>{{$paquete->Cupos}}</td>
                  <td>$ {{$paquete->CostoAlquilerTransporte}}</td>
                  <td>{{$paquete->NombreCategoria}}</td>
                  <td>{{$paquete->nombrePais}}</td>
                  <td>{{\Carbon\Carbon::parse($paquete->FechaSalida)->format('d-m-Y')}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

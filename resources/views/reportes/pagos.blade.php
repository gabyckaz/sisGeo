@extends('master')

@section('head')
@section('Title')
<STRONG>Pagos registrados desde {{ \Carbon\Carbon::parse($fechainicio)->format('d-m-Y')}} hasta {{ \Carbon\Carbon::parse($fechafin)->format('d-m-Y')}}</STRONG>
@endsection

@section('contenido')

<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="box box-warning">
      <div class="box-header">
        <h3 class="box-title"><b>Total: {{$totalpagos}}</b></h3>
        <div class="box-tools pull-right">
          <a class="btn btn-success" title="Descargar como Excel" href="{{ route('pagos.excel',[$fechainicio,$fechafin])}}">Descargar <i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
        </div>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th class="text-center">Paquete</th>
                <th class="text-center">Tipo de pago</th>
                <th class="text-center">Código Pagadito(NAP)</th>
                <th class="text-center">Estado de pago</th>
                <th class="text-center">Nombre cliente</th>
                <th class="text-center">Costo p/persona</th>
                <th class="text-center">No. acompañantes</th>
                <th class="text-center">Pago total</th>
                <th class="text-center">Fecha transacción</th>
              </tr>
            </thead>
            <tbody>
              @foreach($pagos as $pago)
                <tr>
                  <td>{{$pago->Descripcion}}</td>
                  <td>{{$pago->TipoPago}}</td>
                  <td>{{$pago->NAP}}</td>
                  <td>@if($pago->Estado==1)
                        Completado
                      @elseif($pago->Estado==0)
                        En proceso
                      @endif</td>
                  <td>{{$pago->NombreCliente}}</td>
                  <td>${{$pago->CostoPersona}}</td>
                  <td>{{$pago->NumeroAcompanante}}</td>
                  <td>${{$pago->PagoTotal}}</td>
                  <td>{{\Carbon\Carbon::parse($pago->FechaTransaccion)->format('d-m-Y H:i')}}</td>
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

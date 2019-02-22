@extends('master')

@section('head')

@endsection
@section('Title')
<strong>Listado de personas a asistir a {{$paquete->NombrePaquete}} el  {{ \Carbon\Carbon::parse($paquete->FechaSalida)->format('d/m/Y')}}</strong>
@endsection
@section('contenido')
@php $numeropersonas=0; @endphp
<div class="col-md-9 col-md-offset-1">
 <div class="box box-warning">
  <div class="box-header">
    <div class="box-tools pull-right">
    <a href="{{route('adminPaquete.reportepersonas', [$paquete['IdPaquete'],'pdf'])}}"
      class="btn btn-info " title="Listado de personas"> Descargar <i class="fa fa-download" aria-hidden="true"></i></a>
    <a class="btn btn-success" title="Descargar como Excel" href="{{ route('adminPaquete.reportepersonas', [$paquete['IdPaquete'],'excel'])}}">Descargar <i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
    </div>
  </div>
  <div class="box-body">
    @if (count($transportesasignados) == 0)
      <p>No hay transporte asignado<p>
    @elseif (count($transportesasignados) >= 1)
    <p><b>Transporte asignado</b></p>
      @foreach($transportesasignados as $transporteasignado)
        <p>{{$transporteasignado->NombreTipoTransporte}} {{$transporteasignado->Marca}} {{$transporteasignado->Modelo}}, color {{$transporteasignado->Color}} <br>
       Placa: {{$transporteasignado->Placa_Matricula}} No. Asientos: {{$transporteasignado->NumeroAsientos}} <br>Empresa: {{$transporteasignado->NombreEmpresaTransporte}}</p>
      @endforeach
    @endif

    @if (count($conductoresasignados) == 0)
      <p>No hay conductor asignado<p>
    @elseif (count($conductoresasignados) >= 1)
    <p><b>Conductor asignado</b></p>
      @foreach($conductoresasignados as $conductor)
        <p>{{$conductor->NombreConductor}}</p>
      @endforeach
    @endif

    @if (count($guias) == 0)
      <p>No hay guía asignado<p>
    @elseif (count($guias) >= 1)
     <p><strong>Guía: </strong>
        @foreach($guias as $guia)
        {{$guia->PrimerNombrePersona}} {{$guia->SegundoNombrePersona}} {{$guia->PrimerApellidoPersona}} {{$guia->SegundoApellidoPersona}}
        @endforeach
      </p>
    @endif

    @if (count($personas) == 0 && count($otraspersonas) == 0)
      <p>No hay reservas realizadas<p>
    @else
    <p><strong>Listado Personas</strong></p>

    <div class="table-responsive">
      <table class="table table-striped table-bordered" >
        <thead>
          <tr>
            <th>#</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Telefono</th>
            <th class="text-center">DUI / Pasaporte</th>
            <th class="text-center">Nacionalidad</th>
          </tr>
        </thead>
        <tbody>
          @foreach($personas as $key => $persona)
            @php $numeropersonas++ @endphp
            <tr>
              <td>{{$numeropersonas}}</td>
              <td>{{$persona->PrimerNombrePersona}} {{$persona->SegundoNombrePersona}} {{$persona->PrimerApellidoPersona}} {{$persona->SegundoApellidoPersona}}</td>
              <td> {{$persona->TelefonoContacto }} </td>
              <td>{{$persona->NumeroDocumento }} </td>
              <td>{{$persona->Nacionalidad }} </td>
            </tr>
          @endforeach
          @foreach($otraspersonas as $otrapersona)
            @php $numeropersonas++ @endphp
            <tr>
              <td>{{$numeropersonas}}</td>
              <td>{{$otrapersona->NombreApellido}} </td>
              <td> {{$otrapersona->NumTelOtroTurista }} </td>
              <td>{{$otrapersona->DuiOtroTurista }} {{$otrapersona->PasaporteOtroTurista }} </td>
              <td></td>
            </tr>
          @endforeach
        </tbody>
        </table>
      </div>

    @endif
  </div>
  <div class="box-footer">
  </div>
  </div>
</div>
@endsection

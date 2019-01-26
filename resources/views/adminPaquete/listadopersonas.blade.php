@extends('master')

@section('head')

@endsection
@section('Title')
<strong>Listado de personas a asistir a {{$paquete->NombrePaquete}} el  {{ \Carbon\Carbon::parse($paquete->FechaSalida)->format('d/m/Y')}}</strong>
@endsection
@section('contenido')

 <div class="box box-solid">
  <div class="box-header">
    <!-- <h3 class="box-title"><strong><h2>ddd</h2></strong></h3> -->
    <a href="{{route('adminPaquete.reportepersonas', $paquete['IdPaquete'])}}"
      class="btn btn-info " title="Listado de personas"> Descargar como PDF
    </a>
  </div>
  <div class="box-body">
    @if (count($guias) == 0)
      <p>No hay guía asignado<p>
    @elseif (count($guias) >= 1)
     <p><strong>Guía: </strong>
        @foreach($guias as $guia)
        {{$guia->PrimerNombrePersona}} {{$guia->SegundoNombrePersona}} {{$guia->PrimerApellidoPersona}} {{$guia->SegundoApellidoPersona}}
        @endforeach
      </p>
    @endif

    @if (count($personas) == 0)
      <p>No hay conductor asignado<p>
    @elseif (count($personas) >= 1)
    <p><strong>Listado Personas</strong></p>

    <div class="table-responsive">
      <table class="table table-striped table-bordered"  style="table-layout: fixed" >
        <thead>
          <tr>
            <th class="text-center">Nombre</th>
            <th class="text-center">Telefono</th>
            <th class="text-center">DUI / Pasaporte</th>
            <th class="text-center">Nacionalidad</th>
          </tr>
        </thead>
        <tbody>
          @foreach($personas as $key => $persona)

            <tr>
              <td style="max-width: 10px; overflow: hidden; white-space: wrap;">{{$persona->PrimerNombrePersona}} {{$persona->SegundoNombrePersona}} {{$persona->PrimerApellidoPersona}} {{$persona->SegundoApellidoPersona}}</td>
              <td style="max-width: 100px; overflow: hidden; white-space: wrap;"> {{$persona->TelefonoContacto }} </td>
              <td style="max-width: 100px; overflow: hidden; white-space: wrap;">{{$persona->NumeroDocumento }} </td>
              <td style="max-width: 100px; overflow: hidden; white-space: wrap;">{{$persona->Nacionalidad }} </td>
            </tr>
          @endforeach
          @foreach($otraspersonas as $otrapersona)
            <tr>
              <td style="max-width: 10px; overflow: hidden; white-space: wrap;">{{$otrapersona->NombreApellido}} </td>
              <td style="max-width: 100px; overflow: hidden; white-space: wrap;"> {{$otrapersona->NumTelOtroTurista }} </td>
              <td style="max-width: 100px; overflow: hidden; white-space: wrap;">{{$otrapersona->DuiOtroTurista }} {{$otrapersona->PasaporteOtroTurista }} </td>
              <td style="max-width: 100px; overflow: hidden; white-space: wrap;"></td>
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
@endsection

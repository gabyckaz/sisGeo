@extends('reporte')

@section('contenido')
<div class="col-md-7 col-md-offset-2">
  <div class="row">
    <div class="text-center" >
      <img src="./images/logogeo.png">
    </div>
      <h4 class="text-left">Fecha de emisión: <strong>{{date('d/m/y g:i a')}}</strong></h4>
      @if(Auth::check())
        <h4 class="text-left">Usuario: <strong>{{Auth::user()->name}}</strong></h4>
      @endif
  </div>
  <h2 class="text-center"><strong>{{$paquete->NombrePaquete}}</strong></h2>
  <br>
  <div class="row">
  <p><strong>Salida:  </strong>{{ \Carbon\Carbon::parse($paquete->FechaSalida)->format('d/m/Y')}} {{ \Carbon\Carbon::parse($paquete->HoraSalida)->format('h:i a')}} </p>
  <p><strong>Precio:  </strong>$ {{$paquete->Precio}}</p>
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
          @foreach($personas as $persona)
            <tr>
              <td style="max-width: 10px; overflow: hidden; white-space: wrap;">{{$persona->PrimerNombrePersona}} {{$persona->SegundoNombrePersona}} {{$persona->PrimerApellidoPersona}} {{$persona->SegundoApellidoPersona}}</td>
              <td style="max-width: 100px; overflow: hidden; white-space: wrap;"> {{$persona->TelefonoContacto }} </td>
              <td style="max-width: 100px; overflow: hidden; white-space: wrap;">{{$persona->NumeroDocumento }} </td>
              <td style="max-width: 100px; overflow: hidden; white-space: wrap;">{{$persona->Nacionalidad }} </td>
            </tr>
          @endforeach
        </tbody>
        </table>
      </div>

    @endif
  </div>
</div>
@endsection

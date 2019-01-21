@extends('reporte')

@section('contenido')
<div class="col-md-7 col-md-offset-2">
  <div class="row">
    <div class="text-center" >
      <img src="./images/logogeo.png">
    </div>
    <h2 class="text-center"><strong>Información {{$turistas[0]->Descripcion}}</strong></h2>
    <br>
      <h4 class="text-left">Fecha de emisión: <strong>{{date('d/m/y g:i a')}}</strong></h4>
      @if(Auth::check())
        <h4 class="text-left">Usuario: <strong>{{Auth::user()->name}}</strong></h4>
      @endif
  </div>
  <br>
  <div class="row">

    @if (count($turistas) == 0)
      <p>No hay conductor asignado<p>
    @elseif (count($turistas) >= 1)
    <p><strong>Listado Personas</strong></p>
      @foreach($turistas as $turista)
        {{$turista->PrimerNombrePersona}} {{$turista->PrimerApellidoPersona}}<br>

      

      @endforeach
    @endif
  </div>
</div>
@endsection

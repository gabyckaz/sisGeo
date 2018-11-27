@extends('reporte')

@section('contenido')
<div class="col-md-7 col-md-offset-2">
  <div class="row">
    <div class="text-center" >
      <img src="./images/logogeo.png">
    </div>
    <h2 class="text-center"><strong>Información {{$paquete->NombrePaquete}}</strong></h2>
    <br>
      <h4 class="text-left">Fecha de emisión: <strong>{{date('d/m/y g:i a')}}</strong></h4>
      @if(Auth::check())
        <h4 class="text-left">Usuario: <strong>{{Auth::user()->name}}</strong></h4>
      @endif  
  </div>
  <br>
  <div class="row">
    <p><strong>País: </strong> {{$paquete->ruta->pais->nombrePais}} |  {{$paquete->TipoPaquete}}</p>
      {{$paquete->ruta->DatosGenerales}}
    <br>
    {{$paquete->ruta->DescripcionRutaTuristica}}<br>
    <br>
    <p><strong>Precio: </strong> ${{$paquete->Precio}} por persona</p>
    <p><strong>Dificultad: </strong> {{$paquete->Dificultad}}</p>
    <p><strong>Salida: </strong>
      {{ \Carbon\Carbon::parse($paquete->FechaSalida)->format('d/m/Y')}}
      {{\Carbon\Carbon::createFromFormat('H:i:s',$paquete->HoraSalida)->format('h:i A')}}
      en {{$paquete->LugarRegreso}}</p>
    <p><strong>Fecha de Regreso: </strong>
    {{ \Carbon\Carbon::parse($paquete->FechaRegreso)->format('d/m/Y')}}</p>
    <p><strong>Itinerario</strong></p>
      @foreach ($itinerario as $iti)
        {{$iti->itinerariopaq->NombreItinerario}}<br>
      @endforeach
    <br>
    <p><strong>Condiciones</strong></p>
      @foreach ($condiciones as $condicion)
        {{$condicion->condicionpaq->NombreCondiciones}}<br>
      @endforeach
    <br>
    <p><strong>Recomendaciones</strong></p>
      @foreach ($recomendaciones as $recomendacion)
      {{$recomendacion->recomendacionespaq->NombreRecomendaciones}}<br>
    @endforeach
    <br>
    <p><strong>Gastos Extra</strong></p>
      @foreach ($gastosextras as $gastosextra)
        {{$gastosextra->gastospaq->NombreGastos}}->${{$gastosextra->gastospaq->Gastos}}<br>
      @endforeach
    <br>
    <p><strong>Incluye</strong></p>
      @foreach ($incluye as $inc)
        {{$inc->incluyepaq->NombreIncluye}}<br>
      @endforeach
    <br>
  </div>
</div>
@endsection

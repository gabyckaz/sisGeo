@extends('reporte')

@section('contenido')
<div class="col-md-7 col-md-offset-2">
      <div class="row">
        <!--itulo del reporte-->
        <div class="text-center" >
          <img src="./images/logogeo.png">
        </div>
        <h2 class="text-center"><strong>Listado de Paquetes</strong></h2>
          <h4 class="text-left">Fecha de emisión: <strong>{{date('d/m/y g:i a')}}</strong></h4>
          <h4 class="text-left">Usuario: <strong>{{Auth::user()->name}}</strong></h4>
      </div>
      <div class="row">
        @php $contador=0; @endphp
        @foreach($paquetes as $paquete)
          @php $contador++ @endphp
          <p><strong>{{$contador}}. {{$paquete->NombrePaquete}}</strong></p>
          <p>{{$paquete->ruta->pais->nombrePais}}</p>
          <p>$ {{$paquete->Precio}} por persona</p>
          <p>Salida: {{$paquete->FechaSalida}} {{$paquete->HoraSalida}}</p>

            @for ($i = 0; $i < count($itinerario); $i++)
            {{  $itinerario[$i]->IdItinerario }}
            @endfor

            @for ($j = 0; $j < count($itinerariopaquete); $j++)
               {{$itinerariopaquete[$j]->IdItinerario }}             
            @endfor
          <br>
          <hr>
        @endforeach
      </div>
</div>
@endsection

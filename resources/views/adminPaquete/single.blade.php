<style>
.galeria{
  height: 200px;
  overflow:hidden; /*hide bounds of image */
  margin:0;   /*reset margin of figure tag*/
}

.thumbnail:hover {
    box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}
.responsive {
    width: 100%;
    height: auto;
}
</style>

@extends('master')

@section('head')
@section('Title', $paquete->NombrePaquete)

@endsection

@section('contenido')
<div class="row">
    <div class="col-md-6"><!-- columna izquierda -->
          <!-- Que solo muestre 1 foto al inicio -->
      @foreach ($imagen as $key=>$imagenes)
        @php  ++$key @endphp
              <img src="{{Storage::url($imagenes->Imagen4)}}" style=" margin-left: auto; margin-right: 220px; display: block;" class="responsive img-rounded">
          </a>
        @if($key == 1)
          @break
        @endif
      @endforeach

    <div class="galeria">

      @foreach ($imagen as $imagenes)
        <div class="col-sm-4 galeria" style="height:200px">
        <a href="{{Storage::url($imagenes->Imagen1)}}">
          <img src="{{Storage::url($imagenes->Imagen1)}}"  class="thumbnail responsive" style="height: 100%; margin:10 -38.885%;  width:177.777%; ">
        </a>
        </div>
        <div class="col-sm-4 galeria" style="height:200px">
        <a href="{{Storage::url($imagenes->Imagen2)}}">
          <img src="{{Storage::url($imagenes->Imagen2)}}"  class="thumbnail responsive" style="height: 100%; margin:10 -38.885%;  width:177.777%; ">
        </a>
        </div>
        <div class="col-sm-4 galeria" style="height:200px">
        <a href="{{Storage::url($imagenes->Imagen3)}}">
          <img src="{{Storage::url($imagenes->Imagen3)}}"  class="thumbnail responsive" style="height: 100%; margin:10 -38.885%;  width:177.777%; ">
        </a>
        </div>

      @endforeach

    </div>
    <div class="row">
      <div class="col-md-6">
        <h3 style="text-align:center;"><b>Dificultad:</b> {{ $paquete->Dificultad}}</h3>
          <h3 style="text-align:center;"><b>Tipo Paquete:</b> {{ $paquete->TipoPaquete}}</h3>
      </div>
      <div class="col-md-6">
        <div style="text-align:center;"><h3><b>PRECIO:</b></h3><h3>$<b>{{ $paquete->Precio}}</b> por persona</h3></div>
      </div>
    </div>
    <br>

    </div><!-- Fin de columna izquierda -->
      <div class="col-md-6"><!-- columna derecha -->
        <div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title"></h3>
    <center><a href="{{route('adminPaquete.reporte', $paquete['IdPaquete'])}}"
    class="btn btn-info fa Example of download fa-download" title="Descargar como PDF"> Descargar información</a></center>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="box-group" id="accordion">
      <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
      <div class="panel box box-success">
        <div class="box-header with-border">
          <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
              Datos generales
            </a>
          </h4>
          <span class=" label label-success">{{$paquete->ruta->pais->nombrePais}}</span>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
          <div class="box-body">
           {{$paquete->ruta->DatosGenerales}}
          </div>
        </div>
      </div>
      <div class="panel box box-success">
        <div class="box-header with-border">
          <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
              Descripción
            </a>
          </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
          <div class="box-body">
            {{$paquete->ruta->DescripcionRutaTuristica}}
          </div>
        </div>
      </div>
      <div class="panel box box-success">
        <div class="box-header with-border">
          <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
              Itinerario
            </a>
          </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse">
          <div class="box-body">
            @foreach ($itinerario as $iti)
              {{$iti->itinerariopaq->NombreItinerario}}<br>
            @endforeach
          </div>
        </div>
      </div>
      <div class="panel box box-success">
        <div class="box-header with-border">
          <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
              Condiciones
            </a>
          </h4>
        </div>
        <div id="collapseFour" class="panel-collapse collapse">
          <div class="box-body">
            @foreach ($condiciones as $condicion)
              {{$condicion->condicionpaq->NombreCondiciones}}<br>
            @endforeach
          </div>
        </div>
      </div>
      <div class="panel box box-success">
        <div class="box-header with-border">
          <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
              Recomendaciones
            </a>
          </h4>
        </div>
        <div id="collapseFive" class="panel-collapse collapse">
          <div class="box-body">
            @foreach ($recomendaciones as $recomendacion)
              {{$recomendacion->recomendacionespaq->NombreRecomendaciones}}<br>
            @endforeach
          </div>
        </div>
      </div>
      <div class="panel box box-success">
        <div class="box-header with-border">
          <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
              Gastos Extra
            </a>
          </h4>
        </div>
        <div id="collapseSix" class="panel-collapse collapse">
          <div class="box-body">
            @foreach ($gastosextras as $gastosextra)
              {{$gastosextra->gastospaq->NombreGastos}}->${{$gastosextra->gastospaq->Gastos}}<br>
            @endforeach
          </div>
        </div>
      </div>
      <div class="panel box box-success">
        <div class="box-header with-border">
          <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
              Incluye
            </a>
          </h4>
        </div>
        <div id="collapseSeven" class="panel-collapse collapse">
          <div class="box-body">
            @foreach ($incluye as $inc)
              {{$inc->incluyepaq->NombreIncluye}}<br>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

        <table style="width:100%">
        <tr>
        <th>Salida</th>
        <th>Regreso</th>
        </tr>
        <tr>
        <td>{{ $paquete->FechaSalida}}</td>
        <td>{{ $paquete->FechaRegreso}}</td>
        </tr>
        <tr>
        <td>{{ $paquete->HoraSalida}} a.m.</td>
        <td></td>
        </tr>
        </table>
        <br>
        <div class="row">
          <div class="col-md-6">
            <p><b>Lugar de Regreso:</b> {{ $paquete->LugarRegreso}} </p>
          </div>
          <div class="col-md-6">
            <p><b><a href="{{$paquete->Galeria}}" target="_blank">Link de Facebook para galeria de imagenes</a></b></p>
          </div>
        </div>
      </div><!-- Fin de columna derecha -->

      <center>
        <div class="row">
                    <br>
                    <a  class="btn btn-info" title="RESERVAR AHORA"
                                         href="{{ route('adminPaquete.reserva.add',$paquete->IdPaquete) }}">RESERVAR AHORA</a>
                  </div>
                    <br>
                    <FONT FACE="arial" COLOR="white" size="4">
                    <marquee BGCOLOR="00a65a" >Los Mejores Viajes, Turismo en El Salvador, Centro America y El Mundo.                 #DESCUBRE           #CONOCE             #ESPIRITUGEO</marquee>
                  </FONT>
                    <br>
                    <br>
                               {!! $paquete->Video!!}
                    <br>
                    <br>
                    <FONT FACE="arial" COLOR="white" size="4">
                    <marquee BGCOLOR="00a65a" COLOR="white"><b>Visitanos en:</b> Col. Campestre #17, Pje.3, Calle Circunvalación, San Salvador, El Salvador, C.A.
                      <b>Télefonos:</b> 2284-8404/ 6302-8424 </marquee>
                  </FONT>
                  <br>
        </div>

      </center>
      <center>
        <MARQUEE WIDTH="50%" BEHAVIOR="alternate"> <IMG SRC="http://nebula.wsimg.com/d3657b04208ae150f468167d20de36aa?AccessKeyId=B5E8C3F7E00CA38BCFD7&disposition=0&alloworigin=1"> </MARQUEE>
        </center>
  </div>
@endsection

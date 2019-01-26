<!-- Vista para cliente del paquete -->
<style>
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
      <br>
      <!-- Carousel de fotos -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="item active">
              <a href="{{Storage::url($imagenes->Imagen1)}}">
                <img src="{{Storage::url($imagenes->Imagen1)}}" class="img-rounded" alt="First slide">
              </a>
            </div>
            <div class="item">
              <a href="{{Storage::url($imagenes->Imagen2)}}">
                <img src="{{Storage::url($imagenes->Imagen2)}}" class="img-rounded" alt="Second slide">
              </a>
            </div>
            <div class="item">
              <a href="{{Storage::url($imagenes->Imagen3)}}">
                <img src="{{Storage::url($imagenes->Imagen3)}}" class="img-rounded" alt="Third slide">
              </a>
            </div>
          </div>
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="fa fa-angle-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="fa fa-angle-right"></span>
          </a>
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
            @role(['Director','Agente'])
            <center>
              <a class="btn btn-warning fa fa-cog" title="Editar" href="{{route('adminPaquete.edit', $paquete['IdPaquete'])}}"> Editar información</a>
              <a class="btn btn-warning fa fa-th-list" title="Editar" href="{{route('adminPaquete.listadopersonas', $paquete['IdPaquete'])}}"> Consultar listado de persona</a>
            </center>
              <br>
            @endrole
            <center><a class="btn btn-info" title="Descargar como PDF" href="{{route('adminPaquete.informacion', $paquete['IdPaquete'])}}"><i class="fa Example of download fa-download"></i>
               Descargar información como PDF</a></center>
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
        <td><i class="fa fa-calendar" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($paquete->FechaSalida)->format('d/m/Y')}}</td>
        <td><i class="fa fa-calendar" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($paquete->FechaRegreso)->format('d/m/Y')}}</td>
        </tr>
        <tr>
        <td><i class="fa fa-clock-o" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($paquete->HoraSalida)->format('h:i a')}}</td>
        <td></td>
        </tr>
        </table>
        <br>
        <div class="row">
          <div class="col-md-6">
            <p><b><i class="fa fa-map-marker" aria-hidden="true"></i> Punto de reunión:</b> {{ $paquete->LugarRegreso}} </p>
          </div>
          <div class="col-md-6">
            <p><b><a href="{{$paquete->Galeria}}" target="_blank"><i class="fa fa-picture-o" aria-hidden="true"></i> Link de Facebook para galeria de imagenes</a></b></p>
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

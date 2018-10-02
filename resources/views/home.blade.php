<style>

.responsive {
    width: 100%;
    height: auto;
}
.fadein img{
  /* opacity:1; */
  transition: 1s ease;
}

.fadein img:hover{
  /* opacity:0.7; */
  filter:contrast(125%) brightness(115%);
  transition: 1s ease;
}

div.figure{
   /* width:473px;
   height: 400px; */
   overflow:hidden; /*hide bounds of image */
   margin:0;   /*reset margin of figure tag*/
}
div.figure img{
   display:block; /*remove inline-block spaces*/
   width:100%; /*make image streatch*/
    /*  margin:0 -38.885%;

   width:177.777%; */
}
.image {
   position: relative;
   width: 100%; /* for IE 6 */
}

h4 {
   position: absolute;
   top: 200px;
   left: 0;
   width: 100%;
}
h4 span {
   color: white;
   letter-spacing: -1px;
   background: rgb(0, 0, 0); /* fallback color */
   background: rgba(0, 0, 0, 0.7);
   padding: 10px;
}
</style>
@extends('master')

@section('head')
@endsection

@section('contenido')

@if(session('status'))
   <script type="text/javascript">
  alertify.success('<p class="fa fa-check" style="color: white"></p> {{ session("status") }}');
  </script>
@endif
@if(session('fallo'))
  <script type="text/javascript">
 alertify.error('<p class="fa fa-close" style="color: white"></p> {{session("fallo") }}');
 </script>
@endif

  <div class="text-center" >
    <img alt="Geoturismo logo" src="http://nebula.wsimg.com/d3657b04208ae150f468167d20de36aa?AccessKeyId=B5E8C3F7E00CA38BCFD7&disposition=0&alloworigin=1">
  </div>

  <div class="row">
      <div class="col-md-12">
    @if (count($reservaciones) == 0)
      <br>
      <p>No hay Reservas registradas<p>
    @elseif (count($reservaciones) >= 1)
      <h3 style="text-align:center">Reservaciones</h3>
        @php $hoy= date("Y-m-d");  @endphp
      @foreach($reservaciones as $reservacion)
       @if($reservacion->paquete->FechaSalida > $hoy)
        <div class="col-sm-12 ">
          <!-- box info de cada paquete-->
          <div class="small-box  disabled color-palette" style="background-color:#dbdde0">
            <span class=" label" style="background:#568D51;text-align:right"></span>
            <div class="inner" style="text-align:center;display:block;">
              <a style="color:#4c5b51; font-weight:bold;align:center" href="{{ url('MostrarPaqueteCliente/'.$reservacion->paquete->IdPaquete) }}"> {{$reservacion->paquete->NombrePaquete}}</a></h3>
              <div class="box-body">
                <p style="color:#4c5b51">Fecha de salida: {{$reservacion->paquete->FechaSalida}} </p>
                <p style="color:#4c5b51">Cupos reservados: {{$reservacion->NumeroAcompanantes}} </p>
                <p style="color:#4c5b51">Reservada en {{$reservacion->FechaReservacion}} </p>
              </div>
            </div><!-- /.contenido-->
            <a href="{{  route('Reservacion.edit', $reservacion) }}" class="small-box-footer">
              Editar <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div> <!--/ box info de cada paquete-->
        </div><!-- /. colm-d-->
        @endif
      @endforeach
      <a href="{{  route('Reservacion.index') }}" class="small-box-footer">
        Historial de reservas <i class="fa fa-arrow-circle-right"></i>
      </div>
    @endif
  </div><!-- /.row -->

<div style="padding:1px 100px 1px 100px;">
  <div class="text-center">
    <img class="responsive" alt="Geoturismo banner" src="https://78.media.tumblr.com/6a60fa5ae43c94c672501188c1f2ef02/tumblr_pf41uvQQwE1qa3lvmo1_r1_1280.png">
  </div>
</div>

<div class="row">

  @foreach($paquetes as $paquete)

  <div class="col-sm-4 ">
   <div class="fadein figure">
    <!-- muestra 1 imagen de cada paquete-->
    @foreach ($imagenes as $key=>$imagen)
      @php  $key=0 @endphp
      @if($imagen->id_paquete == $paquete->IdPaquete )
      @php  ++$key @endphp
        <a href="{{ url('MostrarPaqueteCliente/'.$paquete->IdPaquete) }}">
          <img src="{{Storage::url($imagen->Imagen3)}}" class="responsive figure"/>
        </a>
      @endif
      @if($key == 1)
        @break
      @endif
    @endforeach

    </div>
    <!-- /muestra 1 imagen de cada paquete-->
    <!-- box info de cada paquete-->
    <div class="small-box  disabled color-palette" style="background-color:#9CC1A9">
      <span class=" label" style="background:#568D51;text-align:right">{{$paquete->ruta->pais->nombrePais}}</span>
      <div class="inner" style="text-align:center;display:block;">
        <a style="color:#4c5b51; font-weight:bold;align:center" href="{{ url('MostrarPaqueteCliente/'.$paquete->IdPaquete) }}">{{ $paquete->NombrePaquete }} </a></h3>
        <div class="box-body">
          <p style="color:#4c5b51">Fecha de salida: {{ $paquete->FechaSalida}}</p>
        </div>
      </div><!-- /.inner-->
      <a href="{{ url('MostrarPaqueteCliente/'.$paquete->IdPaquete) }}" class="small-box-footer">
        Leer más <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div> <!--/ box info de cada paquete-->
  </div><!-- /. colm-d-->

  @endforeach

</div><!-- /.row -->
<div class="text-center" >
  <img alt="Geoturismo logo" src="http://nebula.wsimg.com/f1a6ab585e8127b5cc523d8f47ab7fe1?AccessKeyId=B5E8C3F7E00CA38BCFD7&disposition=0&alloworigin=1">
  <center>{!! $paquetes->appends(\Request::except('page'))->render() !!}</center>
</div>
<center></center>

@endsection

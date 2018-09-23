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

  <div class="text-center" >
    <img alt="Geoturismo logo" src="http://nebula.wsimg.com/d3657b04208ae150f468167d20de36aa?AccessKeyId=B5E8C3F7E00CA38BCFD7&disposition=0&alloworigin=1">
  </div>

  <div class="row">
    @if (count($reservaciones) === 0)
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

      <p style="text-align:center">Reservaciones pasadas </p>
      @foreach($reservaciones as $reservacion)

       @if($reservacion->paquete->FechaSalida < $hoy)
        <div class="col-sm-6">
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
          </div> <!--/ box info de cada paquete-->
        </div><!-- /. colm-d-->
        @endif
      @endforeach
    @endif

  </div><!-- /.row -->
<center>{!! $reservaciones->appends(\Request::except('page'))->render() !!}</center>


@endsection

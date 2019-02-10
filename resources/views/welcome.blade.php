<style>
.responsive {
    width: 100%;
    height: auto;
}
.fadein img{
  transition: 1s ease;
}

.fadein img:hover{
  filter:contrast(125%) brightness(115%);
  transition: 1s ease;
}

div.figure{
   overflow:hidden; /*hide bounds of image */
   margin:0;   /*reset margin of figure tag*/
}
div.figure img{
   display:block; /*remove inline-block spaces*/
   width:100%; /*make image streatch*/
}
.image {
   position: relative;
   width: 100%; /* for IE 6 */
}
img.resize {
  width:200px;
  height:250px;
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

@section('contenido')
<div class="text-center" >
  <img alt="Geoturismo logo" src="..\images\logogeo.png">
</div>
<div class="col-md-12">
  <div class="text-center">
    <img class="responsive" alt="Geoturismo banner" src="..\images\bannergeo.png">
  </div>
  <br>
</div>

<div class="row">
  @foreach($paquetes as $paquete)
  @if($paquete->compara_fechas == 2 && $paquete->AprobacionPaquete == 1 && $paquete->DisponibilidadPaquete == 1)
  <div class="col-sm-4">
   <div class="fadein figure">
    <!-- muestra 1 imagen de cada paquete-->
    @foreach ($imagenes as $key=>$imagen)
      @php  $key=0 @endphp
      @if($imagen->id_paquete == $paquete->IdPaquete )
      @php  ++$key @endphp
        <a href="{{ url('MostrarPaqueteCliente/'.$paquete->IdPaquete) }}">
          <img src="{{Storage::url($imagen->Imagen1)}}" class="responsive figure resize"/>
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
          <p style="color:#4c5b51">Fecha de salida: {{ \Carbon\Carbon::parse($paquete->FechaSalida)->format('d/m/Y')}}</p>
          <p style="color:#4c5b51">* Faltan {{$paquete->dias}} días *</p>
        </div>
      </div><!-- /.inner-->
      <a href="{{ url('MostrarPaqueteCliente/'.$paquete->IdPaquete) }}" class="small-box-footer">
        Leer más <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div> <!--/ box info de cada paquete-->
  </div><!-- /. colm-d-->
  @endif
  @endforeach
</div>
<br>
<br>
<div class="row">
  <center><script type="text/javascript" src="https://comercios.pagadito.com/validate/index.php?merchant=1c9ef2047612e210b290a204bbab9c03&size=m&_idioma=es"></script></center>
  <!-- <center><img alt="Geoturismo logo" src="http://nebula.wsimg.com/f1a6ab585e8127b5cc523d8f47ab7fe1?AccessKeyId=B5E8C3F7E00CA38BCFD7&disposition=0&alloworigin=1"></center> -->
  <center>{!! $paquetes->appends(\Request::except('page'))->render() !!}</center>
</div>
@endsection

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GEOUTURISMO</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('adminLte/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminLte/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('adminLte/Ionicons/css/ionicons.min.css') }}">
  <!--Tablas-->

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminLte/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{ asset('adminLte/css/skins/skin-green.min.css') }}">
   <!-- Para datapicker -->
   <link rel="stylesheet" href="{{ asset('adminLte/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
   <!--Para Alertify -->
   <!--Para Alertify Js-->
  <script type="text/javascript" src="{{ asset('lib/alertify.js')}}"></script>
   <link rel="stylesheet" href="{{ asset('themes/alertify.core.css')}}">
   <link rel="stylesheet" href="{{ asset('themes/alertify.default.css')}}">
   <link rel="stylesheet" href="{{ asset('adminLte/lightGallery/dist/css/lightgallery.min.css')}}">

   <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('adminLte/select2/dist/css/select2.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
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
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class=" skin-green layout-top-nav ">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">

      <div class="navbar-header">
  <a href="/" class="navbar-brand"><b>Geo</b>turismo</a>
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
    <i class="fa fa-bars"></i>
  </button>
</div>

      <ul class="nav navbar-nav">
        <li><a style="text-align: right"href="/login"><strong>Iniciar Sesión</strong></a></li>
        <li><a href="/register"><strong>Crear Cuenta</strong></a></li>
      </ul>

    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
         <!-- Default box -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">@yield('Title')Paquetes Turísticos</h3>

         <!-- <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div> -->
        </div>
        <div class="box-body">
          @yield('contenido')
          <div style="padding:1px 100px 1px 100px;">
        {{--
            <div class="text-center" >
              <img alt="Geoturismo logo" src="http://nebula.wsimg.com/d3657b04208ae150f468167d20de36aa?AccessKeyId=B5E8C3F7E00CA38BCFD7&disposition=0&alloworigin=1">
            </div>
            --}}
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
                    <img src="{{Storage::url($imagen->Imagen1)}}" class="responsive figure"/>
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
          </div>
        </div>
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      El Salvador
    </div>
    <!-- Default to the left -->
    <strong>Derechos Reservados &copy; 2018 <a href="#">Geoturismo</a>.</strong> Todos los derechos.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset('adminLte/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('adminLte/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Datapicker -->
<script src="{{ asset('adminLte/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminLte/js/adminlte.min.js') }}"></script>
<!-- Para mascaras-->
<script src="{{ asset('adminLte/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('adminLte/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('adminLte/input-mask/jquery.inputmask.extensions.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('adminLte/select2/dist/js/select2.full.min.js')}}"></script>

<script src="{{ asset('adminLte/lightGallery/dist/js/lightgallery.min.js')}}"></script>

</body>
</html>

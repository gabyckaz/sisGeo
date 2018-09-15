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
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  padding: 10px;
}
.grid-item {
  background-color: rgba(255, 255, 255, 0.8);

  padding: 20px;
  font-size: 20px;
  text-align: center;
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
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>EO</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Geo</b>Turismo</span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          @if(Auth::check())
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{ Storage::url( auth()->user()->avatar ) }}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{ Storage::url(auth()->user()->avatar) }}" class="img-circle" alt="User Image">
                <p>
                  {{ auth()->user()->name }} - {{ auth()->user()->name }}
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                  <form action="{{ route('logout') }}" method="POST">
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-default btn-flat">Salir</button>
                  </form>
               </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          @endif
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        @if(Auth::check())
        <div class="pull-left image">
          <img src="{{ Storage::url( auth()->user()->avatar ) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ auth()->user()->name}}</p>
          <!-- Status -->
        </div>
        @endif
      </div>

      <!-- search form (Optional) -->
      <!--<form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">OPCIONES</li>

@if(Auth::check())
    <li class="active">
      <a href="{{ route('home') }}">
        <i class="fa fa-home"></i>
        <span>Inicio</span>
      </a>
    </li>

    <li class="active">
      <a href="#">
        <i class="fa fa-user"></i>
        <span>Mi Cuenta</span>
      </a>
    </li>

    <li class="active">
      <a href="{{ route('home') }}">
        <i class="fa fa-calendar"></i>
        <span>Reservas</span>
      </a>
    </li>
    @endif

    @guest
    <li class="active">
      <a href="{{ route('login') }}">
        <i class="fa fa-info"></i>
        <span>Iniciar sesión</span>
      </a>
    </li>

    <li class="active">
      <a href="{{ route('register') }}">
        <i class="fa fa-info"></i>
        <span>Registrarse</span>
      </a>
    </li>
    @endguest
    <li class="active"><a href="#"><i class="fa fa-info"></i> <span>Acerca de</span></a></li>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

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
          <div class="grid-container">
            @foreach($paquetes as $paquete)

            <div class="grid-item">
              <div class="small-box bg-yellow disabled color-palette">
                <div class="inner">

                <a style="color:white; font-weight:bold" href="{{ url('MostrarPaqueteCliente/'.$paquete->IdPaquete) }}">{{ $paquete->NombrePaquete }} </a></h3>
                  <div class="box-body">

                  <p>Fecha de salida: {{ $paquete->FechaSalida}}</p>
                  <p>Precio: $ {{ $paquete->Precio}}</p>
                  <p>Dificultad: {{ $paquete->Dificultad}}</p>


               </div>
             </div><!-- /.inner-->
             <a href="{{ url('MostrarPaqueteCliente/'.$paquete->IdPaquete) }}" class="small-box-footer">
              Leer más <i class="fa fa-arrow-circle-right"></i>
            </a>
            </div> <!-- /.small-box bg-yellow-->
          </div><!-- /.grid item -->
            @endforeach
          </div><!-- /.grid container -->
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

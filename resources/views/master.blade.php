<!DOCTYPE html>

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
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminLte/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminLte/css/skins/skin-green.min.css') }}">
  <!-- Para datapicker -->
  <link rel="stylesheet" href="{{ asset('adminLte/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!--Para Alertify -->
  <!--Para Alertify Js-->
  <script type="text/javascript" src="{{ asset('lib/alertify.js')}}"></script>
  <link rel="stylesheet" href="{{ asset('themes/alertify.core.css')}}">
  <link rel="stylesheet" href="{{ asset('themes/alertify.default.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('adminLte/select2/dist/css/select2.min.css')}}">
  <!-- Datatables -->
  <link rel="stylesheet" href="{{ asset('adminLte/data-tables/css/dataTables.bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminLte/data-tables/css/dataTables.checkboxes.css')}}">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<?php function activeMenu($url){
    return request()->is($url) ? 'active' : '' ;
  }?>


<body class="hold-transition skin-green sidebar-mini">

<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header">
    @auth
    <!-- Logo -->
    <a href="/" class="logo">
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
          <!-- Notifications Menu -->
          @role(['Director'])
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="{{ route('adminPaquete.estado')}}" title="Paquetes pendientes de aprobar">
              <i class="fa fa-bell-o"></i>
                @php
                  $pendientes = App\Paquete::where('AprobacionPaquete','=','0')->count();
                @endphp
                @if($pendientes >= 1)
                   <span class="label label-warning">{{$pendientes}}</span>
                @endif
            </a>
          </li>
          @endrole
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
                  {{ auth()->user()->persona->PrimerNombrePersona }} - {{ auth()->user()->persona->PrimerApellidoPersona }}
                  <!--small>Member since Nov. 2012</small-->
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
               <div class="pull-left">
                <a href="{{ route('usuario.completar.informacion') }}" class="btn btn-default btn-flat">Perfil</a>
               </div>
                <div class="pull-right">
                  <form action="{{ route('logout') }}" method="POST">
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-default btn-flat">Salir</button>
                  </form>
                </div>
               </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <!-- a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a -->
            <a href="{{ route('home') }}" ><i class="fa fa-home"></i></a>
          </li>
        </ul>
      </div>
    </nav>
    @endauth
    @guest
    <a href="/" class="logo">
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
          <li><a style="text-align: right"href="/login"><strong>Iniciar Sesión</strong></a></li>
          <li><a href="/register"><strong>Crear Cuenta</strong></a></li>
          </ul>
      </div>
    </nav>
  </header>
    <aside class="main-sidebar">
      <section class="sidebar">
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">OPCIONES</li>
            <li><a href="{{ route('welcome') }}"><i class="fa fa-home"></i><span>Inicio</span></a></li>
            <li class="{{ activeMenu('acercade') }}">
              <a href="/acercade">
                <i class="fa fa-info"></i>
                <span>Acerca de</span>
              </a>
            </li>
            <li class="{{ activeMenu('condiciones') }}">
              <a href="/condiciones">
                <i class="fa fa-check-square-o" aria-hidden="true"></i>
                <span>Condiciones</span>
              </a>
            </li>
            <li class="{{ activeMenu('migratoria') }}">
              <a href="/migratoria">
                <i class="fa fa-check-square-o" aria-hidden="true"></i>
                <span>Información migratoria</span>
              </a>
            </li>
          </ul>
      </section>
    </aside>
    @endguest
  </header>
  @auth
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ Storage::url( auth()->user()->avatar ) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ auth()->user()->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">OPCIONES</li>

    <li class="{{ activeMenu('home') }}">
      <a href="{{ route('home') }}">
        <i class="fa fa-home"></i>
        <span>Inicio</span>
      </a>
    </li>
    @role('Admin')
    <li class="{{ activeMenu('adminUser') }}">
      <a href="{{ route('adminUser.index') }}">
        <i class="fa fa-users"></i>
        <span>Usuarios</span>
      </a>
    </li>
    <li class="{{ activeMenu('adminUser/agregarGuiaTuristico') }}">
      <a href="{{ route('admin.agregar.guiaTuristico') }}">
        <i class="fa fa-leaf"></i>
        <span>Guias Turisticos</span>
      </a>
    </li>
    @endrole
    @role('User')
    <li class="treeview {{ (request()->is('user/completarInformacion') || request()->is('user/agregarFamiliarAmigo')) ? 'active' : '' }}">
      <a href="#">
        <i class="fa fa-user"></i><span>Mi cuenta</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('usuario.completar.informacion') }}">
            <i class="fa fa-star"></i>
            Completar Informacion</a></li>
          <li><a href="{{ route('user.agregar.familiarAmigo') }}">
            <i class="fa fa-star"></i>
            Agregar acompañantes</a></li>
        </ul>
    </li>
    @endrole

    @role(['Director','Agente'])
    <li class="{{ activeMenu('adminMensaje') }}">
      <a href="{{ route('adminMensaje.index') }}">
        <i class="fa fa-envelope-o"></i>
        <span>Conf. Mensajes</span>
      </a>
    </li>
    <li class="{{ activeMenu('otroturista') }}">
      <a href="{{ route('otroturista.index') }}">
        <i class="fa fa-money"></i>
        <span>Registrar Pago</span>
      </a>
    </li>
    <li class=" treeview {{ (request()->is('MostrarRutaTuristica') ||  request()->is('CrearCategoria'))  ? 'active' : '' }} ">
      <a href="#">
        <i class="fa fa-map-marker"></i><span>Ruta Turistica</span>
          <i class="pull-right-container"></i>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
           <li>  <a href="{{ route('adminRutaTuristica.index') }}">
               <i class="fa fa-star"></i>
               <span>Ruta Turistica</span>
             </a></li>
             <li><a href="{{ route('adminCategoria.create')}}">
               <i class="fa fa-star"></i>
               Categorias</a></li>
        </ul>
    </li>
     <li class=" treeview {{ (request()->is('CrearPaquete') || request()->is('MostrarPaquete') || request()->is('ActualizarEstado') || request()->is('CrearOpcionesPaquete')) ? 'active' : '' }}">
      <a href="#">
        <i class="fa fa-ticket"></i><span>Paquetes Turísticos</span>
          <i class="pull-right-container"></i>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('adminPaquete.create')}}">
            <i class="fa fa-star"></i>
            Crear Paquete Turístico</a></li>
          <li><a href="">
             <li><a href="{{ route('adminPaquete.index')}}">
            <i class="fa fa-star"></i>
            Paquetes Turísticos</a></li>
            <li><a href="{{ route('adminOpcionesPaquete.create')}}">
              <i class="fa fa-star"></i>
              Opciones Paquete</a></li>
            <li><a href="{{ route('adminPaquete.estado')}}">
              <i class="fa fa-star"></i>
              Aprobar Paquete</a></li>
            <li><a href="{{ route('adminPaquete.costos.index')}}">
              <i class="fa fa-star"></i>
              Agregar Costos</a></li>
        </ul>
    </li>
    <li class="treeview {{ (request()->is('adminEmpresaTransporte') || request()->is('adminTipoTransporte') || request()->is('adminTransporte')) ? 'active' : '' }}">
      <a href="#">
        <i class="fa fa-bus"></i>  <span>Transporte</span>
        <i class="fa fa-angl-left pull-right"></i>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('adminTipoTransporte.index') }}">
            <i class="fa fa-star"></i>
            Tipos de Transporte</a></li>
          <li><a href="{{ route('adminEmpresaTransporte.index') }}">
            <i class="fa fa-star"></i>
            Empresas</a></li>
          <li><a href="{{ route('adminTransporte.index') }}">
            <i class="fa fa-star"></i>
            Transporte</a></li>
        </ul>

    </li>
    <li class="{{ activeMenu('graficas') }}">
      <a href="{{ route('graficas') }}">
        <i class="fa fa-bar-chart"></i>
        <span>Gráficas</span>
      </a>
    </li>
    @endrole
    <li class="{{ activeMenu('acercade') }}">
      <a href="/acercade">
        <i class="fa fa-info"></i>
        <span>Acerca de</span>
      </a>
    </li>
    <li class="{{ activeMenu('condiciones') }}">
      <a href="/condiciones">
        <i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span>Condiciones</span>
      </a>
    </li>
    <li class="{{ activeMenu('migratoria') }}">
      <a href="/migratoria">
        <i class="fa fa-check-square-o" aria-hidden="true"></i>
        <span>Información migratoria</span>
      </a>
    </li>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  @endauth

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Geoturismo
        <small>El Salvador</small>
      </h1>
    </section>
    <section class="content container-fluid">
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">@yield('Title')</h3>
        </div>
        <div class="box-body">
          @yield('contenido')
        </div>
      </div>
    </section>
  </div>

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      El Salvador
    </div>
    <!-- Default to the left -->
    <strong>Derechos Reservados &copy; 2018 <a href="#">Geoturismo</a>.</strong> Todos los derechos.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>
          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label><p>Some information about this general settings option</p>
          </div>
        </form>
      </div>
    </div>
  </aside>
  <div class="control-sidebar-bg"></div>
</div>


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



<!-- DataTables-->
<script src="{{ asset('adminLte/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('adminLte/data-tables/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('adminLte/data-tables/js/dataTables.checkboxes.min.js')}}"></script>
<script src="{{ asset('js/script.js')}}"></script>

<script src="{{ asset('adminLte/sweetalert2/sweetalert2.all.js')}}"></script>

<script type="text/javascript" src="{{ asset('/js/scripts/paquetes.js') }}" > </script>

{{-- @include('sweetalert::alert') --}}



<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
<script type="text/javascript">

     </script>

</body>
</html>

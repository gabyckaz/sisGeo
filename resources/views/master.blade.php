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

   <!-- Datatables -->
  <link rel="stylesheet" href="{{ asset('adminLte/data-tables/css/dataTables.bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminLte/data-tables/css/dataTables.checkboxes.css')}}">

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
<?php function activeMenu($url){
    return request()->is($url) ? 'active' : '' ;
  }?>
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
@auth
<body class="hold-transition skin-green sidebar-mini">
@endauth
@guest
<body class="skin-green layout-top-nav ">
@endguest
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
          <!-- Messages: style can be found in dropdown.less-->
          <!--li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <!--a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <!--ul class="menu">
                  <li><!-- start message -->
                    <!--a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <!--img src="{ Storage::url( auth()->user()->avatar ) }}" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <!--h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <!--p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                <!--/ul>
                <!-- /.menu -->
              <!--/li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <!--li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <!--a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <!--ul class="menu">
                  <li><!-- start notification -->
                    <!--a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                <!--/ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <!--li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <!--a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <!--ul class="menu">
                  <li><!-- Task item -->
                    <!--a href="#">
                      <!-- Task title and progress text -->
                      <!--h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <!--div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <!--div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                <!--/ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
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
              <!-- Menu Body -->
              <!--li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              <!--/li>
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
    @endrole

    <li class="treeview {{ (request()->is('user/completarInformacion') || request()->is('user/agregarFamiliarAmigo')) ? 'active' : '' }}">
      <a href="#">
        <i class="fa fa-user"></i>
          <i class="fa fa-angle-left pull-right-container"></i>
          <i class="fa fa-angl-left pull-right"></i>
        <span>Mi cuenta</span>
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
            Agregar Familiar o Amigo</a></li>
        </ul>
    </li>
    <li class="{{ activeMenu('Reservacion') }}">
      <a href="{{ route('Reservacion.index') }}">
        <i class="fa fa-calendar"></i>
        Mis Reservas <!--span class="label pull-right bg-green">2</span-->
      </a>
    </li>
    @role('Admin')
    <li class=" treeview {{ (request()->is('MostrarRutaTuristica') ) ? 'active' : '' }}">
         <a href="#">
           <i class="fa fa-map-marker"></i>
             <i class="fa fa-angle-left pull-right-container"></i>
             <i class="fa fa-angl-left pull-right"></i>
             <span>Ruta Turistica</span>
             <span class="pull-right-container">
               <ul class="treeview-menu">
                       <li><a href="{{ route('adminRutaTuristica.index') }}">
                         <i class="fa fa-star"></i>
                         Consultar Ruta Turística</a></li>
                       <li><a href="">
                         <i class="fa fa-star"></i>
                           Editar Ruta Turística</a></li>
             </ul>
   </li>
     <li class=" treeview {{ (request()->is('CrearPaquete') || request()->is('MostrarPaquete')) ? 'active' : '' }}">
      <a href="#">
        <i class="fa fa-ticket"></i>
          <i class="fa fa-angle-left pull-right-container"></i>
          <i class="fa fa-angl-left pull-right"></i>
          <span>Paquetes Turísticos</span>
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
                    Mostrar Paquete Turístico</a></li>
                    <li><a href="{{ route('adminOpcionesPaquete.create')}}">
                      <i class="fa fa-star"></i>
                      Opciones Paquete</a></li>

        </ul>
    </li>
    <li class="treeview {{ (request()->is('adminEmpresaTransporte') || request()->is('adminTipoTransporte') || request()->is('adminTransporte')) ? 'active' : '' }}">
      <a href="#">
        <i class="fa fa-bus"></i>
          <i class="fa fa-angle-left pull-right-container"></i>
          <i class="fa fa-angl-left pull-right"></i>
        <span>Transporte</span>
        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
      </a>
        <ul class="treeview-menu">
                  <li><a href="{{ route('adminEmpresaTransporte.index') }}">
                    <i class="fa fa-star"></i>
                    Empresas</a></li>
                  <li><a href="{{ route('adminTipoTransporte.index') }}">
                    <i class="fa fa-star"></i>
                    Tipos de Transporte</a></li>
                  <li><a href="{{ route('adminTransporte.index') }}">
                    <i class="fa fa-star"></i>
                      Transporte</a></li>
        </ul>

    </li>
    @endrole

        <li class=""><a href="#"><i class="fa fa-info"></i> <span>Acerca de</span></a></li>


      <!-- /.sidebar-menu -->
          <li class="active"><a href="#"><i class="fa fa-info"></i> <span>Acerca de</span></a></li>
    </section>
    <!-- /.sidebar -->
  </aside>
  @endauth

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Geoturismo
        <small>El Salvador</small>
      </h1>
      <!--ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Aqui</li>
      <!--/ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">



         <!-- Default box -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">@yield('Title')</h3>

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
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
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

<script src="{{ asset('adminLte/sweetalert2/sweetalert2.all.js')}}"></script>

<script type="text/javascript" src="{{ asset('/js/scripts/paquetes.js') }}" > </script>

{{-- @include('sweetalert::alert') --}}



<!-- DataTables-->
<script src="{{ asset('adminLte/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('adminLte/data-tables/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('adminLte/data-tables/js/dataTables.checkboxes.min.js')}}"></script>
<script src="{{ asset('js/script.js')}}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
<script type="text/javascript">

     </script>

</body>
</html>

<!-- <style>
.page-break {
    page-break-after: always;
}
</style>
<h1>Page 1</h1>
<div class="page-break"></div>
<h1>Page 2</h1> -->

<!DOCTYPE html>
<html lang="es">
<head>
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
<body>
     
     @yield('contenido')

</body>
</html>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Notificacion Geouturismo</title>
    <link rel="stylesheet" href="{{ asset('adminLte/bootstrap/dist/css/bootstrap.min.css') }}">
</head>
<body>
    <center>    
<div class="panel panel-success">
  <div class="panel-heading"><h1>{{ $mensaje->de }}</h1></div>
  <div class="panel-body">
    {{ $mensaje->cuerpoMensaje }}.
    <p>Puedes visitar el siguiente enlace para mas informacion: </p>
    <h3><a href="{{ $mensaje->url }} ">Nuevo Paquete Turistico</a></h3>
    <p>¡La idea de viajar es contemplar el mismo sol en un lugar diferente!</p>
    <p>¡Feliz Dia!</p>
    <p><small>Fecha de recibo : {{ $mensaje->fechaEnvio }}<small></p>
  </div>
</div>
</center>
</body>
</html>

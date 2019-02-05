<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Notificacion Geouturismo</title>
</head>
<body>
    <center>
    <p>{{ $mensaje->de }}</p>

    <textarea rows="10" cols="75" readonly>{{ $mensaje->cuerpoMensaje }}</textarea>

     <p>@lang("Puedes visitar el siguiente enlace para mas informacion:")  </p>
    <p><a href="{{ $mensaje->url }} ">Nuevo Paquete</a></p>
    <p>¡La idea de viajar es contemplar el mismo sol en un lugar diferente!</p>
    <p>¡Feliz Dia!</p>
    <p>Fecha de recibo : {{ $mensaje->fechaEnvio }}</p>
    </center>

</body>
</html>

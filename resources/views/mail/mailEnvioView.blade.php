<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Notificacion Geouturismo</title>
</head>
<body>
    <p>{{ $mensaje->de }}</p>
    <p>----</p>
    <textarea rows="10" cols="75" >{{ $mensaje->cuerpoMensaje }}</textarea>
    <p>--------</p>
     <p>Puedes visitar el siguiente link para mas informacion  </p>
    
    <p><a href="{{$mensaje->url}}">{{$mensaje->url}}</a></p>
    <p>Fecha de recibo : {{ $mensaje->fechaEnvio }}</p>
</body>
</html>
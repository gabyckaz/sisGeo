/*=============================================
=       SUBIENDO LA FOTO DEL USUARIO 1          =
=============================================*/

$(".nuevaFoto").change(function(){

  var imagen = this.files[0];

  // Validando el formato y el tamaño de la imagen
  if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" && imagen["type"] != "image/gif"){

    $(".nuevaFoto").val("");

    alertify.error("Error al subir la imagen, Imagen debe ser formato PNG, JPG o GIF");

  }else if(imagen["size"] > 10000000){

    $(".nuevaFoto").val("");
    alertify.error("Error al subir la imagen, La imagen no debe pesar más de 10 MB");
  }else{

    // La imagen seleccionada se previsualiza en el formulario

    var datosImagen = new FileReader;
    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function(event){
      var rutaImagen = event.target.result;
      $(".previsualizar").attr("src", rutaImagen);
    });



  }

});

/*=============================================
=       SUBIENDO LA FOTO DEL USUARIO  2        =
=============================================*/

$(".nuevaFoto2").change(function(){

  var imagen = this.files[0];

  // Validando el formato y el tamaño de la imagen
  if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" && imagen["type"] != "image/gif"){

    $(".nuevaFoto2").val("");

    alertify.error("Error al subir la imagen, Imagen debe ser formato PNG, JPG o GIF");

  }else if(imagen["size"] > 10000000){

    $(".nuevaFoto2").val("");

    alertify.error("Error al subir la imagen, La imagen no debe pesar más de 10 MB");

  }else{

    // La imagen seleccionada se previsualiza en el formulario

    var datosImagen = new FileReader;
    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function(event){
      var rutaImagen = event.target.result;
      $(".previsualizar2").attr("src", rutaImagen);
    });



  }

});

/*=============================================
=       SUBIENDO LA FOTO DEL USUARIO  3        =
=============================================*/

$(".nuevaFoto3").change(function(){

  var imagen = this.files[0];

  // Validando el formato y el tamaño de la imagen
  if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" && imagen["type"] != "image/gif"){

    $(".nuevaFoto3").val("");

  alertify.error("Error al subir la imagen, Imagen debe ser formato PNG, JPG o GIF");

}else if(imagen["size"] > 10000000){

    $(".nuevaFoto3").val("");

    alertify.error("Error al subir la imagen, La imagen no debe pesar más de 10 MB");

  }else{

    // La imagen seleccionada se previsualiza en el formulario

    var datosImagen = new FileReader;
    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function(event){
      var rutaImagen = event.target.result;
      $(".previsualizar3").attr("src", rutaImagen);
    });



  }

});

$(".nuevaFoto4").change(function(){

  var imagen = this.files[0];

  // Validando el formato y el tamaño de la imagen
  if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" && imagen["type"] != "image/gif"){

    $(".nuevaFoto4").val("");

  alertify.error("Error al subir la imagen, Imagen debe ser formato PNG, JPG o GIF");
}else if(imagen["size"] > 10000000){

    $(".nuevaFoto4").val("");

    alertify.error("Error al subir la imagen, La imagen no debe pesar más de 10 MB");
  }else{

    // La imagen seleccionada se previsualiza en el formulario

    var datosImagen = new FileReader;
    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function(event){
      var rutaImagen = event.target.result;
      $(".previsualizar4").attr("src", rutaImagen);
    });



  }

});

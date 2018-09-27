/*=============================================
=       SUBIENDO LA FOTO DEL USUARIO          =
=============================================*/

$(".nuevaFoto").change(function(){

	var imagen = this.files[0];

	// Validando el formato y el tamaño de la imagen
	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

		$(".nuevaFoto").val("");

		swal({
			title: "Error al subir la imagen",
			text: "!La imagen debe estar en formato PNG o JPG!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});

	}else if(imagen["size"] > 2000000){

		$(".nuevaFoto").val("");

		swal({
			title: "Error al subir la imagen",
			text: "!La imagen no debe pesar más de 2 MB!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});

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

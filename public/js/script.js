$(document).ready(function(){
        $('#tablaadminTransporte').DataTable({
            "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "Todos"]],
            "paging": true,
            "bpaging": true,
            "bFilter": true,
            "bInfo": false,
            "autoWidth": true,
        });
        $('#tablaadminEmpresa').DataTable({
            "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "Todos"]],
            "paging": true,
            "bpaging": true,
            "bFilter": true,
            "bInfo": false,
            "autoWidth": true,
        });
        $('#tablaadminRutaTuristica').DataTable({
            "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "Todos"]],
            "paging": true,
            "bpaging": true,
            "bFilter": true,
            "bInfo": false,
            "autoWidth": true,
        });
        $('#tablaAdminUser').DataTable({
            "paging": false,
            "bpaging": false,
            "bFilter": false,
            "bInfo": false,
            "autoWidth": true,
        });
        $('#tblAgregarFamiliarAmigo').DataTable({
            "paging": false,
            "bpaging": false,
            "bFilter": true,
            "bInfo": false,
            "autoWidth": true,
        });
        $('#tablaAdminPaquetes').DataTable({
            "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "Todos"]],
            "paging": true,
            "bpaging": true,
            "bFilter": true,
            "bInfo": false,
            "autoWidth": true,
        });

        $('#tablaActualizarPaquete').DataTable({
            "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "Todos"]],
            "paging": true,
            "bpaging": true,
            "bFilter": true,
            "bInfo": false,
            "autoWidth": true,
        });
        $('#tablaGastosExtras').DataTable({
            "paging": false,
            "bpaging": false,
            "bFilter": false,
            "bInfo": false,
            "autoWidth": true,
        });
        $('#tablaQueIncluye').DataTable({
            "paging": false,
            "bpaging": false,
            "bFilter": false,
            "bInfo": false,
            "autoWidth": true,
        });
        $('#tablaRecomendaciones').DataTable({
            "paging": false,
            "bpaging": false,
            "bFilter": false,
            "bInfo": false,
            "autoWidth": true,
        });
        $('#tablaCondiciones').DataTable({
            "paging": false,
            "bpaging": false,
            "bFilter": false,
            "bInfo": false,
            "autoWidth": true,
        });
        $('#tablaItinerario').DataTable({
            "paging": false,
            "bpaging": false,
            "bFilter": false,
            "bInfo": false,
            "autoWidth": true,
        });
        if($('#usuario').is(':checked') ){
             $('#total').val(1);
             $('#ctotal').val($('#total').val()*$('#cpersona').val());
             $('#minimoPago').val($('#ctotal').val() * 0.3);
             }
        var mytable = $("#tablaAmigos").DataTable({
            //ajax: 'https://api.myjson.com/bins/1us28',
            "searching": true,
            "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
            columnDefs: [
                {
                    targets: 0,
                    checkboxes: {
                        seletRow: true
                    }
                }
            ],
            select:{
                style: 'multi'
            },
            order: [[1, 'asc']]
        });
        $("#formularioAmigos").on('submit', function(e){
            var form = this
            var rowsel = mytable.column(0).checkboxes.selected();
            $.each(rowsel, function(index, rowId){
                $(form).append(
                    $('<input>').attr('type','hidden').attr('name','id[]').val(rowId)
                )
            })
            $("#view-rows").text(rowsel.join(","));
            var varStrAmigos = rowsel.join(",");
            var varStrFamilia = $('#strFamilia').val();
            console.log('*****************');
            if(varStrFamilia.length == 0 && varStrAmigos.length == 0){
             if( $('#usuario').is(':checked') ) {
               $('#total').val(1);
               $('#ctotal').val($('#total').val()*$('#cpersona').val());
               $('#minimoPago').val($('#ctotal').val() * 0.3);
             }else{
             $('#total').val(0);
             $('#ctotal').val($('#total').val()*$('#cpersona').val());
             $('#minimoPago').val($('#ctotal').val() * 0.3);
             }
            }
            else if(varStrFamilia.length > 0 && varStrAmigos.length > 0){
            var arrayFamilia = varStrFamilia.split(",");
            console.log('Longitud Familia: '+arrayFamilia.length);
            var arrayAmigos = varStrAmigos.split(",");
            console.log('Longitud Amigos: '+arrayAmigos.length);
            if( $('#usuario').is(':checked') ) {
            $('#total').val(arrayFamilia.length+arrayAmigos.length+1);
            $('#ctotal').val($('#total').val()*$('#cpersona').val());
            $('#minimoPago').val($('#ctotal').val() * 0.3);
            }else{
              $('#total').val(arrayFamilia.length+arrayAmigos.length);
              $('#ctotal').val($('#total').val()*$('#cpersona').val());
              $('#minimoPago').val($('#ctotal').val() * 0.3);
            }
            }else if(varStrFamilia.length == 0 && varStrAmigos.length > 0){
            var arrayAmigos = varStrAmigos.split(",");
            console.log('Longitud Amigos: '+arrayAmigos.length);
            if($('#usuario').is(':checked') ){
            $('#total').val(arrayAmigos.length +1);
            $('#ctotal').val($('#total').val()*$('#cpersona').val());
            $('#minimoPago').val($('#ctotal').val() * 0.3);
            }else{
             $('#total').val(arrayAmigos.length);
             $('#ctotal').val($('#total').val()*$('#cpersona').val());
             $('#minimoPago').val($('#ctotal').val() * 0.3);
            }
            }else if(varStrFamilia.length > 0 && varStrAmigos.length == 0){
             var arrayFamilia = varStrFamilia.split(",");
             console.log('Longitud Familia: '+arrayFamilia.length);
             if($('#usuario').is(':checked') ){
             $('#total').val(arrayFamilia.length+1);
             $('#ctotal').val($('#total').val()*$('#cpersona').val());
             $('#minimoPago').val($('#ctotal').val() * 0.3);
             }else{
                $('#total').val(arrayFamilia.length);
                $('#ctotal').val($('#total').val()*$('#cpersona').val());
                $('#minimoPago').val($('#ctotal').val() * 0.3);
             }
            }
            $('#strAmigos').val(rowsel.join(","));
            $("#view-form").text($(form).serialize())
            $('input[name="id\[\]"]', form).remove()
            e.preventDefault()
        });


        var mytable2 = $("#tablaFamilia").DataTable({
            //ajax: 'https://api.myjson.com/bins/1us28',
            "searching": true,
            "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
            columnDefs: [
                {
                    targets: 0,
                    checkboxes: {
                        seletRow: true
                    }
                }
            ],
            select:{
                style: 'multi'
            },
            order: [[1, 'asc']]
        });
        $("#formularioFamilia").on('submit', function(e){
            var form = this
            var rowsel = mytable2.column(0).checkboxes.selected();
            $.each(rowsel, function(index, rowId){
                $(form).append(
                    $('<input>').attr('type','hidden').attr('name','id[]').val(rowId)
                )
            })
            $("#view-rows2").text(rowsel.join(","));
            var varStrFamilia = rowsel.join(",");
            var varStrAmigos = $('#strAmigos').val();
            console.log('*****************');
            if(varStrFamilia.length == 0 && varStrAmigos.length == 0){
             if( $('#usuario').is(':checked') ) {
               $('#total').val(1);
               $('#ctotal').val($('#total').val()*$('#cpersona').val());
               $('#minimoPago').val($('#ctotal').val() * 0.3);
             }else{
             $('#total').val(0);
             $('#ctotal').val($('#total').val()*$('#cpersona').val());
             $('#minimoPago').val($('#ctotal').val() * 0.3);
             }
            }
            else if(varStrFamilia.length > 0 && varStrAmigos.length > 0){
            var arrayFamilia = varStrFamilia.split(",");
            console.log('Longitud Familia: '+arrayFamilia.length);
            var arrayAmigos = varStrAmigos.split(",");
            console.log('Longitud Amigos: '+arrayAmigos.length);
            if( $('#usuario').is(':checked') ) {
            $('#total').val(arrayFamilia.length+arrayAmigos.length+1);
            $('#ctotal').val($('#total').val()*$('#cpersona').val());
            $('#minimoPago').val($('#ctotal').val() * 0.3);
            }else{
              $('#total').val(arrayFamilia.length+arrayAmigos.length);
              $('#ctotal').val($('#total').val()*$('#cpersona').val());
              $('#minimoPago').val($('#ctotal').val() * 0.3);
            }
            }else if(varStrFamilia.length == 0 && varStrAmigos.length > 0){
            var arrayAmigos = varStrAmigos.split(",");
            console.log('Longitud Amigos: '+arrayAmigos.length);
            if($('#usuario').is(':checked') ){
            $('#total').val(arrayAmigos.length +1);
            $('#ctotal').val($('#total').val()*$('#cpersona').val());
            $('#minimoPago').val($('#ctotal').val() * 0.3);
            }else{
             $('#total').val(arrayAmigos.length);
             $('#ctotal').val($('#total').val()*$('#cpersona').val());
             $('#minimoPago').val($('#ctotal').val() * 0.3);
            }
            }else if(varStrFamilia.length > 0 && varStrAmigos.length == 0){
             var arrayFamilia = varStrFamilia.split(",");
             console.log('Longitud Familia: '+arrayFamilia.length);
             if($('#usuario').is(':checked') ){
             $('#total').val(arrayFamilia.length+1);
             $('#ctotal').val($('#total').val()*$('#cpersona').val());
             $('#minimoPago').val($('#ctotal').val() * 0.3);
             }else{
                $('#total').val(arrayFamilia.length);
                $('#ctotal').val($('#total').val()*$('#cpersona').val());
                $('#minimoPago').val($('#ctotal').val() * 0.3);
             }
            }
            $('#strFamilia').val(rowsel.join(","));
            $("#view-form2").text($(form).serialize())
            $('input[name="id\[\]"]', form).remove()
            e.preventDefault()
        });
    });

    $('#usuario').on('change', function(e){
    if (this.checked) {
        console.log('Checkbox  checked');
        $('#total').val(parseInt($('#total').val())+1);
        $('#ctotal').val($('#total').val()*$('#cpersona').val());
        $('#minimoPago').val($('#ctotal').val() * 0.3);
    } else {
        console.log('Checkbox  unchecked');
        $('#total').val($('#total').val()-1);
        $('#ctotal').val($('#total').val()*$('#cpersona').val());
        $('#minimoPago').val($('#ctotal').val() * 0.3);
    }
   });

       $(function () {
        /* var div = document.getElementById("documentos");
         if(div != null){
         div.style.display = "none"
         }*/

      /* $('#datepicker').datepicker({ autoclose: true })
       $('#datepicker2').datepicker({ autoclose: true }) */
       $("#dui").inputmask("99999999-9",{ 'placeholder': '00000000-0' })
       $("#pasaporte").inputmask("999999999",{ 'placeholder': '000000000' })
       //Initialize Select2 Elements
       $('.select2').select2()

        })

function filterFloat(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter(tempValue)=== false){
            return false;
        }else{
            return true;
        }
    }else{
          if(key == 8 || key == 13 || key == 0) {
              return true;
          }else if(key == 46){
                if(filter(tempValue)=== false){
                    return false;
                }else{
                    return true;
                }
          }else{
              return false;
          }
    }
};
function filter(__val__){
    var preg = /^([0-9]+\.?[0-9]{0,2})$/;
    if(preg.test(__val__) === true){
        return true;
    }else{
       return false;
    }

};

  $(document).ready(function() {
/*
Permite llenar dinamicamente el select  de condcutores
*/
$( "#selectIdTransporte" )
  .change(function() {
    var idTransporte = "";
    var ar = ($( "#selectIdTransporte" ).val()).split('-');
    idTransporte = ar[1];
    console.log(idTransporte);
    $.ajax({
        type: 'get',
        url: $('#rutaListaConductores').val() ,
        dataType: "json",
        data: {
            id: idTransporte//'1'
        }, success: function (data) {
                console.log(data);
                var response = data.conductores;
                $("#selectConductor").empty();
                 if(response.length > 0 && response.valor !== 'idDefault'){
                  for (var i = 0; i < response.length; i++) {
                    $('#selectConductor').append('<option value="' + response[i].IdConductor + '">' + response[i].NombreConductor + '</option>');
                    }
                  }else{
                    $('#selectConductor').append('<option value="defecto" >' + 'Selecciona un conductor' + '</option>');
                  }
        }
      });
  }).trigger( "change" );
});

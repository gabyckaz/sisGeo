$(document).ready(function(){
        if($('#usuario').is(':checked') ){
             $('#total').val(1);              
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
             }else{
              
             $('#total').val(0);
             }
            }
            else if(varStrFamilia.length > 0 && varStrAmigos.length > 0){
            var arrayFamilia = varStrFamilia.split(",");
            console.log('Longitud Familia: '+arrayFamilia.length);
            var arrayAmigos = varStrAmigos.split(",");
            console.log('Longitud Amigos: '+arrayAmigos.length);
            if( $('#usuario').is(':checked') ) {
            $('#total').val(arrayFamilia.length+arrayAmigos.length+1);
            }else{
              $('#total').val(arrayFamilia.length+arrayAmigos.length);  
            }
            }else if(varStrFamilia.length == 0 && varStrAmigos.length > 0){
            var arrayAmigos = varStrAmigos.split(",");
            console.log('Longitud Amigos: '+arrayAmigos.length);
            if($('#usuario').is(':checked') ){
            $('#total').val(arrayAmigos.length +1);
            }else{
             $('#total').val(arrayAmigos.length);
            }
            }else if(varStrFamilia.length > 0 && varStrAmigos.length == 0){
             var arrayFamilia = varStrFamilia.split(",");
             console.log('Longitud Familia: '+arrayFamilia.length);
             if($('#usuario').is(':checked') ){
             $('#total').val(arrayFamilia.length+1);
             }else{
                $('#total').val(arrayFamilia.length);
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
             }else{              
             $('#total').val(0);
             }
            }
            else if(varStrFamilia.length > 0 && varStrAmigos.length > 0){
            var arrayFamilia = varStrFamilia.split(",");
            console.log('Longitud Familia: '+arrayFamilia.length);
            var arrayAmigos = varStrAmigos.split(",");
            console.log('Longitud Amigos: '+arrayAmigos.length);
            if( $('#usuario').is(':checked') ) {
            $('#total').val(arrayFamilia.length+arrayAmigos.length+1);
            }else{
              $('#total').val(arrayFamilia.length+arrayAmigos.length);  
            }
            }else if(varStrFamilia.length == 0 && varStrAmigos.length > 0){
            var arrayAmigos = varStrAmigos.split(",");
            console.log('Longitud Amigos: '+arrayAmigos.length);
            if($('#usuario').is(':checked') ){
            $('#total').val(arrayAmigos.length +1);
            }else{
             $('#total').val(arrayAmigos.length);
            }
            }else if(varStrFamilia.length > 0 && varStrAmigos.length == 0){
             var arrayFamilia = varStrFamilia.split(",");
             console.log('Longitud Familia: '+arrayFamilia.length);
             if($('#usuario').is(':checked') ){
             $('#total').val(arrayFamilia.length+1);
             }else{
                $('#total').val(arrayFamilia.length);
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
    } else {
        console.log('Checkbox  unchecked');
        $('#total').val($('#total').val()-1);
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

        $(document).ready(function() {
            $("#lightgallery").lightGallery();
        });
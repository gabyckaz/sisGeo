$(document).ready(function(){
        var mytable = $("#mytable").DataTable({
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
        })
        $("#myform").on('submit', function(e){
            var form = this
            var rowsel = mytable.column(0).checkboxes.selected();
            $.each(rowsel, function(index, rowId){
                $(form).append(
                    $('<input>').attr('type','hidden').attr('name','id[]').val(rowId)
                )
            })
            $("#view-rows").text(rowsel.join(","))
            console.log(rowsel.join(","));
            $('#XXX').val(rowsel.join(","));
            $("#view-form").text($(form).serialize())
            $('input[name="id\[\]"]', form).remove()
            e.preventDefault()
        })
    });
    
           $(document).ready(function(){
        var mytable2 = $("#mytable2").DataTable({
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
        })
        $("#myform2").on('submit', function(e){
            var form = this
            var rowsel = mytable2.column(0).checkboxes.selected();
            $.each(rowsel, function(index, rowId){
                $(form).append(
                    $('<input>').attr('type','hidden').attr('name','id[]').val(rowId)
                )
            })
            $("#view-rows2").text(rowsel.join(","))
            console.log(rowsel.join(","));
            $('#XXX2').val(rowsel.join(","));
            $("#view-form2").text($(form).serialize())
            $('input[name="id\[\]"]', form).remove()
            e.preventDefault()
        })
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
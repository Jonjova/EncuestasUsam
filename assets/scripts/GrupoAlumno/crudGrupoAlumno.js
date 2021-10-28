jQuery(document).ready(function($) {
    obtA();
});

function obtA() {

    $.ajax({
        url: url + "GrupoAlumno/Alumno",
        type: 'post',
        dataType: 'json',
        cache: false,
        success: function(data) {

            //var json = JSON.parse(JSON.stringify(data));
            var options;
            $.each(data, function(index, object) {
                options += '<option value="' + object.ID_ALUMNO + '">' + object.CARNET + " " + object.PRIMER_NOMBRE_PERSONA + " " + object.PRIMER_APELLIDO_PERSONA + '</option>';
            });

            $('#ID_ALUMNO_GA').html(options);

            $("#ID_ALUMNO_GA").change(function() {
                valGrupoAlumno();
                // alert("hola");

                $('.bootstrap-select').selectpicker('refresh');
                console.log(data);

                //obtA();
            });
            $('.bootstrap-select').selectpicker('refresh');
            console.log(data);

        }
    })
}
//Guardamos un nuevo Grupo de alumno.
$("#createForm").submit(function(event) {
    event.preventDefault();
    $.ajax({
        url: url + 'GrupoAlumno/Guardar',
        data: $("#createForm").serialize(),
        type: "post",
        //async: false,
        cache: false,
        dataType: 'json',
        success: function(response) {


            if (response == true) {
                alert('Datos guardados correctamente!');
            }

        },
        error: function(xhr, status) {

            if (xhr.status == 200) {
                $('#createForm').trigger("reset");
                Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos guardados correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    //$('#ID_ALUMNO_GA').prop('selectedIndex',0);
                $('#createModal').modal('hide');
            }

        }
    });
});

//limpiar 
function limpiar2() {

    $('#createForm').trigger("reset");
}


//Validación de si ya existe en un grupo 
function valGrupoAlumno() {

    var grupo = $('#ID_ALUMNO_GA :selected').val();
    if (grupo) {
        $.ajax({
            url: url + 'GrupoAlumno/validarGrupoAlumno',
            data: 'ID_ALUMNO_GA=' + grupo,
            type: 'post',
            success: function(data) {

                if (data == 1) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Datos de grupo',
                        text: 'Este alumno ya existe en un grupo!'
                    })
                    $("#ID_ALUMNO_GA option:selected").prop("selected", false);
                }
            }
        });
    }
}
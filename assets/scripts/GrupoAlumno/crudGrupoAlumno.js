function grupoAC() {
    $('#ID_ASIGNATURA_G').val($('#CrearProyecto #ID_ASIGNATURA').val());
    $('#CICLO_G').val($('#CrearProyecto #CICLO').val());
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
                });
                //$('#ID_ALUMNO_GA').prop('selectedIndex',0);
                cargaFuncionSelect();
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
                //console.log(data);
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

//obteniendo Asignatura
function obtAsignatura() {
    $.ajax({
        url: url + "GrupoAlumno/Asignatura",
        type: 'post',
        dataType: 'json',
        cache: false,
        success: function(data) {
            //var json = JSON.parse(JSON.stringify(data));
            var options = " <option selected disabled value='' title='selecciona...' >selecciona... </option>";
            $.each(data, function(index, object) {
                options += '<option value="' + object.ID_ASIGNATURA + '">' + object.NOMBRE_ASIGNATURA + '</option>';
            });
            $('.bootstrap-select').selectpicker('refresh');
            $('#ID_ASIGNATURA_').html(options);
            console.log(data);
            // $('.bootstrap-select').selectpicker('refresh');
        }
    })
}

jQuery(document).ready(function() {
    $('#ID_ALUMNO_GA').on('change', function() {
        event.preventDefault();
        var alumno_id = $(this).val();
        if (alumno_id == '') {
            $('#ID_ASIGNATURA_').prop('disabled', true);
        } else {
            $('#ID_ASIGNATURA_').prop('disabled', false);
            $.ajax({
                url: url + "GrupoAlumno/Asignatura",
                type: 'POST',
                data: { alumno_id: alumno_id },
                success: function(data) {
                    obtAsignatura();
                    //valGrupoAlumno();

                },
                error: function() {
                    alert('error ocurio..!');
                }
            });
        }
        /* Act on the event */
    });
});

$(document).ready(function() {
    function changeNumber() {
        value = $('#value').text();
        $.ajax({
            type: "POST",
            url: "add.php",
            success: function(data) {
                $('#value').text(data);
            }
        });
    }
});

//Esta funcion carga una funcion 2 veces en este caso una accion dinamica
//para el poper del select
function cargaFuncionSelect() {
    var contar = 0;
    for (var i = 0; i < 2; i++) {
        //console.log(i);
        contar = (contar + setTimeout(obtGrupoAlumn($("#CrearProyecto [name='ID_ASIGNATURA']").val()), 1000));
        //setTimeout(obtA, 5000)
    }
    //console.log(contar);
}
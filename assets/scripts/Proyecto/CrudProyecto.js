//Versión datatable y ajax.
$(document).ready(function() {
    //Mostrar campos de la tabla Cliente.
    $('#Proyecto').DataTable({
        "ajax": url + "Proyectos/MostrarProyecto",
        "order": [],
        "language": idioma_espanol
    });

});
//llenado de todos los select
$(document).ready(function($) {
    obtTipoInvestiga();
    obtMater();
    obtDiseInvestiga();
    obtGrupoAlumn();
    obtCicl();

});
//llenar select de Tipo de investigación. 
function obtTipoInvestiga() {
    $.ajax({
        url: url + "Proyectos/obtTipoInvestigacion",
        type: 'post',
        success: function(respuesta) {
            //Insertar
            $('#ID_TIPO_INVESTIGACION').html(respuesta);
            //Actualizar
            $('#ID_TIPO_INVESTIGACION_').html(respuesta);
        }
    })
}
//llenar select de Materia. 
function obtMater() {
    $.ajax({
        url: url + "Proyectos/obtMaterias",
        type: 'post',
        success: function(respuesta) {
            //Insertar
            $('#ID_ASIGNATURA').html(respuesta);
            //Actualizar
            $('#ID_ASIGNATURA').html(respuesta);
        }
    })
}
//llenar select Diseño de investigación. 
function obtDiseInvestiga() {
    $.ajax({
        url: url + "Proyectos/obtDisenioInvestigacion",
        type: 'post',
        success: function(respuesta) {
            //Insertar
            $('#ID_DISENIO_INVESTIGACION').html(respuesta);
            //Actualizar
            $('#ID_DISENIO_INVESTIGACION_').html(respuesta);
        }
    })
}
//llenar select Grupo de alumno. 

function obtGrupoAlumn() {
    $.ajax({
            url: url + "Proyectos/obtGrupoAlumno",
            type: 'post',
            dataType: 'json',
            async: true,
            cache: false,
            success: function(data) {
                // <<<<<<< HEAD

                var json = JSON.parse(JSON.stringify(data));
                console.log(json);
                var select = $('<select>');
                $('#ID_GRUPO_ALUMNO').empty().append("<option selected disabled value=''>Seleccionar...</option>");
                $.each(json, function(id, name) {
                    select.append('<option value=' + name.ID_GRUPO_ALUMNO + '>' + name.NOMBRE_GRUPO + '</option>');
                });
                $('#ID_GRUPO_ALUMNO').append(select.html());

            }
        })
        // =======

    //          //var json = JSON.parse(JSON.stringify(data));
    //          //console.log(data);
    //          var select = $('<select>');
    //         $('#ID_GRUPO_ALUMNO').empty().append("<option selected disabled value=''>Seleccionar...</option>");
    //          $.each(data, function(id, name) {
    //             select.append('<option value=' + name.ID_GRUPO_ALUMNO + '>' + name.NOMBRE_GRUPO + '</option>');
    //         });
    //          $('#ID_GRUPO_ALUMNO').append(select.html());

    //      }
    //  })
    // >>>>>>> de6a65418eaaf8a0477c495058622095c4ebf3a5
}
//llenar select Diseño de investigación. 
function obtCicl() {
    $.ajax({
        url: url + "Proyectos/obtCiclo",
        type: 'post',
        success: function(respuesta) {
            //Insertar
            $('#CICLO').html(respuesta);
            //Actualizar
            $('#CICLO_').html(respuesta);
        }
    })
}
// Acción de Insertar Proyecto.
$(function() {
    $("#CrearProyecto").submit(function(event) {
        $(this).find('.nav-pills a:first').tab('show');
        $.ajax({
            url: url + 'Proyectos/Guardar',
            data: $("#CrearProyecto").serialize(),
            type: "post",
            async: false,
            dataType: 'json',
            success: function(data) {

                if (data !== '') {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos guardados correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    $('#CrearProyecto')[0].reset();


                } else {
                    alert('ingrese datos');
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Algunos campos son requeridos!'
                })
            }
        });
        event.preventDefault();
    });

});
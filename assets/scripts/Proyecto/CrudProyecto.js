//Versión datatable y ajax.
$(document).ready(function() {
    //Mostrar campos de la tabla Cliente.
  var res =  $('#Proyecto').DataTable({
        "ajax": url + "Proyectos/MostrarProyecto",
        "order": [],
        "language": idioma_espanol
    });

    console.log(res);
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
            $('#ID_MATERIA').html(respuesta);
            //Actualizar
            $('#ID_MATERIA_').html(respuesta);
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
//llenar select Diseño de investigación. 
function obtGrupoAlumn() {
    $.ajax({
        url: url + "Proyectos/obtGrupoAlumno",
        type: 'post',
        success: function(respuesta) {
            //Insertar
            $('#ID_GRUPO_ALUMNO').html(respuesta);
            //Actualizar
            $('#ID_GRUPO_ALUMNO_').html(respuesta);
        }
    })
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
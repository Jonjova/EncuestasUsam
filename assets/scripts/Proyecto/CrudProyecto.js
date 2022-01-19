//Versión datatable y ajax.
$(document).ready(function() {
    //Mostrar campos de la tabla Proyecto.
    llenarTablaProyecto(0, 0, cod_coordinador, 0);
});

function llenarTablaProyecto(asignatura, ciclo, cod_coordinador, facultad) {
    $('#Proyecto').DataTable({
        "ajax": url + "Proyectos/MostrarProyecto/" + asignatura + '/' + ciclo + '/' + cod_coordinador + '/' + facultad,
        "order": [],
        "language": idioma_espanol
            /*,
                    dom: 'Bfrtip',
                    "buttons": ['excel', 'csv', 'pdf', 'copy'],*/
    });
}

function limpiarAlumno() {
    $('#CrearProyecto').trigger("reset");
    var validator = $("#CrearProyecto").validate();
    validator.resetForm();
    $('.form-control').removeClass('is-valid is-invalid');
    $('.custom-select').removeClass('is-valid is-invalid');
    infoAlumnosLimpiar();
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
                        toast: true,
                        timer: 1500,
                        icon: 'success',
                        position: 'top-end',
                        iconColor: '#3ca230',
                        showConfirmButton: false,
                        title: '<p style="color: #343a40; font-size: 1.49em; font-weight: 600; line-height: unset; margin: 0;">Datos guardados!</p>'
                    })

                    $('#CrearProyecto')[0].reset();
                    limpiarAlumno()
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

/****************************************************************************
                        VALIDACIONES PROYECTO
****************************************************************************/
//efecto en los input de la case needs-validation
jQuery.validator.setDefaults({
    debug: true,
    success: "valid",
    onfocusout: function(e) {
        this.element(e);
    },
    onkeyup: false,

    highlight: function(element) {
        jQuery(element).closest('.form-control').addClass('is-invalid');
        jQuery(element).closest('.custom-select').addClass('is-invalid');
    },
    unhighlight: function(element) {
        jQuery(element).closest('.form-control').removeClass('is-invalid');
        jQuery(element).closest('.form-control').addClass('is-valid');
        jQuery(element).closest('.custom-select').removeClass('is-invalid');
        jQuery(element).closest('.custom-select').addClass('is-valid');
    },

    errorElement: 'div',
    errorClass: 'invalid-feedback',
    errorPlacement: function(error, element) {
        if (element.parent('.input-group-prepend').length) {
            $(element).siblings(".invalid-feedback").append(error);
            //error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});

//aqui se agrega el campo del name
$("#CrearProyecto").validate({
    rules: {
        NOMBRE_PROYECTO: { required: true, minlength: 6, maxlength: 50 },
        DESCRIPCION: { required: true, minlength: 6, maxlength: 50 },
        ID_TIPO_INVESTIGACION: { required: true },
        ID_ASIGNATURA: { required: true },
        ID_DISENIO_INVESTIGACION: { required: true },
        FECHA_ASIGNACION: { required: true },
        ID_GRUPO_ALUMNO: { required: true },
        CICLO: { required: true }
    },
    messages: {
        NOMBRE_PROYECTO: {
            required: 'Nombre de Proyecto es requerido.',
            minlength: 'El mínimo permitido son 6 caracteres.',
            maxlength: 'El máximo permitido son 50 caracteres.'
        },
        DESCRIPCION: {
            required: 'Descripción es requerido.',
            minlength: 'El mínimo permitido son 6 caracteres',
            maxlength: 'El máximo permitido son 50 caracteres.'
        },
        ID_TIPO_INVESTIGACION: { required: 'Tipo de investigación es requerido.' },
        ID_ASIGNATURA: { required: 'Asignatura es requerido.' },
        ID_DISENIO_INVESTIGACION: { required: 'Diseño de investigación es requerido.' },
        FECHA_ASIGNACION: { required: 'Fecha es requerido.' },
        ID_GRUPO_ALUMNO: { required: 'Grupo de alumno es requerido.' },
        CICLO: { required: 'Ciclo es requerido.' }
    }
});


/****************************************************************************
                        LLENAR INFORMACION GRUPO
****************************************************************************/
function infoGrupo(proyecto) {
    $.ajax({
        url: url + 'Proyectos/datosInfoGrupo/' + proyecto,
        method: 'post',
        data: { 'ID_PROYECTO': proyecto },
        dataType: 'json',
        cache: false,
        success: function(r) {
            var nombreProyecto = '';
            var integrantes = '<h4>Integrantes:</h4>';
            $.each(r, function(index, object) {
                nombreProyecto = '<h3>Proyecto:</h3><p>' + object.NOMBRE_PROYECTO + '</p>';
                integrantes += '<p>#' + object.CARNET + ' ' + object.ALUMNO + '</p>';
            });
            $('#NOMBRE_PROYECTO').html(nombreProyecto);
            $('#INTEGRANTES').html(integrantes);
            $('#InfoGrupoAlumno').modal({
                backdrop: "static",
                keyboard: false
            });
        }
    })
}

/****************************************************************************
                            CAMBIAR ESTADO
****************************************************************************/
function cambiarEstadoProyecto(proyecto, estado) {
    $.ajax({
        url: url + 'Proyectos/cambiarEstado/' + proyecto,
        data: { 'ESTADO_PROY': estado },
        type: 'POST',
        async: false,
        dataType: 'json',
        success: function() {
            Swal.fire({
                toast: true,
                timer: 1000,
                icon: 'success',
                position: 'top-end',
                iconColor: '#3ca230',
                showConfirmButton: false,
                title: '<p style="color: #343a40; font-size: 1.49em; font-weight: 600; line-height: unset; margin: 0;">Estado cambiado</p>'
            });
            $('#Proyecto').DataTable().ajax.reload(null, false);
        },
        error: function() {
            Swal.fire({
                icon: 'error',
                allowEscapeKey: false,
                allowOutsideClick: false,
                confirmButtonColor: "#343a40",
                text: 'Campos vac\u00edos o inv\u00e1lidos!',
                title: '<p style="color: #343a40; font-size: 1.072em; font-weight: 600; line-height: unset; margin: 0;">Error al cambiar</p>'
            });
        }
    });
}
$(document).ready(function() {
    llenarTablaProyecto(0, 0, cod_coordinador, 0);
});

function llenarTablaProyecto(asignatura, ciclo, cod_coordinador, facultad) {
    $('#Proyecto').DataTable({
        "ajax": url + "Proyectos/MostrarProyecto/" + asignatura + '/' + ciclo + '/' + cod_coordinador + '/' + facultad,
        "order": [],
        "language": idioma_espanol
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

/****************************************************************************
                            GUARDAR PROYECTO
****************************************************************************/
$(function() {
    $("#CrearProyecto").submit(function(event) {
        if (!$(this).valid()) {
            Swal.fire({
                icon: 'error',
                allowEscapeKey: false,
                allowOutsideClick: false,
                confirmButtonColor: "#343a40",
                text: 'Campos vac\u00edos o inv\u00e1lidos!',
                title: '<p style="color: #343a40; font-size: 1.072em; font-weight: 600; line-height: unset; margin: 0;">Error de inserci\u00f3n</p>'
            });
        } else {
            event.preventDefault();
            $(this).find('.nav-pills a:first').tab('show');
            $.ajax({
                url: url + 'Proyectos/Guardar',
                data: $("#CrearProyecto").serialize(),
                type: "post",
                async: false,
                dataType: 'json',
                success: function(data) {
                    Swal.fire({
                        toast: true,
                        timer: 1500,
                        icon: 'success',
                        position: 'top-end',
                        iconColor: '#3ca230',
                        showConfirmButton: false,
                        title: '<p style="color: #343a40; font-size: 1.49em; font-weight: 600; line-height: unset; margin: 0;">Datos guardados!</p>'
                    });
                    $('#CrearProyecto')[0].reset();
                    limpiarAlumno();
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        confirmButtonColor: "#343a40",
                        title: '<p style="color: #343a40; font-size: 1.072em; font-weight: 600; line-height: unset; margin: 0;">Error al guardar</p>'
                    });
                }
            });
        }
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
function infoGrupo(proyecto, id_grupo_alumno, id, asignatura, ciclo) {
    $('#agregarAlumnoG').show();
    $('#cont-agregarAlumnoG').hide();
    $('#ASIGNATURA_AL').val(asignatura);
    $('#GRUPO_GA').val(ciclo);
    $.ajax({
        url: url + 'Proyectos/datosInfoGrupo/' + proyecto,
        method: 'post',
        data: { 'ID_PROYECTO': proyecto },
        dataType: 'json',
        cache: false,
        success: function(r) {
            var nombreProyecto = '';
            var nombreGrupo = '';
            var integrantes = '<h4>Integrantes:</h4>';
            var eliminar = '';
            $.each(r, function(index, object) {
                nombreProyecto = '<h3>Proyecto:</h3><p>' + object.NOMBRE_PROYECTO + '</p>';
                nombreGrupo = object.NOMBRE_GRUPO;
                eliminar =
                    '<a class="btn btn-danger" ' +
                    'onclick="eliminarGA(' + proyecto + ',' + id_grupo_alumno + ',' + object.ID_DET_GA + ',' + asignatura + ',' + ciclo + ');">' +
                    '<i class="fas fa-user-times"></i> ' +
                    '</a>';
                if (object.ESTADO_PROYECTO == "Finalizado" || object.ESTADO_PROYECTO == "Incompleto" || object.ESTADO_PROYECTO == "No entregado" || cod_coordinador != 0) {
                    eliminar = '';
                    $('#agregarAlumnoG').hide();
                }
                integrantes += '<p>#' + object.CARNET + ' ' + object.ALUMNO + ' ' + eliminar + '</p>';
            });
            $('#NOMBRE_PROYECTO').html(nombreProyecto);
            $('#NOMBRE_GRUPO_ALUMNO').val(nombreGrupo);
            $('#INTEGRANTES').html(integrantes);
            $('#InfoGrupoAlumno').modal({
                backdrop: "static",
                keyboard: false
            });
        }
    });
}

/****************************************************************************
                        ELIMINAR ALUMNO DE UN GRUPO
****************************************************************************/
function eliminarGA(proyecto, id_grupo_alumno, id, asignatura, ciclo) {
    $.ajax({
        url: url + 'GrupoAlumno/eliminarGrupoAlumno/' + id,
        method: 'post',
        cache: false,
        success: function(r) {
            infoGrupo(proyecto, id_grupo_alumno, id, asignatura, ciclo);
            $('#ASIGNATURA_AL').val(asignatura);
            $('#GRUPO_GA').val(ciclo);
            $('#Proyecto').DataTable().ajax.reload(null, false);
        }
    });
}

/****************************************************************************
                   LLENAR AGREGAR NUEVO ALUMNO A UN GRUPO
****************************************************************************/
function agregarAlumnoGA() {
    $('#NOMBRE_PROYECTO').html('');
    $('#INTEGRANTES').html('');
    $('#agregarAlumnoG').hide();
    $('#cont-agregarAlumnoG').show();
    $('#ALUMNO_GA').html('');
    $.ajax({
        url: url + "GrupoAlumno/Alumno/" + $('#ASIGNATURA_AL').val(),
        type: 'post',
        dataType: 'json',
        cache: false,
        success: function(data) {
            var options;
            $.each(data, function(index, object) {
                options += '<option value="' + object.ID_ALUMNO + '">' + object.CARNET + " " + object.PRIMER_NOMBRE_PERSONA + " " + object.PRIMER_APELLIDO_PERSONA + '</option>';
            });
            $('#ALUMNO_GA').html(options);
            $('.bootstrap-select').selectpicker('refresh');
        }
    });
}

/****************************************************************************
                    AGREGAR NUEVO ALUMNO A UN GRUPO
****************************************************************************/
$("#agregarGAForm").submit(function(event) {
    event.preventDefault();
    $.ajax({
        url: url + 'GrupoAlumno/agregar',
        data: $(this).serialize(),
        type: "post",
        cache: false,
        dataType: 'json',
        success: function(response) {
            Swal.fire({
                toast: true,
                timer: 1500,
                icon: 'success',
                position: 'top-end',
                iconColor: '#3ca230',
                showConfirmButton: false,
                title: '<p style="color: #343a40; font-size: 1.49em; font-weight: 600; line-height: unset; margin: 0;">Datos guardados!</p>'
            });
        },
        error: function(xhr, status) {
            if (xhr.status == 200) {
                $('#agregarGAForm').trigger("reset");
                Swal.fire({
                    toast: true,
                    timer: 1500,
                    icon: 'success',
                    position: 'top-end',
                    iconColor: '#3ca230',
                    showConfirmButton: false,
                    title: '<p style="color: #343a40; font-size: 1.49em; font-weight: 600; line-height: unset; margin: 0;">Datos guardados!</p>'
                });
                $('#InfoGrupoAlumno').modal('hide');
                $('#agregarGAForm').trigger("reset");
                $('#Proyecto').DataTable().ajax.reload(null, false);
            }
        }
    });
});

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
                title: '<p style="color: #343a40; font-size: 1.072em; font-weight: 600; line-height: unset; margin: 0;">Error al cambiar</p>'
            });
        }
    });
}
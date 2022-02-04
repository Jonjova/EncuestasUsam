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

function limpiarProyecto() {
    $('#CrearProyecto').trigger("reset");
    var validator = $("#CrearProyecto").validate();
    validator.resetForm();
    $('#CrearProyecto')[0].reset();
    $('#CrearProyecto').find('.nav-pills a:first').tab('show');
    $('#CrearProyecto .form-control').removeClass('is-valid is-invalid');
    $('#CrearProyecto .custom-select').removeClass('is-valid is-invalid');
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
            $.ajax({
                url: url + 'Proyectos/Guardar',
                data: $(this).serialize(),
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
                    limpiarProyecto();
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
                nombreProyecto = '<h4>Proyecto:</h4><h4 style="color: #999;"><b>"' + object.NOMBRE_PROYECTO + '"</b></h4>';
                nombreGrupo = '<br><h4>Nombre del grupo:</h4><h4 style="color: #999;"><b>"' + object.NOMBRE_GRUPO + '"</b></h4>';
                eliminar =
                    '<a class="btn btn-danger" ' +
                    'onclick="eliminarGA(' + proyecto + ',' + id_grupo_alumno + ',' + object.ID_DET_GA + ',' + asignatura + ',' + ciclo + ');">' +
                    '<i class="fas fa-user-times"></i> ' +
                    '</a>';
                if (r.length <= 1) {
                    eliminar = '';
                }
                if (object.ESTADO_PROYECTO != "Iniciado" && object.ESTADO_PROYECTO != "En proceso" || cod_docente == 0) {
                    eliminar = '';
                    $('#agregarAlumnoG').hide();
                }
                integrantes += '<h5 style="color: #999;"><b>#' + object.CARNET + ' ' + object.ALUMNO + ' ' + eliminar + '</b></h5>';
            });
            $('#NOMBRE_PROYECTO').html(nombreProyecto);
            $('#NOMBRE_GRUPO_ALUMNO').html(nombreGrupo);
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
        url: url + "DatosComunes/dropAlumnos/" + 1,
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
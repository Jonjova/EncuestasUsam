$(document).ready(function() {
    llenarTablaCoordiandor();
});

/****************************************************************************
                        LLENAR TABLA DE COORDINADORES
****************************************************************************/
function llenarTablaCoordiandor() {
    $('#Coordinadores').DataTable({
        'ajax': url + 'Coordinador/mostrarCoordinadores',
        'order': [],
        'language': idioma_espanol
    });
}

/****************************************************************************
                            INSERTAR COORDINADOR
****************************************************************************/
$(function() {
    $('#CreateCoordinador').submit(function(event) {
        crearUsuarioPass();
        var forms = $('#CreateCoordinador');
        var validation = Array.prototype.filter.call(forms, function(form) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Complete el formulario!'
                })
                form.classList.add('was-validated');
                $('.custom-select').addClass('is-invalid');
            }
            if (form.checkValidity() === true) {
                $.ajax({
                    url: url + 'Coordinador/crearCoordinador',
                    data: $('#CreateCoordinador').serialize(),
                    type: 'POST',
                    async: false,
                    dataType: 'json',
                    success: function(response) {
                        $('#CreateCoordinador').find('.nav-pills a:first').tab('show');
                        $('#CreateCoordinador')[0].reset();
                        $('#CreateCoordinador .form-control').removeClass('is-valid');
                        $('#CreateCoordinador .custom-select').removeClass('is-valid');
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Datos guardados correctamente',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                });

            }
        });
    });
});

/****************************************************************************
                        LLENAR INFORMACION COORDINADOR
****************************************************************************/
function infoCoordinador(persona) {
    $.ajax({
        url: url + 'Coordinador/datosCoordinador/' + persona,
        method: 'post',
        data: { 'ID_PERSONA': persona },
        dataType: 'json',
        success: function(response) {
            $('#CO_NOMBRES').html(response.NOMBRES);
            $('#CO_APELLIDOS').html(response.APELLIDOS);
            $('#CO_PROFESION').html(response.PROFESION);
            $('#CO_TELEFONO_FIJO').html(response.TELEFONO_FIJO);
            $('#CO_TELEFONO_MOVIL').html(response.TELEFONO_MOVIL);
            $('#CO_NOMBRE_DEPARTAMENTO').html(response.NOMBRE_DEPARTAMENTO);
            $('#CO_DIRECCION').html(response.DIRECCION);
            $('#CO_CORREO_INSTITUCIONAL').html(response.CORREO_INSTITUCIONAL);
            $('#CO_CORREO_PERSONAL').html(response.CORREO_PERSONAL);
            $('#CO_DUI').html(response.DUI);
            $('#CO_NIT').html(response.NIT);
            $('#CO_COORDINACION').html(response.NOMBRE_COORDINACION);
            $('#CO_NOMBRE_USUARIO').html(response.NOMBRE_USUARIO);
        }
    })
}

/****************************************************************************
                        OBTENER INFORMACION COORDINADOR
****************************************************************************/
function obtenerCoordinador(persona) {
    $('#UpdateCoordinador').find('.nav-pills a:first').tab('show');
    if ($(document).width() <= 992) {
        $('#UpdateCoordinador .moving-tab').css('width', '100%');
    } else {
        $('#UpdateCoordinador .moving-tab').css('width', '25%');
    }
    $.ajax({
        url: url + 'Coordinador/obtenerCoordinador/' + persona,
        method: 'post',
        data: { 'ID_PERSONA': persona },
        dataType: 'json',
        success: function(response) {
            $('#ID_PERSONA_UPDATE').val(response.ID_PERSONA);
            $('#PRIMER_NOMBRE_PERSONA_UPDATE').val(response.PRIMER_NOMBRE_PERSONA);
            $('#SEGUNDO_NOMBRE_PERSONA_UPDATE').val(response.SEGUNDO_NOMBRE_PERSONA);
            $('#PRIMER_APELLIDO_PERSONA_UPDATE').val(response.PRIMER_APELLIDO_PERSONA);
            $('#SEGUNDO_APELLIDO_PERSONA_UPDATE').val(response.SEGUNDO_APELLIDO_PERSONA);
            $('#FECHA_NACIMIENTO_UPDATE').val(response.FECHA_NACIMIENTO);
            $('#SEXO_UPDATE').val(response.SEXO);
            $('#DUI_UPDATE').val(response.DUI);
            $('#NIT_UPDATE').val(response.NIT);
            $('#CORREO_PERSONAL_UPDATE').val(response.CORREO_PERSONAL);
            $('#TELEFONO_FIJO_UPDATE').val(response.TELEFONO_FIJO);
            $('#TELEFONO_MOVIL_UPDATE').val(response.TELEFONO_MOVIL);
            $('#DEPARTAMENTO_UPDATE').val(response.DEPARTAMENTO);
            $('#DIRECCION_UPDATE').val(response.DIRECCION);
            $('#CORREO_INSTITUCIONAL_UPDATE').val(response.CORREO_INSTITUCIONAL);
            $('#PROFESION_UPDATE').val(response.PROFESION);
            $('#COORDINACION_UPDATE').val(response.COORDINACION);
        }
    })
}

/****************************************************************************
                            ACTUALIZAR COORDINADOR
****************************************************************************/
$(function() {
    $('#UpdateCoordinador').submit(function(event) {
        var forms = $('#UpdateCoordinador');
        var validation = Array.prototype.filter.call(forms, function(form) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Complete el formulario!'
                })
                form.classList.add('was-validated');
                $('.custom-select').addClass('is-invalid');
            }
            if (form.checkValidity() === true) {
                $.ajax({
                    url: url + 'Coordinador/updateCoordinador',
                    data: $('#UpdateCoordinador').serialize(),
                    type: 'POST',
                    async: false,
                    dataType: 'json',
                    success: function(response) {
                        $('body').removeClass('modal-open');
                        $('#modalCoordinador').removeClass('show');
                        $('.modal-backdrop').removeClass('show');
                        $('.modal-backdrop').css('display', 'none');
                        $('#modalCoordinador').css('display', 'none');
                        $('#modalCoordinador').removeAttr('aria-modal', 'true');
                        $('#modalCoordinador').removeAttr('role', 'dialog');
                        $('#modalCoordinador').attr('aria-hidden', 'true');
                        $('#Coordinadores').DataTable().ajax.reload(null, false);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Datos actualizados correctamente',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                });

            }
        });
    });
});
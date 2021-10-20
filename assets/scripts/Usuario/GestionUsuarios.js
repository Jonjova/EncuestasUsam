$(document).ready(function() {
    llenarTablaUsuarios();
});

/****************************************************************************
                        LLENAR TABLA DE USUARIOS
****************************************************************************/
function llenarTablaUsuarios() {
    $('#Usuarios').DataTable({
        'ajax': url + 'Usuario/mostrarUsuarios',
        'order': [],
        'language': idioma_espanol
    });
}

/****************************************************************************
                            RECUPERAR CONTRASENIA
****************************************************************************/
function resetPass(personaUsuario) {
    $.ajax({
        url: url + 'Usuario/resetPass/' + personaUsuario,
        data: { 'PERSONA': personaUsuario },
        type: 'POST',
        async: false,
        dataType: 'json',
        success: function() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Contrase\u00f1a recuperada',
                showConfirmButton: false,
                timer: 1500
            });
        },
        error: function() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Error al recuperar contrase\u00f1a!'
            });
        }
    });
}

/****************************************************************************
                        LLENAR INFORMACIÓN USUARIO
****************************************************************************/
function infoUsuario(persona) {
    $.ajax({
        url: url + 'Usuario/datosUsuario/' + persona,
        method: 'post',
        data: { 'PERSONA': persona },
        dataType: 'json',
        success: function(response) {
            $('#U_NOMBRES').html(response.NOMBRES);
            $('#U_APELLIDOS').html(response.APELLIDOS);
            $('#U_DUI').html(response.DUI);
            $('#U_NIT').html(response.NIT);
            $('#U_TELEFONO_FIJO').html(response.TELEFONO_FIJO);
            $('#U_TELEFONO_MOVIL').html(response.TELEFONO_MOVIL);
            $('#U_NOMBRE_DEPARTAMENTO').html(response.NOMBRE_DEPARTAMENTO);
            $('#U_DIRECCION').html(response.DIRECCION);
            $('#U_CORREO_INSTITUCIONAL').html(response.CORREO_INSTITUCIONAL);
            $('#U_CORREO_PERSONAL').html(response.CORREO_PERSONAL);
            $('#U_PROFESION').html(response.NOMBRE_PROFESION);
            $('#U_NOMBRE_USUARIO').html(response.NOMBRE_USUARIO);
        }
    })
}

/****************************************************************************
                        OBTENER INFORMACION USUARIO
****************************************************************************/
function obtenerPersona(persona) {
    $('#UpdatePersona').find('.nav-pills a:first').tab('show');
    if ($(document).width() <= 992) {
        $('#UpdatePersona .moving-tab').css('width', '100%');
    } else {
        $('#UpdatePersona .moving-tab').css('width', '25%');
    }
    $.ajax({
        url: url + 'Usuario/mostrarPersona/' + persona,
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
        }
    })
}

/****************************************************************************
                            ACTUALIZAR USUARIO
****************************************************************************/
$(function() {
    $('#UpdatePersona').submit(function(event) {
        var forms = $('#UpdatePersona');
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
                    url: url + 'Usuario/updatePersona',
                    data: $('#UpdatePersona').serialize(),
                    type: 'POST',
                    async: false,
                    dataType: 'json',
                    success: function(response) {
                        $('body').removeClass('modal-open');
                        $('#modalPersona').removeClass('show');
                        $('.modal-backdrop').removeClass('show');
                        $('.modal-backdrop').css('display', 'none');
                        $('#modalPersona').css('display', 'none');
                        $('#modalPersona').removeAttr('aria-modal', 'true');
                        $('#modalPersona').removeAttr('role', 'dialog');
                        $('#modalPersona').attr('aria-hidden', 'true');
                        $('#Usuarios').DataTable().ajax.reload(null, false);
                        $('#UpdatePersona .form-control').removeClass('is-valid');
                        $('#UpdatePersona .custom-select').removeClass('is-valid');
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
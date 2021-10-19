/****************************************************************************
                        CARGAR DATOS PERSONALES
****************************************************************************/
$(document).ready(function() {
    if (window.location.href === (url + 'Cuenta/persona')) {
        mostrarPersona($('#ID_PERSONA_UPDATE').val());
    }
});

/****************************************************************************
                        VALIDAR CAMBIAR CONTRASEÑA
****************************************************************************/
// VALIDAR CONTRASEÑA ACTUAL
var oldPassword = $('#OLD_PASSWORD');
$('#OLD_PASSWORD').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'Cuenta/validarPassword',
        data: { 'PASSWORD': oldPassword.val() },
        success: function(msg) {
            if (msg == 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Contrase\u00f1a incorrecta!'
                })
                $('#OLD_PASSWORD').val('');
                $('#OLD_PASSWORD').removeClass('is-valid');
            }
        }
    });
});

// COMPARAR CONTRASEÑA ACTUAL CON NUEVA CONTRASEÑA
var password = $('#PASSWORD');
var rePassword = $('#RE_PASSWORD');
$('#PASSWORD').change(function() {
    if (password.val() != rePassword.val() && rePassword.val() != '') {
        Swal.fire({
            icon: 'error',
            title: 'Las contrase\u00f1as no coinciden!'
        })
        $('#RE_PASSWORD').val('');
        $('#RE_PASSWORD').removeClass('is-valid');
    }
});

// COMPARAR CON NUEVA CONTRASEÑA CONTRASEÑA ACTUAL
$('#RE_PASSWORD').change(function() {
    if (password.val() != rePassword.val()) {
        Swal.fire({
            icon: 'error',
            title: 'Las contrase\u00f1as no coinciden!'
        })
        $('#RE_PASSWORD').val('');
        $('#RE_PASSWORD').removeClass('is-valid');
    }
});

/****************************************************************************
                        LLENAR PERSONA PARA ACTUALIZAR
****************************************************************************/
function mostrarPersona(PERSONA) {
    $.ajax({
        url: url + 'Cuenta/mostrarPersona/' + PERSONA,
        method: 'post',
        data: { 'ID_PERSONA': PERSONA },
        dataType: 'json',
        success: function(response) {
            $('#PRIMER_NOMBRE_UPDATE').val(response.PRIMER_NOMBRE_PERSONA);
            $('#SEGUNDO_NOMBRE_UPDATE').val(response.SEGUNDO_NOMBRE_PERSONA);
            $('#PRIMER_APELLIDO_UPDATE').val(response.PRIMER_APELLIDO_PERSONA);
            $('#SEGUNDO_APELLIDO_UPDATE').val(response.SEGUNDO_APELLIDO_PERSONA);
            $('#FECHA_NACIMIENTO_UPDATE').val(response.FECHA_NACIMIENTO);
            $('#SEXO').val(response.SEXO);
            $('#DUI_UPDATE').val(response.DUI);
            $('#NIT_UPDATE').val(response.NIT);
            $('#CORREO_PERSONAL_UPDATE').val(response.CORREO_PERSONAL);
            $('#TELEFONO_FIJO_UPDATE').val(response.TELEFONO_FIJO);
            $('#TELEFONO_MOVIL_UPDATE').val(response.TELEFONO_MOVIL);
            $('#DEPARTAMENTO').val(response.DEPARTAMENTO);
            $('#DIRECCION_UPDATE').val(response.DIRECCION);
            $('#CORREO_INSTITUCIONAL_UPDATE').val(response.CORREO_INSTITUCIONAL);
        }
    })
}

/****************************************************************************
                        VALIDAR CAMPOS PARA ACTUALIZAR
****************************************************************************/
// VALIDAR CAMBIAR TELEFONO FIJO
$('#TELEFONO_FIJO_UPDATE').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/cambiarTelFijo',
        data: { 'TELEFONO_FIJO': $(this).val() },
        success: function(msg) {
            if (msg == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este Tel\u00e9fono ya Existe!'
                })
                $('#TELEFONO_FIJO_UPDATE').val('');
                $('#TELEFONO_FIJO_UPDATE').removeClass('is-valid');
            }
        }
    });
});

// VALIDAR CAMBIAR TELEFONO MOVIL
$('#TELEFONO_MOVIL_UPDATE').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/cambiarTelMovil',
        data: { 'TELEFONO_MOVIL': $(this).val() },
        success: function(msg) {
            if (msg == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este Tel\u00e9fono ya Existe!'
                })
                $('#TELEFONO_MOVIL_UPDATE').val('');
                $('#TELEFONO_MOVIL_UPDATE').removeClass('is-valid');
            }
        }
    });
});

// VALIDAR CAMBIAR CORREO PERSONAL
$('#CORREO_PERSONAL_UPDATE').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/cambiarEmail',
        data: { 'CORREO_PERSONAL': $(this).val() },
        success: function(msg) {
            if (msg == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este Correo ya Existe!'
                })
                $('#CORREO_PERSONAL_UPDATE').val('');
                $('#CORREO_PERSONAL_UPDATE').removeClass('is-valid');
            }
        }
    });
});

/****************************************************************************
                            ACTUALIZAR PERSONA
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
                    url: url + 'Cuenta/updatePersona',
                    data: $('#UpdatePersona').serialize(),
                    type: 'POST',
                    async: false,
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Datos actualizados correctamente',
                            showConfirmButton: false,
                            timer: 0
                        })
                    }
                });
                setTimeout(function() {
                    location.href = url + 'Dashboard';
                }, 1400)
            }
        });
    });
});

/****************************************************************************
                            CAMBIAR CONTRASEÑA
****************************************************************************/
$(function() {
    $('#UpdatePass').submit(function(event) {
        var forms = $('#UpdatePass');
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
            }
            if (form.checkValidity() === true) {
                $.ajax({
                    url: url + 'Cuenta/updatePassword',
                    data: { 'PASSWORD': password.val() },
                    type: 'POST',
                    async: false,
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Contrase\u00f1a cambiada',
                            showConfirmButton: false,
                            timer: 0
                        })
                    }
                });
                setTimeout(function() {
                    location.href = url + 'Dashboard';
                }, 1400)
            }
        });
    });
});

// /****************************************************************************
//                         VALIDAR RESTABLECER CONTRASEÑA
// ****************************************************************************/
// // VALIDAR CONTRASEÑA ACTUAL
// $('#CORREO_USUARIO').change(function() {
//     $.ajax({
//         type: 'POST',
//         url: url + 'Cuenta/validarUser',
//         data: { 'CORREO_INSTITUCIONAL': $(this).val() },
//         success: function(msg) {
//             if (msg == 1) {
//                 Swal.fire({
//                     icon: 'error',
//                     title: 'Correo de usuario no existe!'
//                 })
//                 $('#CORREO_USUARIO').val('');
//             }
//         }
//     });
// });

// // VALIDAR FECHA DE NACIMIENTO USUARIO
// $('#FECHA_NACIMIENTO_USUARIO').change(function() {
//     if ($('#CORREO_USUARIO').val() != '') {
//         $.ajax({
//             type: 'POST',
//             url: url + 'Cuenta/validarFechaUser',
//             data: $('#ResetPass').serialize(),
//             success: function(msg) {
//                 if (msg == 1) {
//                     Swal.fire({
//                         icon: 'error',
//                         title: 'La fecha no coincide!'
//                     })
//                     $('#FECHA_NACIMIENTO_USUARIO').val('');
//                 }
//             }
//         });
//     } else {
//         Swal.fire({
//             icon: 'error',
//             title: 'Ingrese su correo!'
//         })
//         $('#FECHA_NACIMIENTO_USUARIO').val('');
//     }
// });

// $('#btnRecuperar').on('click', function() {
//     $('#ResetPass').validate({
//         rules: {
//             CORREO_INSTITUCIONAL: { required: true },
//             FECHA_NACIMIENTO: { required: true }
//         },
//         messages: {
//             CORREO_INSTITUCIONAL: { required: 'Correo Usuario Requerido.' },
//             FECHA_NACIMIENTO: { required: 'Fecha de Nacimiento Requerida.' }
//         }
//     });

// });

// /****************************************************************************
//                             RESTABLECER CONTRASEÑA
// ****************************************************************************/
// $(function() {
//     $('#ResetPass').submit(function(event) {
//         var forms = $('#ResetPass');
//         var validation = Array.prototype.filter.call(forms, function(form) {
//             if (form.checkValidity() === true) {
//                 $.ajax({
//                     url: url + 'Cuenta/resetPass',
//                     data: $('#ResetPass').serialize(),
//                     type: 'POST',
//                     async: false,
//                     dataType: 'json',
//                     success: function(response) {
//                         Swal.fire({
//                             position: 'top-end',
//                             icon: 'success',
//                             title: 'Su contrase\u00f1a se ha restablecido',
//                             showConfirmButton: false,
//                             timer: 0
//                         })
//                     }
//                 });
//                 setTimeout(function() {
//                     location.href = url + 'Dashboard';
//                 }, 1500)
//             }
//         });
//     });
// });
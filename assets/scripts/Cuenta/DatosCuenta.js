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
                            CAMBIAR CONTRASEÑA
****************************************************************************/
$(function() {
    $('#UpdatePass').submit(function(event) {
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
                url: url + 'Cuenta/updatePassword',
                data: { 'PASSWORD': password.val() },
                type: 'POST',
                async: false,
                dataType: 'json',
                success: function(msg) {
                    Swal.fire({
                        toast: true,
                        timer: 1200,
                        icon: 'success',
                        position: 'top-end',
                        iconColor: '#3ca230',
                        showConfirmButton: false,
                        title: '<p style="color: #343a40; font-size: 1.072em; font-weight: 600; line-height: unset; margin: 0;">' + msg + '</p>'
                    });
                    $('#UpdatePass')[0].reset();
                },
                error: function(response) {
                    console.log(response);
                }
            });
            setTimeout(function() {
                location.href = url + 'Dashboard';
            }, 1200)
        }
    });
});

/****************************************************************************
                        CARGAR DATOS PERSONALES
****************************************************************************/
$(document).ready(function() {
    if (window.location.href === (url + 'Cuenta/persona')) {
        obtenerUsuario(1);
    }
});

/****************************************************************************
                            ACTUALIZAR USUARIO
****************************************************************************/
$(function() {
    $('#UpdatePerfil').submit(function(event) {
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
                url: url + 'Usuario/updatePersona',
                data: $(this).serialize(),
                type: 'POST',
                async: false,
                dataType: 'json',
                success: function(msg) {
                    Swal.fire({
                        toast: true,
                        timer: 1200,
                        icon: 'success',
                        position: 'top-end',
                        iconColor: '#3ca230',
                        showConfirmButton: false,
                        title: '<p style="color: #343a40; font-size: 1.3526em; font-weight: 600; line-height: unset; margin: 0;">' + msg + '</p>'
                    });
                },
                error: function(response) {
                    console.log(response);
                }
            });
            setTimeout(function() {
                location.href = url + 'Dashboard';
            }, 1200)
        }
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
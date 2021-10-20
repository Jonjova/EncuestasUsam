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
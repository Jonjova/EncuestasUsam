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
                        timer: 1500,
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
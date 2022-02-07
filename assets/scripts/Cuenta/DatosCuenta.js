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
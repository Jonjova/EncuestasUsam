$(document).ready(function() {
    $('#Profesiones').DataTable({
        'ajax': url + 'Profesion/mostrarProfesiones',
        'order': [],
        'language': idioma_espanol
    });
});

/****************************************************************************
                            INSERTAR PROFESION
****************************************************************************/
$(function() {
    $('#CreateProfesion').submit(function(event) {
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
                url: url + 'Profesion/crearProfesion',
                data: $(this).serialize(),
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
                        title: '<p style="color: #343a40; font-size: 1.49em; font-weight: 600; line-height: unset; margin: 0;">' + msg + '</p>'
                    });
                    $('#CreateProfesion')[0].reset();
                    $('#CreateProfesion .form-control').removeClass('is-valid');
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }
    });
});

/****************************************************************************
                        OBTENER PROFESION
****************************************************************************/
function obtenerProfesion(profesion) {
    $('#UpdateProfesion .form-control').removeClass('is-valid');
    $('#UpdateProfesion .form-control').removeClass('is-invalid');
    $('#UpdateProfesion .moving-tab').css('width', '100%');
    $.ajax({
        url: url + 'Profesion/obtenerProfesion/' + profesion,
        method: 'post',
        data: { 'ID_PROFESION': profesion },
        dataType: 'json',
        success: function(response) {
            $('#ID_PROFESION_UPDATE').val(response.ID_PROFESION);
            $('#NOMBRE_PROFESION_UPDATE').val(response.NOMBRE_PROFESION);
        }
    })
}

/****************************************************************************
                            ACTUALIZAR PROFESION
****************************************************************************/
$(function() {
    $('#UpdateProfesion').submit(function(event) {
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
                url: url + 'Profesion/updateProfesion',
                data: $(this).serialize(),
                type: 'POST',
                async: false,
                dataType: 'json',
                success: function(msg) {
                    $('body').removeClass('modal-open');
                    $('#modalProfesion').removeClass('show');
                    $('.modal-backdrop').removeClass('show');
                    $('.modal-backdrop').css('display', 'none');
                    $('#modalProfesion').css('display', 'none');
                    $('#modalProfesion').removeAttr('aria-modal', 'true');
                    $('#modalProfesion').removeAttr('role', 'dialog');
                    $('#modalProfesion').attr('aria-hidden', 'true');
                    $('#Profesiones').DataTable().ajax.reload(null, false);
                    Swal.fire({
                        toast: true,
                        timer: 1500,
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
        }
    });
});
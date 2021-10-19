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
                            CAMBIAR ESTADO DOCENTE
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
                title: 'Contrase\u00f1a restablecida',
                showConfirmButton: false,
                timer: 1500
            });
        },
        error: function() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Error al cambiar estado!'
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
            $('#U_NOMBRE_USUARIO').html(response.NOMBRE_USUARIO);
            $('#U_ESTADO').html(response.ESTADO);
        }
    })
}
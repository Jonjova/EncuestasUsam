$(document).ready(function() {
    llenarTablaDocente();
});

/****************************************************************************
                        LLENAR TABLA DE DOCENTES
****************************************************************************/
function llenarTablaDocente() {
    $('#Docentes').DataTable({
        'ajax': url + 'Docente/mostrarDocentes',
        'order': [],
        'language': idioma_espanol
    });
}

/****************************************************************************
                            INSERTAR DOCENTE
****************************************************************************/
$(function() {
    $('#CreateDocente').submit(function(event) {
        crearUsuarioPass();
        var forms = $('#CreateDocente');
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
                    url: url + 'Docente/crearDocente',
                    data: $('#CreateDocente').serialize(),
                    type: 'POST',
                    async: false,
                    dataType: 'json',
                    success: function(response) {
                        $('#CreateDocente').find('.nav-pills a:first').tab('show');
                        $('#CreateDocente')[0].reset();
                        $('#CreateDocente .form-control').removeClass('is-valid');
                        $('#CreateDocente .custom-select').removeClass('is-valid');
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Datos guardados correctamente',
                            showConfirmButton: false,
                            timer: 1400
                        })
                    }
                });
            }
        });
    });
});

/****************************************************************************
                            CAMBIAR ESTADO DOCENTE
****************************************************************************/
function cambiarEstado(personaUsuario) {
    // setTimeout(function() {
    $.ajax({
        url: url + 'Docente/cambiarEstado/' + personaUsuario,
        data: { 'ID_USUARIO': personaUsuario },
        type: 'POST',
        async: false,
        dataType: 'json',
        success: function() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Estado cambiado',
                showConfirmButton: false,
                timer: 1500
            });
            $('#Docentes').DataTable().ajax.reload(null, false);
            $('#Usuarios').DataTable().ajax.reload(null, false);
        },
        error: function() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Error al cambiar estado!'
            });
        }
    });
    // }, 300)
}

/****************************************************************************
                        LLENAR INFORMACIÓN DOCENTE
****************************************************************************/
function infoDocente(persona) {
    $.ajax({
        url: url + 'Docente/datosDocente/' + persona,
        method: 'post',
        data: { 'ID_PERSONA': persona },
        dataType: 'json',
        success: function(response) {
            $('#DO_NOMBRES').html(response.NOMBRES);
            $('#DO_APELLIDOS').html(response.APELLIDOS);
            $('#DO_DUI').html(response.DUI);
            $('#DO_NIT').html(response.NIT);
            $('#DO_TELEFONO_FIJO').html(response.TELEFONO_FIJO);
            $('#DO_TELEFONO_MOVIL').html(response.TELEFONO_MOVIL);
            $('#DO_NOMBRE_DEPARTAMENTO').html(response.NOMBRE_DEPARTAMENTO);
            $('#DO_DIRECCION').html(response.DIRECCION);
            $('#DO_PROFESION').html(response.PROFESION);
            $('#DO_CORREO_INSTITUCIONAL').html(response.CORREO_INSTITUCIONAL);
            $('#DO_CORREO_PERSONAL').html(response.CORREO_PERSONAL);
            $('#DO_RESPONSABLE').html(response.RESPONSABLE + ', ' + response.NOMBRE_COORDINACION);
            $('#DO_NOMBRE_USUARIO').html(response.NOMBRE_USUARIO);
            $('#DO_ESTADO').html(response.ESTADO);
        }
    })
}
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
                        LLENAR INFORMACIÓN COORDINADOR
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
/****************************************************************************
                            CARGAR METODOS
****************************************************************************/
$(document).ready(function() {
    llenarDropdowns();

    // MASCARAS DE CAMPOS
    $('#DUI').mask('99999999-9');
    $('#NIT').mask('9999-999999-999-9');
    $('#TELEFONO_FIJO').mask('9999-9999');
    $('#TELEFONO_MOVIL').mask('9999-9999');
    $('#TELEFONO_FIJO_UPDATE').mask('9999-9999');
    $('#TELEFONO_MOVIL_UPDATE').mask('9999-9999');

    // CARGAR DATOS PERSONALES
    if (window.location.href === (url + 'Persona/persona')) {
        mostrarPersona($('#ID_PERSONA_UPDATE').val());
    }
});

/****************************************************************************
                            CARGAR DROPDOWNS
****************************************************************************/
function llenarDropdowns() {
    sexo();
    departamento();
    profesion();
    coordinacion();
    coordinador();
    asignatura();
    docente();
}

function validaSelect(select) {
    if (select.value < 1) {
        select.classList.remove('is-valid');
        select.classList.add('is-invalid');
    } else {
        select.classList.remove('is-invalid');
        select.classList.add('is-valid');
    }
}

/****************************************************************************
                            LLENAR DROPDOWNS
****************************************************************************/
// LLENAR SELECT SEXO
function sexo() {
    $.ajax({
        url: url + 'DatosComunes/dropSexo',
        type: 'POST',
        success: function(respuesta) {
            $('#SEXO').html(respuesta);
        }
    })
}

// LLENAR SELECT DEPARTAMENTO
function departamento() {
    $.ajax({
        url: url + 'DatosComunes/dropDepartamento',
        type: 'POST',
        success: function(respuesta) {
            $('#DEPARTAMENTO').html(respuesta);
        }
    })
}

// LLENAR SELECT PROFESION
function profesion() {
    $.ajax({
        url: url + 'DatosComunes/dropProfesion',
        type: 'POST',
        success: function(respuesta) {
            $('#PROFESION').html(respuesta);
        }
    })
}

// LLENAR SELECT COORDINACIÓN
function coordinacion() {
    $.ajax({
        url: url + 'DatosComunes/dropCoordinacion',
        type: 'POST',
        success: function(respuesta) {
            $('#COORDINACION').html(respuesta);
        }
    })
}

// LLENAR SELECT COORDINADOR
function coordinador() {
    $.ajax({
        url: url + 'DatosComunes/dropCoordinador',
        type: 'POST',
        success: function(respuesta) {
            $('#COORDINADOR').html(respuesta);
        }
    })
}

// LLENAR SELECT ASIGNATURA
function asignatura() {
    $.ajax({
        url: url + 'DatosComunes/dropAsignatura',
        type: 'POST',
        success: function(respuesta) {
            $('#ASIGNATURA').html(respuesta);
        }
    })
}

// LLENAR SELECT DOCENTE
function docente() {
    $.ajax({
        url: url + 'DatosComunes/dropDocente',
        type: 'POST',
        success: function(respuesta) {
            $('#ID_DOCENTE').html(respuesta);
        }
    })
}

/****************************************************************************
                        VALIDAR CAMPOS PARA INSERTAR
****************************************************************************/
// VALIDAR DUI
$('#DUI').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarDUI',
        data: { 'DUI': $(this).val() },
        success: function(msg) {
            if (msg == 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este DUI ya Existe!'
                })
                $('#DUI').val('');
                $('#DUI').removeClass('is-valid');
            }
        }
    });
});

// VALIDAR NIT
$('#NIT').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarNIT',
        data: { 'NIT': $(this).val() },
        success: function(msg) {
            if (msg == 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este NIT ya Existe!'
                })
                $('#NIT').val('');
                $('#NIT').removeClass('is-valid');
            }
        }
    });
});

// VALIDAR TELEFONO FIJO
$('#TELEFONO_FIJO').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarTelFijo',
        data: { 'TELEFONO_FIJO': $(this).val() },
        success: function(msg) {
            if (msg == 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este Tel\u00e9fono ya Existe!'
                })
                $('#TELEFONO_FIJO').val('');
                $('#TELEFONO_FIJO').removeClass('is-valid');
            }
        }
    });
});

// VALIDAR TELEFONO MOVIL
$('#TELEFONO_MOVIL').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarTelMovil',
        data: { 'TELEFONO_MOVIL': $(this).val() },
        success: function(msg) {
            if (msg == 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este Tel\u00e9fono ya Existe!'
                })
                $('#TELEFONO_MOVIL').val('');
                $('#TELEFONO_MOVIL').removeClass('is-valid');
            }
        }
    });
});

// VALIDAR CORREO PERSONAL
var email = $('#CORREO_PERSONAL');
$('#CORREO_PERSONAL').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarEmail',
        data: { 'CORREO_PERSONAL': $(this).val() },
        success: function(msg) {
            if (msg == 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este Correo ya Existe!'
                })
                $('#CORREO_PERSONAL').val('');
                $('#CORREO_PERSONAL').removeClass('is-valid');
            }
        }
    });
});

// VALIDAR CORREO INSTITUCIONAL
$('#CORREO_INSTITUCIONAL').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarEmailUSAM',
        data: { 'CORREO_INSTITUCIONAL': $(this).val() },
        success: function(msg) {
            if (msg == 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este Correo ya Existe!'
                })
                $('#CORREO_INSTITUCIONAL').val('');
                $('#CORREO_INSTITUCIONAL').removeClass('is-valid');
            }
        }
    });
});

// VALIDAR CODIGO ASIGNATURA
var email = $('#CODIGO_ASIGNATURA');
$('#CODIGO_ASIGNATURA').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/validarCodAsignatura',
        data: { 'CODIGO_ASIGNATURA': $(this).val() },
        success: function(msg) {
            if (msg == 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Este C\u00f3digo ya Existe!'
                })
                $('#CODIGO_ASIGNATURA').val('');
                $('#CODIGO_ASIGNATURA').removeClass('is-valid');
            }
        }
    });
});

/****************************************************************************
                        CREAR USUARIO Y PASSWORD
****************************************************************************/
function crearUsuarioPass() {
    var correo = $('#CORREO_INSTITUCIONAL').val(),
        usuario = correo.split('@')[0];
    var pass = $('#PRIMER_APELLIDO_PERSONA').val().toLowerCase();

    $('#NOMBRE_USUARIO').val(usuario);
    $('#PASSWORD').val(pass);
}
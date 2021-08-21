/****************************************************************************
                            CARGAR METODOS
****************************************************************************/
$(document).ready(function() {
    llenarDropdowns();
    llenarTablaDocente();

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
                        LLENAR TABLA DE DOCENTES
****************************************************************************/
function llenarTablaDocente() {
    $('#Docentes').DataTable({
        "ajax": url + "Docente/mostrarDocentes",
        "order": [],
        "language": idioma_espanol
    });
}

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
        url: url + "DatosComunes/dropSexo",
        type: 'POST',
        success: function(respuesta) {
            $('#SEXO').html(respuesta);
        }
    })
}

// LLENAR SELECT DEPARTAMENTO
function departamento() {
    $.ajax({
        url: url + "DatosComunes/dropDepartamento",
        type: 'POST',
        success: function(respuesta) {
            $('#DEPARTAMENTO').html(respuesta);
        }
    })
}

// LLENAR SELECT PROFESION
function profesion() {
    $.ajax({
        url: url + "DatosComunes/dropProfesion",
        type: 'POST',
        success: function(respuesta) {
            $('#PROFESION').html(respuesta);
        }
    })
}

// LLENAR SELECT COORDINACIÓN
function coordinacion() {
    $.ajax({
        url: url + "DatosComunes/dropCoordinacion",
        type: 'POST',
        success: function(respuesta) {
            $('#COORDINACION').html(respuesta);
        }
    })
}

// LLENAR SELECT COORDINADOR
function coordinador() {
    $.ajax({
        url: url + "DatosComunes/dropCoordinador",
        type: 'POST',
        success: function(respuesta) {
            $('#COORDINADOR').html(respuesta);
        }
    })
}

// LLENAR SELECT ASIGNATURA
function asignatura() {
    $.ajax({
        url: url + "DatosComunes/dropAsignatura",
        type: 'POST',
        success: function(respuesta) {
            $('#ID_ASIGNATURA').html(respuesta);
        }
    })
}

// LLENAR SELECT DOCENTE
function docente() {
    $.ajax({
        url: url + "DatosComunes/dropDocente",
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
        type: "POST",
        url: url + "ValidarCampos/validarDUI",
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
        type: "POST",
        url: url + "ValidarCampos/validarNIT",
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
            console.log(msg);
        }
    });
});

// VALIDAR TELEFONO FIJO
$('#TELEFONO_FIJO').change(function() {
    $.ajax({
        type: "POST",
        url: url + "ValidarCampos/validarTelFijo",
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
        type: "POST",
        url: url + "ValidarCampos/validarTelMovil",
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
        type: "POST",
        url: url + "ValidarCampos/validarEmail",
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
        type: "POST",
        url: url + "ValidarCampos/validarEmailUSAM",
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
        type: "POST",
        url: url + "ValidarCampos/validarCodAsignatura",
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
                        VALIDAR CAMBIAR CONTRASEÑA
****************************************************************************/
// VALIDAR CONTRASEÑA ACTUAL
var oldPassword = $('#OLD_PASSWORD');
$('#OLD_PASSWORD').change(function() {
    $.ajax({
        type: "POST",
        url: url + "Persona/validarPassword",
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
                        CREAR USUARIO Y PASSWORD
****************************************************************************/
function crearUsuarioPass() {
    var correo = $('#CORREO_INSTITUCIONAL').val(),
        usuario = correo.split('@')[0];
    var pass = $('#PRIMER_APELLIDO_PERSONA').val().toLowerCase();

    $('#NOMBRE_USUARIO').val(usuario);
    $('#PASSWORD').val(pass);
}

/****************************************************************************
                        LLENAR PERSONA PARA ACTUALIZAR
****************************************************************************/
function mostrarPersona(PERSONA) {
    $.ajax({
        url: url + 'Persona/mostrarPersona/' + PERSONA,
        method: "post",
        data: { 'ID_PERSONA': PERSONA },
        dataType: "json",
        success: function(response) {
            $('#TELEFONO_FIJO_UPDATE').val(response.TELEFONO_FIJO);
            $('#TELEFONO_MOVIL_UPDATE').val(response.TELEFONO_MOVIL);
            $('#DEPARTAMENTO').val(response.DEPARTAMENTO);
            $('#CORREO_PERSONAL_UPDATE').val(response.CORREO_PERSONAL);
            $('#DIRECCION_UPDATE').val(response.DIRECCION);
        }
    })
}

/****************************************************************************
                        VALIDAR CAMPOS PARA ACTUALIZAR
****************************************************************************/
// VALIDAR CAMBIAR TELEFONO FIJO
$('#TELEFONO_FIJO_UPDATE').change(function() {
    $.ajax({
        type: "POST",
        url: url + "ValidarCampos/cambiarTelFijo",
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
        type: "POST",
        url: url + "ValidarCampos/cambiarTelMovil",
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
        type: "POST",
        url: url + "ValidarCampos/cambiarEmail",
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
    $("#UpdatePersona").submit(function(event) {
        var forms = $("#UpdatePersona");
        var validation = Array.prototype.filter.call(forms, function(form) {
            if (form.checkValidity() === false || $('span').hasClass('text-danger')) {
                event.preventDefault();
                event.stopPropagation();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Complete el formulario!'
                })
                form.classList.add('was-validated');
            }
            if (form.checkValidity() === true && !$('span').hasClass('text-danger')) {
                if (email.val() === '') {
                    email.val('-------------------');
                }
                $.ajax({
                    url: url + 'Persona/updatePersona',
                    data: $("#UpdatePersona").serialize(),
                    type: "POST",
                    async: false,
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Datos Actualizados Correctamente',
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
    $("#UpdatePass").submit(function(event) {
        var forms = $("#UpdatePass");
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
                if (email.val() === '') {
                    email.val('-------------------');
                }
                $.ajax({
                    url: url + 'Persona/updatePassword',
                    data: { 'PASSWORD': password.val() },
                    type: "POST",
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
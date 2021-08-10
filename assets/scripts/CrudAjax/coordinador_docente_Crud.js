/****************************************************************************
                            CARGAR METODOS
****************************************************************************/
$(document).ready(function() {
    llenarDropdowns();
    llenarTablaDocente();
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

/****************************************************************************
                            VALIDAR CAMPOS
****************************************************************************/
// VALIDAR DUI
var dui = $('#DUI');
var spanDUI = $('<span></span>').insertAfter(dui);
$('#DUI').change(function() {
    spanDUI.hide().removeClass();
    $.ajax({
        type: "POST",
        url: url + "ValidarCampos/validarDUI",
        data: { 'DUI': dui.val() },
        success: function(msg) {
            if (msg == 1) { // duplicado
                dui.removeClass('is-valid');
                dui.addClass('is-invalid');
                spanDUI.show();
                spanDUI.text('Este DUI ya existe').addClass('text-danger');
            } else {
                dui.removeClass('is-invalid');
                dui.addClass('is-valid');
                spanDUI.show();
                spanDUI.text('DUI v\u00e1lido').addClass('text-success');
            }
            if (dui.val() === '') {
                spanDUI.hide().removeClass();
            }
        }
    });
});

// VALIDAR NIT
var nit = $('#NIT');
var spanNIT = $('<span></span>').insertAfter(nit);
$('#NIT').change(function() {
    spanNIT.hide().removeClass();
    $.ajax({
        type: "POST",
        url: url + "ValidarCampos/validarNIT",
        data: { 'NIT': nit.val() },
        success: function(msg) {
            if (msg == 1) { // duplicado
                nit.removeClass('is-valid');
                nit.addClass('is-invalid');
                spanNIT.show();
                spanNIT.text("Este NIT ya existe").addClass('text-danger');
            } else {
                nit.removeClass('is-invalid');
                nit.addClass('is-valid');
                spanNIT.show();
                spanNIT.text('NIT v\u00e1lido').addClass('text-success');
            }
        }
    });
});

// VALIDAR TELEFONO FIJO
var telefono1 = $('#TELEFONO_FIJO');
var spanTel1 = $('<span></span>').insertAfter(telefono1);
var telefono2 = $('#TELEFONO_MOVIL');
var spanTel2 = $('<span></span>').insertAfter(telefono2);
$('#TELEFONO_FIJO').change(function() {
    spanTel1.hide().removeClass();
    $.ajax({
        type: "POST",
        url: url + "ValidarCampos/validarTelFijo",
        data: { 'TELEFONO_FIJO': telefono1.val() },
        success: function(msg) {
            if (msg == 1) { // duplicado
                telefono1.removeClass('is-valid');
                telefono1.addClass('is-invalid');
                spanTel1.show();
                spanTel1.text("Este Tel\u00e9fono ya existe").addClass('text-danger');
            } else {
                telefono1.removeClass('is-invalid');
                telefono1.addClass('is-valid');
                spanTel1.show();
                spanTel1.text('Tel\u00e9fono v\u00e1lido').addClass('text-success');
            }
        }
    });
});

// VALIDAR TELEFONO MOVIL
$('#TELEFONO_MOVIL').change(function() {
    spanTel2.hide().removeClass();
    $.ajax({
        type: "POST",
        url: url + "ValidarCampos/validarTelMovil",
        data: { 'TELEFONO_MOVIL': telefono2.val() },
        success: function(msg) {
            if (msg == 1) { // duplicado
                telefono2.removeClass('is-valid');
                telefono2.addClass('is-invalid');
                spanTel2.show();
                spanTel2.text("Este Tel\u00e9fono ya existe").addClass('text-danger');
            } else {
                telefono2.removeClass('is-invalid');
                telefono2.addClass('is-valid');
                spanTel2.show();
                spanTel2.text('Tel\u00e9fono v\u00e1lido').addClass('text-success');
            }
        }
    });
});

// VALIDAR CORREO PERSONAL
var email = $('#CORREO_PERSONAL');
var emailUSAM = $('#CORREO_INSTITUCIONAL');
var spanEmail = $('<span></span>').insertAfter(email);
var spanEmailUSAM = $('<span></span>').insertAfter(emailUSAM);

$('#CORREO_PERSONAL').change(function() {
    spanEmail.hide().removeClass();
    $.ajax({
        type: "POST",
        url: url + "ValidarCampos/validarEmail",
        data: { 'CORREO_PERSONAL': $(this).val() },
        success: function(msg) {
            if (msg == 1) { // duplicado
                email.removeClass('is-valid');
                email.addClass('is-invalid');
                spanEmail.show();
                spanEmail.text("Este Correo ya existe").addClass('text-danger');
            }
            if (email.hasClass('is-valid')) {
                spanEmail.show();
                spanEmail.text('Correo v\u00e1lido').addClass('text-success');
            }
        }
    });
});

// VALIDAR CORREO INSTITUCIONAL
$('#CORREO_INSTITUCIONAL').change(function() {
    spanEmailUSAM.hide().removeClass();
    $.ajax({
        type: "POST",
        url: url + "ValidarCampos/validarEmailUSAM",
        data: { 'CORREO_INSTITUCIONAL': $(this).val() },
        success: function(msg) {
            if (msg == 1) { // duplicado
                emailUSAM.removeClass('is-valid');
                emailUSAM.addClass('is-invalid');
                spanEmailUSAM.show();
                spanEmailUSAM.text("Este Correo ya existe").addClass('text-danger');
            }
            if (email.hasClass('is-valid')) {
                spanEmailUSAM.show();
                spanEmailUSAM.text('Correo v\u00e1lido').addClass('text-success');
            }
        }
    });
});

/****************************************************************************
                        CREAR USUARIO Y PASSWORD
****************************************************************************/
// LLENAR USUARIO Y PASSWORD
$('input[name=finish]').click(function() {
    var correo = $('#CORREO_INSTITUCIONAL').val(),
        usuario = correo.split('@')[0];
    var pass = $('#PRIMER_APELLIDO_PERSONA').val().toLowerCase();

    $('#NOMBRE_USUARIO').val(usuario);
    $('#PASSWORD').val(pass);
});

/****************************************************************************
                            INSERTAR COORDINADOR
****************************************************************************/
function crearCoordinador() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false || $('span').hasClass('text-danger')) {
                event.preventDefault();
                event.stopPropagation();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Complete el formulario!'
                })
                if ($('span').hasClass('text-danger')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Complete el formulario!\n' + '\nAlgunos campos son unicos!'
                    })
                }
                form.classList.add('was-validated');
            }
            if (form.checkValidity() === true && !$('span').hasClass('text-danger')) {
                $.ajax({
                    url: url + 'Coordinador/crearCoordinador',
                    data: $("#CreateCoordinador").serialize(),
                    type: "POST",
                    async: false,
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Datos guardados correctamente',
                            showConfirmButton: false,
                            timer: 0
                        })
                    }
                });
                setTimeout(function() {
                    location.reload();
                }, 1400)
            }
        }, false);
    });
}

/****************************************************************************
                            INSERTAR DOCENTE
****************************************************************************/
function crearDocente() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false || $('span').hasClass('text-danger')) {
                event.preventDefault();
                event.stopPropagation();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Complete el formulario!'
                })
                if ($('span').hasClass('text-danger')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Complete el formulario!\n' + '\nAlgunos campos son unicos!'
                    })
                }
                form.classList.add('was-validated');
            }
            if (form.checkValidity() === true && !$('span').hasClass('text-danger')) {
                $.ajax({
                    url: url + 'Docente/crearDocente',
                    data: $("#CreateDocente").serialize(),
                    type: "POST",
                    async: false,
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Datos guardados correctamente',
                            showConfirmButton: false,
                            timer: 0
                        })
                    }
                });
                setTimeout(function() {
                    location.reload();
                }, 1400)
            }
        }, false);
    });
}

/****************************************************************************
                            CAMBIAR ESTADO DOCENTE
****************************************************************************/
function cambiarEstado(USUARIO) {
    setTimeout(function() {
        $.ajax({
            url: url + 'Docente/cambiarEstado',
            data: { 'ID_USUARIO': USUARIO },
            type: "POST",
            async: false,
            dataType: 'json',
            success: function() {
                $('#Docentes').DataTable().ajax.reload(null, false);
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al cambiar estado!'
                })
            }
        });
    }, 300)

}
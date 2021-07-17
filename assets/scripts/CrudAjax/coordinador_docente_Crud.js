$(document).ready(function() {
    llenar();
    llenarTablaDocente();
    var ESTADO_PERMISO = $(this).prop('checked') == true ? 1 : 0;
});

/**************************************
        LLENAR TABLA DE DOCENTES
**************************************/
function llenarTablaDocente() {
    $('#Docentes').DataTable({
        "ajax": url + "Docente/MostrarDocentes",
        "order": [],
        "language": idioma_espanol
    });
}

/**************************************
        LLENAR MAX IDs & SELECTS
**************************************/
function llenar() {
    MaxPersona();
    MaxCoordinador();
    MaxDocente();
    MaxUsuario();
    Sexo();
    Departamento();
    Profesion();
    Coordinacion();
}

/**************************************
            LLENAR MAX IDs
**************************************/
// LLENAR ID_PERSONA
function MaxPersona() {
    $.ajax({
        url: url + "CatalogosAndMaxIDs/maxPersona",
        type: 'post',
        success: function(respuesta) {
            $('#print_persona').html(respuesta);
        }
    })
}

// LLENAR ID_COORDINADOR
function MaxCoordinador() {
    $.ajax({
        url: url + "CatalogosAndMaxIDs/maxCoordinador",
        type: 'post',
        success: function(respuesta) {
            $('#print_coordinador').html(respuesta);
        }
    })
}

// LLENAR ID_COORDINADOR
function MaxDocente() {
    $.ajax({
        url: url + "CatalogosAndMaxIDs/maxDocente",
        type: 'post',
        success: function(respuesta) {
            $('#print_docente').html(respuesta);
        }
    })
}

// LLENAR ID_USUARIO
function MaxUsuario() {
    $.ajax({
        url: url + "CatalogosAndMaxIDs/maxUsuario",
        type: 'post',
        success: function(respuesta) {
            $('#print_usuario').html(respuesta);
        }
    })
}

/**************************************
            LLENAR DROPDOWN
**************************************/
// LLENAR SELECT SEXO
function Sexo() {
    $.ajax({
        url: url + "CatalogosAndMaxIDs/dropSexo",
        type: 'post',
        success: function(respuesta) {
            $('#SEXO').html(respuesta);
        }
    })
}

// LLENAR SELECT DEPARTAMENTO
function Departamento() {
    $.ajax({
        url: url + "CatalogosAndMaxIDs/dropDepartamento",
        type: 'post',
        success: function(respuesta) {
            $('#DEPARTAMENTO').html(respuesta);
        }
    })
}

// LLENAR SELECT PROFESION
function Profesion() {
    $.ajax({
        url: url + "CatalogosAndMaxIDs/dropProfesion",
        type: 'post',
        success: function(respuesta) {
            $('#PROFESION').html(respuesta);
        }
    })
}

// LLENAR SELECT COORDINACIÓN
function Coordinacion() {
    $.ajax({
        url: url + "CatalogosAndMaxIDs/dropCoordinacion",
        type: 'post',
        success: function(respuesta) {
            $('#COORDINACION').html(respuesta);
        }
    })
}

/**************************************
            VALIDAR CAMPOS
**************************************/
// VALIDAR DUI
var dui = $('#DUI');
var spanDUI = $('<span></span>').insertAfter(dui);
$('#DUI').change(function() {
    spanDUI.hide().removeClass();
    $.ajax({
        type: "POST",
        url: url + "ValidarCampos/validarDUI",
        data: { 'DUI': $(this).val() },
        success: function(msg) {
            if (msg == 1) { // duplicado
                spanDUI.show();
                spanDUI.text("Este DUI ya existe").addClass('text-danger');
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
        data: { 'NIT': $(this).val() },
        success: function(msg) {
            if (msg == 1) { // duplicado
                spanNIT.show();
                spanNIT.text("Este NIT ya existe").addClass('text-danger');
            }
        }
    });
});

// VALIDAR TELEFONOS
var telefono1 = $('#TELEFONO_FIJO');
var spanTel1 = $('<span></span>').insertAfter(telefono1);
var telefono2 = $('#TELEFONO_MOVIL');
var spanTel2 = $('<span></span>').insertAfter(telefono2);
$('#TELEFONO_FIJO').change(function() {
    spanTel1.hide().removeClass();
    $.ajax({
        type: "POST",
        url: url + "ValidarCampos/validarTelFijo",
        data: { 'TELEFONO_FIJO': $(this).val() },
        success: function(msg) {
            if (msg == 1) { // duplicado
                spanTel1.show();
                spanTel1.text("Este Tel\u00e9fono ya existe").addClass('text-danger');
            }
        }
    });
});

$('#TELEFONO_MOVIL').change(function() {
    spanTel2.hide().removeClass();
    $.ajax({
        type: "POST",
        url: url + "ValidarCampos/validarTelMovil",
        data: { 'TELEFONO_MOVIL': $(this).val() },
        success: function(msg) {
            if (msg == 1) { // duplicado
                spanTel2.show();
                spanTel2.text("Este Tel\u00e9fono ya existe").addClass('text-danger');
            }
        }
    });
});

// VALIDAR CORREOS
var email = $('#CORREO_PERSONAL');
var emailUSAM = $('#CORREO_INSTITUCIONAL');
var spanEmail = $('<span></span>').insertAfter(email);
var spanEmailUSAM = $('<span></span>').insertAfter(emailUSAM);
let validEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

$('#CORREO_PERSONAL').change(function() {
    spanEmail.hide().removeClass();
    // if (!validEmail.test(email.value)) {
    //     spanEmail.show();
    //     spanEmail.text("Ingrese un Correo V\u00e1lido").addClass('text-danger');
    // }
    $.ajax({
        type: "POST",
        url: url + "ValidarCampos/validarEmail",
        data: { 'CORREO_PERSONAL': $(this).val() },
        success: function(msg) {
            if (msg == 1) { // duplicado
                spanEmail.show();
                spanEmail.text("Este Correo ya existe").addClass('text-danger');
            }
        }
    });
});
$('#CORREO_INSTITUCIONAL').change(function() {
    spanEmailUSAM.hide().removeClass();
    $.ajax({
        type: "POST",
        url: url + "ValidarCampos/validarEmailUSAM",
        data: { 'CORREO_INSTITUCIONAL': $(this).val() },
        success: function(msg) {
            if (msg == 1) { // duplicado
                spanEmailUSAM.show();
                spanEmailUSAM.text("Este Correo ya existe").addClass('text-danger');
            }
        }
    });
});

/**************************************
        CREAR USUARIO Y PASSWORD
**************************************/
// LLENAR USUARIO Y PASSWORD
$('input[name=finish]').click(function() {
    var correo = $('#CORREO_INSTITUCIONAL').val(),
        usuario = correo.split('@')[0];
    var pass = $('#PRIMER_APELLIDO_PERSONA').val().toLowerCase();

    $('#NOMBRE_USUARIO').val(usuario);
    $('#PASSWORD').val(pass);
});

/**************************************
            INSERTAR COORDINADOR
**************************************/
$(function() {
    $("#CreateCoordinador").submit(function(event) {
        $.ajax({
            url: url + 'Coordinador/Guardar',
            data: $("#CreateCoordinador").serialize(),
            type: "post",
            async: false,
            dataType: 'json',
            success: function(response) {
                if (response !== '') {
                    //alert('Datos guardados correctamente');
                    Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Datos guardados correctamente',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        // $('#createModal').modal('hide');
                        //Actualiza la tabla sin regargar la pagina 
                        // $('#Cliente').DataTable().ajax.reload(null, false);
                    inicioWizard();
                    llenar();
                    $('#CreateCoordinador')[0].reset();

                } else {
                    alert('ingrese datos');
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Algunos campos son requeridos!'
                })
            }
        });
        event.preventDefault();
    });
});

/**************************************
            INSERTAR DOCENTE
**************************************/
$(function() {
    $("#CreateDocente").submit(function(event) {
        $.ajax({
            url: url + 'Docente/Guardar',
            data: $("#CreateDocente").serialize(),
            type: "post",
            async: false,
            dataType: 'json',
            success: function(response) {
                if (response !== '') {
                    //alert('Datos guardados correctamente');
                    Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Datos guardados correctamente',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        // $('#createModal').modal('hide');
                        //Actualiza la tabla sin regargar la pagina 
                        // $('#Cliente').DataTable().ajax.reload(null, false);
                    inicioWizard();
                    llenar();
                    $('#CreateDocente')[0].reset();

                } else {
                    alert('ingrese datos');
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Algunos campos son requeridos!'
                })
            }
        });
        event.preventDefault();
    });
});

/**************************************
        CAMBIAR ESTADO DOCENTE
**************************************/
function CambiarEstado(USUARIO) {
    $.ajax({
        url: url + 'Docente/CambiarEstado',
        data: { 'ID_USUARIO': USUARIO },
        type: "post",
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
}
//llenar select de alumno 
$(document).ready(function() {
    $("ID_ALUMNO_GA").tooltip('show');
    //obtA($('#ID_ASIGNATURA').val());
});

// CONFIG MODAL
$('#btnAlumno').click(function() {
    $('#createAlumno .form-control').removeClass('is-valid is-invalid');
    $('#createAlumno .custom-select').removeClass('is-valid is-invalid');
    if ($(document).width() <= 992) {
        $('#createAlumno .moving-tab').css('width', '100%');
    } else {
        $('#createAlumno .moving-tab').css('width', '25%');
    }
});

/****************************************************************************
                            INSERTAR ALUMNO
****************************************************************************/
$(function() {
    $('#createAlumno').submit(function(event) {
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
                url: url + 'Alumno/Guardar',
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
                        title: '<p style="color: #343a40; font-size: 1.49em; font-weight: 600; line-height: unset; margin: 0;">Datos guardados!</p>'
                    });
                    infoAlumnosLimpiar();
                    $('#modalCreateAlumno').modal('hide');
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }
    });
});

// CARGAR DATOS DEL CARNET EXISTENTE
$('#CARNET').change(function() {
    $.ajax({
        type: 'POST',
        url: url + 'ValidarCampos/ObtenerInfoAlumno',
        dataType: 'json',
        data: { 'CARNET': $(this).val() },
        success: function(msg) {
            if (msg != null && $('#CARNET').val() != '') {
                $('#confirmUpdate').fadeIn();
                $('#btnCreateAlumno').attr('disabled', 'true');
                $('#createAlumno .form-control').attr('readonly', 'true');
                $('#createAlumno .custom-select').attr('disabled', 'true');
                $('#createAlumno .form-control').removeClass('is-valid is-invalid');
                $('#createAlumno .custom-select').removeClass('is-valid is-invalid');
                // VER DATOS
                $('#createAlumno #PRIMER_NOMBRE_PERSONA').val(msg.PRIMER_NOMBRE_PERSONA);
                $('#createAlumno #SEGUNDO_NOMBRE_PERSONA').val(msg.SEGUNDO_NOMBRE_PERSONA);
                $('#createAlumno #PRIMER_APELLIDO_PERSONA').val(msg.PRIMER_APELLIDO_PERSONA);
                $('#createAlumno #SEGUNDO_APELLIDO_PERSONA').val(msg.SEGUNDO_APELLIDO_PERSONA);
                $('#createAlumno #FECHA_NACIMIENTO').val(msg.FECHA_NACIMIENTO);
                $('#createAlumno #SEXO').val(msg.SEXO);
                $('#createAlumno #CORREO_PERSONAL').val(msg.CORREO_PERSONAL);
                $('#createAlumno #TELEFONO_FIJO').val(msg.TELEFONO_FIJO);
                $('#createAlumno #TELEFONO_MOVIL').val(msg.TELEFONO_MOVIL);
                $('#createAlumno #DEPARTAMENTO').val(msg.DEPARTAMENTO);
                $('#createAlumno #DIRECCION').val(msg.DIRECCION);
                $('#createAlumno #CARRERA').val(msg.CARRERA);
                $('#createAlumno #CORREO_INSTITUCIONAL').val(msg.CORREO_INSTITUCIONAL);
                // ACTUALIZAR DATOS
                $('#updateAlumno #ID_PERSONA_UPDATE').val(msg.ID_PERSONA);
                $('#updateAlumno #ID_ALUMNO_UPDATE').val(msg.ID_ALUMNO);
                $('#updateAlumno #CARNET_UPDATE').val(msg.CARNET);
                $('#updateAlumno #PRIMER_NOMBRE_PERSONA_UPDATE').val(msg.PRIMER_NOMBRE_PERSONA);
                $('#updateAlumno #SEGUNDO_NOMBRE_PERSONA_UPDATE').val(msg.SEGUNDO_NOMBRE_PERSONA);
                $('#updateAlumno #PRIMER_APELLIDO_PERSONA_UPDATE').val(msg.PRIMER_APELLIDO_PERSONA);
                $('#updateAlumno #SEGUNDO_APELLIDO_PERSONA_UPDATE').val(msg.SEGUNDO_APELLIDO_PERSONA);
                $('#updateAlumno #FECHA_NACIMIENTO_UPDATE').val(msg.FECHA_NACIMIENTO);
                $('#updateAlumno #SEXO_UPDATE').val(msg.SEXO);
                $('#updateAlumno #CORREO_PERSONAL_UPDATE').val(msg.CORREO_PERSONAL);
                $('#updateAlumno #TELEFONO_FIJO_UPDATE').val(msg.TELEFONO_FIJO);
                $('#updateAlumno #TELEFONO_MOVIL_UPDATE').val(msg.TELEFONO_MOVIL);
                $('#updateAlumno #DEPARTAMENTO_UPDATE').val(msg.DEPARTAMENTO);
                $('#updateAlumno #DIRECCION_UPDATE').val(msg.DIRECCION);
                $('#updateAlumno #CARRERA_UPDATE').val(msg.CARRERA);
                $('#updateAlumno #CORREO_INSTITUCIONAL_UPDATE').val(msg.CORREO_INSTITUCIONAL);
            }
        }
    });
});

// Esta función remueve al principio de un nav-tabs
$('#modalCreateAlumno').on('hidden.bs.modal', function() {
    $(this).find('.nav-pills a:first').tab('show');
});

$('#modalUpdateAlumno').on('hidden.bs.modal', function() {
    $(this).find('.nav-pills a:first').tab('show');
    infoAlumnosLimpiar();
});

// LIMPIAR INPUTS
function infoAlumnosLimpiar() {
    $('#confirmUpdate').hide();
    $('#createAlumno')[0].reset();
    $('#createAlumno .form-control').removeAttr('readonly');
    $('#createAlumno .custom-select').removeAttr('disabled');
    $('#btnCreateAlumno').removeAttr('disabled');
    $('#createAlumno .form-control').removeClass('is-valid is-invalid');
    $('#createAlumno .custom-select').removeClass('is-valid is-invalid');
}

//limpia imput y select resetea la validación y remueve la clase del modal 
// function limpiar() {
//     $('#createAlumno').trigger("reset");
//     var validator = $("#createAlumno").validate();
//     validator.resetForm();
// }

// CANCELAR ACTUALIZAR
$('#btnCancelUpdate').click(function() {
    infoAlumnosLimpiar();
});

// ACEPTAR ACTUALIZAR
$('#btnAceptUpdate').click(function() {
    infoAlumnosLimpiar();
    $('#modalCreateAlumno').modal('hide');
    // $('#updateAlumno .form-control').removeClass('is-valid is-invalid');
    // $('#updateAlumno .custom-select').removeClass('is-valid is-invalid');
    if ($(document).width() <= 992) {
        $('#updateAlumno .moving-tab').css('width', '100%');
    } else {
        $('#updateAlumno .moving-tab').css('width', '25%');
    }
});

/****************************************************************************
                            ACTUALIZAR ALUMNO
****************************************************************************/
$(function() {
    $('#updateAlumno').submit(function(event) {
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
                url: url + 'Alumno/Actualizar',
                data: $(this).serialize(),
                type: 'POST',
                async: false,
                dataType: 'json',
                success: function(msg) {
                    $('#modalUpdateAlumno').modal('hide');
                    Swal.fire({
                        toast: true,
                        timer: 1500,
                        icon: 'success',
                        position: 'top-end',
                        iconColor: '#3ca230',
                        showConfirmButton: false,
                        title: '<p style="color: #343a40; font-size: 1.3526em; font-weight: 600; line-height: unset; margin: 0;">Datos actualizados!</p>'
                    });
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }
    });
});

/****************************************************************************
                        VALIDACIONES ALUMNO
****************************************************************************/

// $("#createAlumno").validate({
//     rules: {
//         CARNET: { required: true, inCarnet: false },
//         PRIMER_NOMBRE_PERSONA: { required: true, alfaOespacio: true, minlength: 3, maxlength: 15 },
//         PRIMER_APELLIDO_PERSONA: { required: true, alfaOespacio: true, minlength: 3, maxlength: 15 },
//         SEGUNDO_NOMBRE_PERSONA: { alfaOespacio: true, minlength: 3, maxlength: 15 },
//         SEGUNDO_APELLIDO_PERSONA: { alfaOespacio: true, minlength: 3, maxlength: 15 },
//         SEXO: { required: true },
//         CORREO_PERSONAL: { correo: true, correoP: true, inMailPer: true },
//         CORREO_INSTITUCIONAL: { required: true, correo: true, correoU: true, inMailIns: true },
//         TELEFONO_FIJO: { required: true, telF: true, inTelF: true },
//         TELEFONO_MOVIL: { required: true, telM: true, inTelM: true },
//         DEPARTAMENTO: { required: true },
//         DIRECCION: { required: true, minlength: 10, maxlength: 50 },
//         CARRERA: { required: true },
//         FECHA_NACIMIENTO_A: { required: true }
//     },
//     messages: {
//         CARNET: {
//             required: 'Carnet requerido.',
//             inCarnet: 'Este carnet ya existe!'
//         },
//         PRIMER_NOMBRE_PERSONA: {
//             required: "Nombre requerido.",
//             alfaOespacio: "S\u00f3lo letras.",
//             minlength: 'M\u00ednimo 3 caracteres',
//             maxlength: 'M\u00e1ximo 15 caracteres.'
//         },
//         PRIMER_APELLIDO_PERSONA: {
//             required: "Apellido requerido.",
//             alfaOespacio: 'S\u00f3lo letras.',
//             minlength: 'M\u00ednimo 3 caracteres',
//             maxlength: 'M\u00e1ximo 15 caracteres.'
//         },
//         SEGUNDO_NOMBRE_PERSONA: {
//             alfaOespacio: 'S\u00f3lo letras.',
//             minlength: 'M\u00ednimo 3 caracteres',
//             maxlength: 'M\u00e1ximo 15 caracteres.'
//         },
//         SEGUNDO_APELLIDO_PERSONA: {
//             alfaOespacio: 'S\u00f3lo letras.',
//             minlength: 'M\u00ednimo 3 caracteres',
//             maxlength: 'M\u00e1ximo 15 caracteres.'
//         },
//         SEXO: { required: 'Sexo requerido.' },
//         CORREO_PERSONAL: {
//             correo: "Ingrese un correo v\u00e1lido.",
//             correoP: "Ingrese un correo personal.",
//             inMailPer: "Este correo ya existe!"
//         },
//         CORREO_INSTITUCIONAL: {
//             required: "Correo institucional requerido.",
//             correo: "Ingrese un correo v\u00e1lido.",
//             correoU: "Ingrese un correo institucional.",
//             inMailIns: "Este correo ya existe!"
//         },
//         TELEFONO_FIJO: {
//             required: "Tel\u00f3fono fijo requerido.",
//             telF: "Ingrese un tel\u00e9fono fijo",
//             inTelF: "Este tel\u00e9fono ya existe!"
//         },
//         TELEFONO_MOVIL: {
//             required: "Tel\u00f3fono m\u00f3vil requerido.",
//             telM: "Ingrese un tel\u00e9fono m\u00f3vil",
//             inTelM: "Este tel\u00e9fono ya existe!"
//         },
//         DEPARTAMENTO: { required: 'Departamento requerido.' },
//         DIRECCION: {
//             required: 'Direcci\u00f3n requerida.',
//             minlength: 'M\u00ednimo 10 caracteres',
//             maxlength: 'M\u00e1ximo 50 caracteres.'
//         },
//         CARRERA: { required: 'Carrera requerida.' },
//         FECHA_NACIMIENTO_A: { required: 'Fecha requerida.' }
//     }
// });
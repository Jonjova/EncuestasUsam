//llenar select de alumno 
$(document).ready(function() {
    $("ID_ALUMNO_GA").tooltip('show');
    //obtA($('#ID_ASIGNATURA').val());
});

//Guardamos un nuevo alumno.
$("#crearAlumno").submit(function(event) {
    event.preventDefault();
    $.ajax({
        url: url + 'Alumno/Guardar',
        data: $("#crearAlumno").serialize(),
        type: "post",
        dataType: 'json',
        success: function(response) {

            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Datos guardados correctamente',
                showConfirmButton: false,
                timer: 1500
            });
            $(this).find('.nav-tabs a:first').tab('show');

            $('#modalAlumno').modal('hide');
            limpiar();

            cargaFuncion();
        },
        error: function() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Algunos campos son requeridos!'
            })
        }
    });
});
//Esta funcion carga una funcion 2 veces en este caso una accion dinamica
//para el poper del select
function cargaFuncion() {

    var contar = 0;
    for (var i = 0; i < 2; i++) {
        //console.log(i);
        contar = (contar + setTimeout(obtA($('#ID_ASIGNATURA').val()), 5000));
        //setTimeout(obtA, 5000)
    }
    //console.log($('#ID_ASIGNATURA').val());
}
//Barra de progreso
$(function() {
    $('#percentage').formProgress({

        speed: 250, // Duración de la animación
        style: 'green', // Clase asignada a tu barra de progreso
        bubble: true, // Mostrar el porcentaje debajo de la barra de progreso
        selector: '.required', // La clase asignada a cada campo
        minPercent: 70, // Límite mínimo para permitir enviar el formulario
        message: 'Llenar los campos !' // Mostrar error
    });
});

// Esta función remueve al principio de un nav-tabs
$('#modalAlumno').on('hidden.bs.modal', function() {

    $(this).find('.nav-tabs a:first').tab('show');
    $('#cancelBtnId').click();

});

//limpia imput y select resetea la validación y remueve la clase del modal 
function limpiar() {

 
    $('#crearAlumno').trigger("reset");
    var validator = $("#crearAlumno").validate();
    validator.resetForm();
    $('.form-control').removeClass('is-valid is-invalid');
    $('.custom-select').removeClass('is-valid is-invalid');
    infoAlumnosLimpiar();

}

/****************************************************************************
                        VALIDACIONES ALUMNO
****************************************************************************/

$("#crearAlumno").validate({
    rules: {
        CARNET: { required: true, inCarnet: true },
        PRIMER_NOMBRE_PERSONA: { required: true, alfaOespacio: true, minlength: 3, maxlength: 15 },
        PRIMER_APELLIDO_PERSONA: { required: true, alfaOespacio: true, minlength: 3, maxlength: 15 },
        SEGUNDO_NOMBRE_PERSONA: { alfaOespacio: true, minlength: 3, maxlength: 15 },
        SEGUNDO_APELLIDO_PERSONA: { alfaOespacio: true, minlength: 3, maxlength: 15 },
        SEXO: { required: true },
        CORREO_PERSONAL: { correo: true, correoP: true, inMailPer: true },
        CORREO_INSTITUCIONAL: { required: true, correo: true, correoU: true, inMailIns: true },
        TELEFONO_FIJO: { required: true, telF: true, inTelF: true },
        TELEFONO_MOVIL: { required: true, telM: true, inTelM: true },
        DEPARTAMENTO: { required: true },
        DIRECCION: { required: true, minlength: 10, maxlength: 50 },
        CARRERA: { required: true },
        FECHA_NACIMIENTO_A: { required: true }
    },
    messages: {
        CARNET: {
            required: 'Carnet requerido.',
            inCarnet: 'Este carnet ya existe!'
        },
        PRIMER_NOMBRE_PERSONA: {
            required: "Nombre requerido.",
            alfaOespacio: "S\u00f3lo letras.",
            minlength: 'M\u00ednimo 3 caracteres',
            maxlength: 'M\u00e1ximo 15 caracteres.'
        },
        PRIMER_APELLIDO_PERSONA: {
            required: "Apellido requerido.",
            alfaOespacio: 'S\u00f3lo letras.',
            minlength: 'M\u00ednimo 3 caracteres',
            maxlength: 'M\u00e1ximo 15 caracteres.'
        },
        SEGUNDO_NOMBRE_PERSONA: {
            alfaOespacio: 'S\u00f3lo letras.',
            minlength: 'M\u00ednimo 3 caracteres',
            maxlength: 'M\u00e1ximo 15 caracteres.'
        },
        SEGUNDO_APELLIDO_PERSONA: {
            alfaOespacio: 'S\u00f3lo letras.',
            minlength: 'M\u00ednimo 3 caracteres',
            maxlength: 'M\u00e1ximo 15 caracteres.'
        },
        SEXO: { required: 'Sexo requerido.' },
        CORREO_PERSONAL: {
            correo: "Ingrese un correo v\u00e1lido.",
            correoP: "Ingrese un correo personal.",
            inMailPer: "Este correo ya existe!"
        },
        CORREO_INSTITUCIONAL: {
            required: "Correo institucional requerido.",
            correo: "Ingrese un correo v\u00e1lido.",
            correoU: "Ingrese un correo institucional.",
            inMailIns: "Este correo ya existe!"
        },
        TELEFONO_FIJO: {
            required: "Tel\u00f3fono fijo requerido.",
            telF: "Ingrese un tel\u00e9fono fijo",
            inTelF: "Este tel\u00e9fono ya existe!"
        },
        TELEFONO_MOVIL: {
            required: "Tel\u00f3fono m\u00f3vil requerido.",
            telM: "Ingrese un tel\u00e9fono m\u00f3vil",
            inTelM: "Este tel\u00e9fono ya existe!"
        },
        DEPARTAMENTO: { required: 'Departamento requerido.' },
        DIRECCION: {
            required: 'Direcci\u00f3n requerida.',
            minlength: 'M\u00ednimo 10 caracteres',
            maxlength: 'M\u00e1ximo 50 caracteres.'
        },
        CARRERA: { required: 'Carrera requerida.' },
        FECHA_NACIMIENTO_A: { required: 'Fecha requerida.' }
    }
});

//valida el boton de guardar 
$(document).on('change keyup', '.required', function(e) {
    let Disabled = true;
    $(".required").each(function() {
        let value = this.value
        if ((value) && (value.trim() != '')) {
            Disabled = false
        } else {
            Disabled = true
            return false
        }
    });

    if (Disabled) {

        //$('.d').css('pointer-events', 'none');
        $('.toggle-disabled').prop("disabled", true);
    } else {

        //$('.d').css('pointer-events', 'auto');
        $('.toggle-disabled').prop("disabled", false);
    }
})
//llenar select de alumno 
$(document).ready(function() {
    $("ID_ALUMNO_GA").tooltip('show');
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


}

/****************************************************************************
                        VALIDACIONES ALUMNO
****************************************************************************/
//expresión regular teléfono nit dui
jQuery.validator.addMethod("telnitdui", function(value, element) {
    return this.optional(element) || /^[0-9-\s]+$/.test(value);
});

$("#crearAlumno").validate({
    rules: {
        CARNET_A: { required: true, number: true, minlength: 6, maxlength: 6 },
        PRIMER_NOMBRE_PERSONA_A: { required: true, minlength: 3, maxlength: 50 },
        SEGUNDO_NOMBRE_PERSONA_A: { required: true, minlength: 3, maxlength: 50 },
        PRIMER_APELLIDO_PERSONA_A: { required: true, minlength: 3, maxlength: 50 },
        SEGUNDO_APELLIDO_PERSONA_A: { required: true, minlength: 3, maxlength: 50 },
        SEXO_A: { required: true },
        DUI_A: { required: true, telnitdui: true, minlength: 10, maxlength: 10 },
        NIT_A: { required: true, telnitdui: true, minlength: 17, maxlength: 17 },
        CORREO_PERSONAL_A: { required: true, email: true },
        CORREO_INSTITUCIONAL_A: { required: true, email: true },
        TELEFONO_FIJO_A: { required: true, telnitdui: true },
        TELEFONO_MOVIL_A: { required: true, telnitdui: true },
        DEPARTAMENTO_A: { required: true },
        DIRECCION_A: { required: true, minlength: 10, maxlength: 50 },
        CARRERA_A: { required: true },
        FECHA_NACIMIENTO_A: { required: true }
    },
    messages: {
        CARNET_A: { required: 'Carnet es requerido.', number: 'Ingrese número de carnet', minlength: 'El mínimo permitido son 6 números.', maxlength: 'El máximo permitido son 6 números.' },
        PRIMER_NOMBRE_PERSONA_A: { required: 'Primer nombre es requerido.', minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 50 caracteres.' },
        SEGUNDO_NOMBRE_PERSONA_A: { required: 'Segundo nombre es requerido.', minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 50 caracteres.' },
        PRIMER_APELLIDO_PERSONA_A: { required: 'Primer apellido es requerido.', minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 50 caracteres.' },
        SEGUNDO_APELLIDO_PERSONA_A: { required: 'Segundo apellido es requerido.', minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 50 caracteres.' },
        SEXO_A: { required: 'Sexo es requerido.' },
        DUI_A: { required: 'DUI es requerido.', telnitdui: 'Ingrese número de DUI', minlength: 'El mínimo permitido son 6 números.', maxlength: 'El máximo permitido son 6 números.' },
        NIT_A: { required: 'NIT es requerido.', telnitdui: 'Ingrese número de NIT', minlength: 'El mínimo permitido son 6 números.', maxlength: 'El máximo permitido son 6 números.' },
        CORREO_PERSONAL_A: { required: 'Correo es requerido.', email: 'Ingrese un correo válido' },
        CORREO_INSTITUCIONAL_A: { required: 'Correo es requerido.', email: 'Ingrese un correo válido' },
        TELEFONO_FIJO_A: { required: 'Teléfono fijo es requerido.', telnitdui: 'Ingrese número de Teléfono fijo' },
        TELEFONO_MOVIL_A: { required: 'Teléfono movil es requerido.', telnitdui: 'Ingrese número de Teléfono movil' },
        DEPARTAMENTO_A: { required: 'Departamento es requerido.' },
        DIRECCION_A: { required: 'Dirección es requerida.', minlength: 'El mínimo permitido son 10 caracteres', maxlength: 'El máximo permitido son 50 caracteres.' },
        CARRERA_A: { required: 'Carrera es requerido.' },
        FECHA_NACIMIENTO_A: { required: 'Fecha es requerido.' }
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
        $('.toggle-disabled').prop("disabled", true);
    } else {
        $('.toggle-disabled').prop("disabled", false);
    }
})
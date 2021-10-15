//efecto en los input de la case needs-validation
jQuery.validator.setDefaults({
    debug: true,
    success: "valid",
    onfocusout: function(e) {
        this.element(e);
    },
    onkeyup: false,

    highlight: function(element) {
        jQuery(element).closest('.form-control').addClass('is-invalid');
        jQuery(element).closest('.custom-select').addClass('is-invalid');
    },
    unhighlight: function(element) {
        jQuery(element).closest('.form-control').removeClass('is-invalid');
        jQuery(element).closest('.form-control').addClass('is-valid');
        jQuery(element).closest('.custom-select').removeClass('is-invalid');
        jQuery(element).closest('.custom-select').addClass('is-valid');
    },

    errorElement: 'div',
    errorClass: 'invalid-feedback',
    errorPlacement: function(error, element) {
        if (element.parent('.input-group-prepend').length) {
            $(element).siblings(".invalid-feedback").append(error);
            //error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});

//aqui se agrega el campo del name
$("#CrearProyecto").validate({
    rules: {
        NOMBRE_PROYECTO: { required: true, minlength: 6, maxlength: 50 },
        DESCRIPCION: { required: true, minlength: 6, maxlength: 50 },
        ID_TIPO_INVESTIGACION: { required: true },
        ID_ASIGNATURA: { required: true },
        ID_DISENIO_INVESTIGACION: { required: true },
        FECHA_ASIGNACION: { required: true },
        ID_GRUPO_ALUMNO: { required: true },
        CICLO: { required: true }
    },
    messages: {
        NOMBRE_PROYECTO: { required: 'Nombre de Proyecto es requerido.', minlength: 'El mínimo permitido son 6 caracteres.', maxlength: 'El máximo permitido son 50 caracteres.' },
        DESCRIPCION: { required: 'Descripción es requerido.', minlength: 'El mínimo permitido son 6 caracteres', maxlength: 'El máximo permitido son 50 caracteres.' },
        ID_TIPO_INVESTIGACION: { required: 'Tipo de investigación es requerido.' },
        ID_ASIGNATURA: { required: 'Asignatura es requerido.' },
        ID_DISENIO_INVESTIGACION: { required: 'Diseño de investigación es requerido.' },
        FECHA_ASIGNACION: { required: 'Fecha es requerido.' },
        ID_GRUPO_ALUMNO: { required: 'Grupo de alumno es requerido.' },
        CICLO: { required: 'Ciclo es requerido.' }
    }
});
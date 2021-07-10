$(document).ready(function() {

    $("#btnIngresar").on("click", function() {
        $("#logForm").validate({
            rules: {
                user: { required: true, minlength: 2, maxlength: 50 },
                password: { required: true, minlength: 2, maxlength: 50 }

            },
            messages: {
                user: { required: 'El campo de Usuario es requerido', minlength: 'El mínimo permitido son 2 caracteres', maxlength: 'El máximo permitido son 50 caracteres' },
                password: { required: 'El campo de Contraseña es requerido', minlength: 'El mínimo permitido son 2 caracteres', maxlength: 'El máximo permitido son 50 caracteres' }

            }
        });

    });
});
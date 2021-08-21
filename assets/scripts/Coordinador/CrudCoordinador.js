/****************************************************************************
                            INSERTAR COORDINADOR
****************************************************************************/
$(function() {
    $("#CreateCoordinador").submit(function(event) {
        crearUsuarioPass();
        var forms = $("#CreateCoordinador");
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
        });
    });
});
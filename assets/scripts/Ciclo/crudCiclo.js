/****************************************************************************
                            INSERTAR CICLO
****************************************************************************/
$(function() {
    $('#CreateCiclo').submit(function(event) {
        var forms = $('#CreateCiclo');
        var validation = Array.prototype.filter.call(forms, function(form) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Complete el formulario!'
                })
                $('.custom-select').addClass('is-invalid');
            }
            if (form.checkValidity() === true) {
                $.ajax({
                    url: url + 'Ciclo/crearCiclo',
                    data: $('#CreateCiclo').serialize(),
                    type: 'post',
                    async: false,
                    dataType: 'json',
                    success: function(msg) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Ciclo guardado',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#CreateCiclo')[0].reset();
                        $('#CreateCiclo .form-control').removeClass('is-valid');
                        $('#CreateCiclo .custom-select').removeClass('is-valid');
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Error al guardar ciclo!'
                        });
                    }
                });
            }
        });
    });
});
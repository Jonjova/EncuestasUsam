/****************************************************************************
                            INSERTAR MATERIA
****************************************************************************/
$(function() {
    $("#CreateAsignatura").submit(function(event) {
        var forms = $("#CreateAsignatura");
        var validation = Array.prototype.filter.call(forms, function(form) {
            if (form.checkValidity() === false || $('span').hasClass('text-danger')) {
                event.preventDefault();
                event.stopPropagation();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Complete el formulario!'
                })
                $(".custom-select").addClass('is-invalid');
            }
            if (form.checkValidity() === true && !$('span').hasClass('text-danger')) {
                $.ajax({
                    url: url + 'Asignatura/crearAsignatura',
                    data: $("#CreateAsignatura").serialize(),
                    type: "post",
                    async: false,
                    dataType: 'json',
                    success: function(msg) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Asignatura Guardada',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#CreateAsignatura')[0].reset();
                        $(".form-control").removeClass('is-valid');
                        $(".custom-select").removeClass('is-valid');
                    }
                });
            }
        });
    });
});
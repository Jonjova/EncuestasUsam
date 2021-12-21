/****************************************************************************
                            INSERTAR CICLO
****************************************************************************/
$(function() {
    $('#CreateCiclo').submit(function(event) {
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
                url: url + 'Ciclo/crearCiclo',
                data: $(this).serialize(),
                type: 'POST',
                async: false,
                dataType: 'json',
                success: function(msg) {
                    Swal.fire({
                        toast: true,
                        timer: 3000,
                        icon: 'success',
                        position: 'top-end',
                        iconColor: '#3ca230',
                        showConfirmButton: false,
                        title: '<p style="color: #343a40; font-size: 1.235em; font-weight: 600; line-height: unset; margin: 0;">' + msg + '</p>'
                    });
                    $('#CreateCiclo')[0].reset();
                    $('#CreateCiclo .form-control').removeClass('is-valid');
                    $('#CreateCiclo .custom-select').removeClass('is-valid');
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }
    });
});
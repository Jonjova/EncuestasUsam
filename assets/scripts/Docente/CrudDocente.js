/****************************************************************************
                            INSERTAR DOCENTE
****************************************************************************/
$(function() {
    $("#CreateDocente").submit(function(event) {
        crearUsuarioPass();
        var forms = $("#CreateDocente");
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
                    url: url + 'Docente/crearDocente',
                    data: $("#CreateDocente").serialize(),
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

/****************************************************************************
                            CAMBIAR ESTADO DOCENTE
****************************************************************************/
function cambiarEstado(USUARIO) {
    setTimeout(function() {
        $.ajax({
            url: url + 'Docente/cambiarEstado',
            data: { 'ID_USUARIO': USUARIO },
            type: "POST",
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
    }, 300)
}
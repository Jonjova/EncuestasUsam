$(document).ready(function() {
    llenarTablaAsignatura();
    llenarTablaDocenteAsignatura();
});

/****************************************************************************
                        LLENAR TABLA DE ASIGNATURAS
****************************************************************************/
function llenarTablaAsignatura() {
    $('#Asignaturas').DataTable({
        'ajax': url + 'Asignatura/mostrarAsignaturas',
        'order': [],
        'language': idioma_espanol
    });
}

/****************************************************************************
                    LLENAR TABLA DE DOCENTES ASIGNATURAS
****************************************************************************/
function llenarTablaDocenteAsignatura() {
    $('#DocentesAsignaturas').DataTable({
        'ajax': url + 'Asignatura/mostrarDocentesAsignaturas',
        'order': [],
        'language': idioma_espanol
    });
}

/****************************************************************************
                            INSERTAR ASIGNATURA
****************************************************************************/
$(function() {
    $('#CreateAsignatura').submit(function(event) {
        var forms = $('#CreateAsignatura');
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
                    url: url + 'Asignatura/crearAsignatura',
                    data: $('#CreateAsignatura').serialize(),
                    type: 'post',
                    async: false,
                    dataType: 'json',
                    success: function(msg) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Asignatura guardada',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#CreateAsignatura')[0].reset();
                        $('#CreateAsignatura .form-control').removeClass('is-valid');
                        $('#CreateAsignatura .custom-select').removeClass('is-valid');
                    }
                });
            }
        });
    });
});

/****************************************************************************
                            ASIGNAR ASIGNATURA
****************************************************************************/
$(function() {
    $('#AsignarMateria').submit(function(event) {
        var forms = $('#AsignarMateria');
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
                    url: url + 'Asignatura/asignarAsignatura',
                    data: $('#AsignarMateria').serialize(),
                    type: 'post',
                    async: false,
                    dataType: 'json',
                    success: function(msg) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Asiganci\u00f3n realizada',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#AsignarMateria')[0].reset();
                        $('#AsignarMateria .form-control').removeClass('is-valid');
                        $('#AsignarMateria .custom-select').removeClass('is-valid');
                    }
                });
            }
        });
    });
});
// LLENAR INPUTS PARA AGREGAR ALUMNOS A UN NUEVO GRUPO
function grupoAsignaturaCiclo() {
    $('#ID_ASIGNATURA_G').val($('#CrearProyecto #ID_ASIGNATURA').val());
    $('#CICLO_G').val($('#CrearProyecto #CICLO').val());
}

//Validación de si ya existe en un grupo 
// function valGrupoAlumno() {
//     var grupo = $('#ID_ALUMNO_GA :selected').val();
//     if (grupo) {
//         $.ajax({
//             url: url + 'GrupoAlumno/validarGrupoAlumno',
//             data: 'ID_ALUMNO_GA=' + grupo,
//             type: 'post',
//             success: function(data) {
//                 if (data == 1) {
//                     Swal.fire({
//                         icon: 'error',
//                         title: 'Datos de grupo',
//                         text: 'Este alumno ya existe en un grupo!'
//                     })
//                     $("#ID_ALUMNO_GA option:selected").prop("selected", false);
//                 }
//             }
//         });
//     }
// }

/****************************************************************************
                            GUARDAR GRUPO
****************************************************************************/
$("#CreateGrupo").submit(function(event) {
    if (!$(this).valid()) {
        Swal.fire({
            icon: 'error',
            allowEscapeKey: false,
            allowOutsideClick: false,
            confirmButtonColor: "#343a40",
            text: 'Campos vac\u00edos o inv\u00e1lidos!',
            title: '<p style="color: #343a40; font-size: 1.072em; font-weight: 600; line-height: unset; margin: 0;">Error de inserci\u00f3n</p>'
        });
        $('#ID_ALUMNO_GA-error').css({ 'position': 'absolute', 'margin-top': '2.8rem' });
        $('#ID_ALUMNO_GA-error').html('Alumnos requeridos.');
    } else {
        event.preventDefault();
        $.ajax({
            url: url + 'GrupoAlumno/Guardar',
            data: $(this).serialize(),
            type: "post",
            async: false,
            dataType: 'json',
            success: function(response) {
                if (response == true) {
                    alert('Datos guardados correctamente!');
                }
            },
            error: function(xhr, status) {
                if (xhr.status == 200) {
                    $('#CreateGrupo').trigger("reset");
                    Swal.fire({
                        toast: true,
                        timer: 1500,
                        icon: 'success',
                        position: 'top-end',
                        iconColor: '#3ca230',
                        showConfirmButton: false,
                        title: '<p style="color: #343a40; font-size: 1.49em; font-weight: 600; line-height: unset; margin: 0;">Datos guardados!</p>'
                    });
                    cargarSelectGrupos();
                    cargarSelectAlumnos();
                    $('#modalGrupo').modal('hide');
                }
            }
        });
    }
});

// RECARGAR SELECT GRUPOS AL CREAR UN NUEVO GRUPO
function cargarSelectGrupos() {
    var contar = 0;
    for (var i = 0; i < 2; i++) {
        contar = (contar + setTimeout(grupoAlumno($("#CrearProyecto [name='ID_ASIGNATURA']").val()), 1000));
    }
}

// RECARGAR SELECT ALUMNOS AL CREAR UN NUEVO GRUPO
function cargarSelectAlumnos() {
    var contar = 0;
    for (var i = 0; i < 2; i++) {
        contar = (contar + setTimeout(alumnos($("#CrearProyecto [name='ID_ASIGNATURA']").val()), 1000));
    }
    $('.bootstrap-select').selectpicker('refresh');
}
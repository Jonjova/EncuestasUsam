jQuery(document).ready(function($) {
    obtSexo();
    obtDepart();
    obtCarrera();
});
//llenar select de Sexo 
function obtSexo() {
    $.ajax({
        url: url + "Alumno/Sexo",
        type: 'post',
        success: function(data) {

            //Insertar
            $('#SEXO_A').html(data);
        }
    });
}

//llenar select de Departamento 
function obtDepart() {
    $.ajax({
        url: url + "Alumno/Departamento",
        type: 'post',
        success: function(data) {
            //Insertar
            $('#DEPARTAMENTO_A').html(data);
        }
    });
}
//llenar select de Carrera 
function obtCarrera() {
    $.ajax({
        url: url + "Alumno/Carrera",
        type: 'post',
        success: function(data) {
            //Insertar
            $('#CARRERA_A').html(data);
        }
    });
}

//Guardamos un nuevo Grupo de alumno.
$("#crearAlumno").submit(function(event) {
    $(this).find('.nav-tabs a:first').tab('show');
    event.preventDefault();
    $.ajax({
        url: url + 'Alumno/Guardar',
        data: $("#crearAlumno").serialize(),
        type: "post",
        async: false,
        cache: false,
        dataType: 'json',
        success: function(response) {

            // $('#createModal').modal('hide');

            $('#crearAlumno')[0].reset();
            alert('Datos guardados correctamente!');

        },
        error: function() {
            alert("error");
        }
    });
});
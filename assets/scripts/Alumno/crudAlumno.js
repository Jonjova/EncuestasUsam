jQuery(document).ready(function($) {
    obtSexo();
    obtDepart();
    obtCarrera();
});
//llenar select de Sexo 
function obtSexo() {
<<<<<<< HEAD
    $.ajax({
        url: url + "Alumno/Sexo",
        type: 'post',
        success: function(data) {

            //Insertar
            $('#SEXO_A').html(data);
        }
    });
=======
  $.ajax({
    url: url + "Alumno/Sexo",
    type: 'post',
    success: function(data) {

            //Insertar
            $('#SEXO_A').html(data);
          }
        });
>>>>>>> 9562fe41950eedf968c7bcb3ae12a98ee790c6f8
}

//llenar select de Departamento 
function obtDepart() {
    $.ajax({
        url: url + "Alumno/Departamento",
        type: 'post',
        success: function(data) {
            //Insertar
            $('#DEPARTAMENTO_A').html(data);
<<<<<<< HEAD
        }
    });
=======
          }
        });
>>>>>>> 9562fe41950eedf968c7bcb3ae12a98ee790c6f8
}
//llenar select de Carrera 
function obtCarrera() {
    $.ajax({
        url: url + "Alumno/Carrera",
        type: 'post',
        success: function(data) {
            //Insertar
            $('#CARRERA_A').html(data);
<<<<<<< HEAD
        }
    });
=======
          }
        });
>>>>>>> 9562fe41950eedf968c7bcb3ae12a98ee790c6f8
}

//llenar select de alumno 
$(document).ready(function() {
  $("ID_ALUMNO_GA").tooltip('show');
});



//Guardamos un nuevo alumno.
$("#crearAlumno").submit(function(event) {
<<<<<<< HEAD
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
=======
  event.preventDefault();
  $.ajax({
    url: url+'Alumno/Guardar',  
    data: $("#crearAlumno").serialize(),
    type: "post",
    dataType: 'json',
    success: function(response){

     Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: 'Datos guardados correctamente',
      showConfirmButton: false,
      timer: 1500
    });
     $(this).find('.nav-tabs a:first').tab('show');

     $('#modalAlumno').modal('hide');
     limpiar();
   },
   error: function()
   {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Algunos campos son requeridos!'
    })
  }
});
}); 

//Barra de progreso
$(function(){
  $('#percentage').formProgress({
        
        speed : 250,// Duración de la animación
        style : 'green',// Clase asignada a tu barra de progreso
        bubble : true, // Mostrar el porcentaje debajo de la barra de progreso
        selector : '.required',// La clase asignada a cada campo
        minPercent : 70, // Límite mínimo para permitir enviar el formulario
        message : 'Llenar los campos !' // Mostrar error
      });
});


// Esta función remueve al principio de un nav-tabs
$('#modalAlumno').on('hidden.bs.modal', function() { 

  $(this).find('.nav-tabs a:first').tab('show');
  $('#cancelBtnId').click();  

}) ;


//limpia imput y select resetea la validación y remueve la clase del modal 
function limpiar() {

  $('#crearAlumno').trigger("reset");
  var validator = $("#crearAlumno").validate();
  validator.resetForm();
  $('.form-control').removeClass('is-valid is-invalid');

}
>>>>>>> 9562fe41950eedf968c7bcb3ae12a98ee790c6f8

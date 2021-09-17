jQuery(document).ready(function($) {
  obtA();
});
//Guardamos un nuevo Grupo de alumno.
$("#createForm").submit(function(event) {
  event.preventDefault();
  $.ajax({
    url: url+'GrupoAlumno/Guardar',  
    data: $("#createForm").serialize(),
    type: "post",
    //async: false,
    cache:false,
    dataType: 'json',
    success: function(response){

      $('#createModal').modal('hide');
      $('#createForm')[0].reset();
      alert('Datos guardados correctamente!'); 

    },
    error: function()
    {
      alert("error");
    }
  });
}); 


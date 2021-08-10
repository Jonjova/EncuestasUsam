jQuery(document).ready(function($) {
  obtA();
});
//llenar select de Sexo 

$(document).ready(function() {
  $("ID_ALUMNO_GA").tooltip('show');
});
function obtA() {
  $.ajax({
    url: url + "GrupoAlumno/Alumno",
    type: 'post',
    dataType: 'json',
    async:true,
    cache:false,
    success: function(data) {

     var json = JSON.parse(JSON.stringify(data));
     console.log(json);
     var select = $('<select>');
     $('#ID_ALUMNO_GA').empty().append("");
     $.each(json, function(id, name) {
      select.append('<option value=' + id.ID_ALUMNO + '>' + 
                                       name.CARNET + " "+
                                       name.PRIMER_NOMBRE_PERSONA + " "+
                                       name.PRIMER_APELLIDO_PERSONA +

                                        '</option>');
    });
     $('#ID_ALUMNO_GA').append(select.html());
      $('.bootstrap-select').selectpicker('refresh');
   }
 })
}
//Guardamos un nuevo Grupo de alumno.
$("#createForm").submit(function(event) {
  event.preventDefault();
  $.ajax({
    url: url+'GrupoAlumno/Guardar',  
    data: $("#createForm").serialize(),
    type: "post",
    async: false,
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


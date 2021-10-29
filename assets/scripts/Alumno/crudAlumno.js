//llenar select de alumno 
$(document).ready(function() {
  $("ID_ALUMNO_GA").tooltip('show');
});

//Guardamos un nuevo alumno.
$("#crearAlumno").submit(function(event) {
  event.preventDefault();
  $.ajax({
    url: url + 'Alumno/Guardar',
    data: $("#crearAlumno").serialize(),
    type: "post",
    dataType: 'json',
    success: function(response) {

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
      
      cargaFuncion();
    },
    error: function() {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Algunos campos son requeridos!'
      })
    }
  });
});
//Esta funcion carga una funcion 2 veces en este caso una accion dinamica
//para el poper del select
function cargaFuncion(){

  var contar =0;
  for (var i = 0; i < 2; i++) {
    //console.log(i);
    contar = (contar + setTimeout(obtA, 5000));
    //setTimeout(obtA, 5000)
  }
  console.log(contar);
}
//Barra de progreso
$(function() {
  $('#percentage').formProgress({

        speed: 250, // Duración de la animación
        style: 'green', // Clase asignada a tu barra de progreso
        bubble: true, // Mostrar el porcentaje debajo de la barra de progreso
        selector: '.required', // La clase asignada a cada campo
        minPercent: 70, // Límite mínimo para permitir enviar el formulario
        message: 'Llenar los campos !' // Mostrar error
      });
});

// Esta función remueve al principio de un nav-tabs
$('#modalAlumno').on('hidden.bs.modal', function() {

  $(this).find('.nav-tabs a:first').tab('show');
  $('#cancelBtnId').click();

});

//limpia imput y select resetea la validación y remueve la clase del modal 
function limpiar() {


  $('#crearAlumno').trigger("reset");
  var validator = $("#crearAlumno").validate();
  validator.resetForm();
  $('.form-control').removeClass('is-valid is-invalid');
  $('.custom-select').removeClass('is-valid is-invalid');


}

/****************************************************************************
                        VALIDACIONES ALUMNO
                        ****************************************************************************/
//expresión regular teléfono nit dui

jQuery.validator.addMethod("telnitdui", function(value, element) {
  return this.optional(element) || /^[0-9-\s]+$/.test(value);
});

$("#crearAlumno").validate({
  rules: {
    CARNET: { required: true, number: true, minlength: 6, maxlength: 6 },
    PRIMER_NOMBRE_PERSONA: { required: true, minlength: 3, maxlength: 50 },
    SEGUNDO_NOMBRE_PERSONA: { required: true, minlength: 3, maxlength: 50 },
    PRIMER_APELLIDO_PERSONA: { required: true, minlength: 3, maxlength: 50 },
    SEGUNDO_APELLIDO_PERSONA: { required: true, minlength: 3, maxlength: 50 },
    SEXO: { required: true },
    DUI: { required: true, telnitdui:true, minlength: 10, maxlength: 10 },
    NIT: { required: true, telnitdui:true, minlength: 17, maxlength: 17 },
    CORREO_PERSONAL: { required: true, email: true },
    CORREO_INSTITUCIONAL: { required: true, email: true },
    TELEFONO_FIJO: { required: true, telnitdui:true},
    TELEFONO_MOVIL: { required: true,  telnitdui:true },
    DEPARTAMENTO: { required: true },
    DIRECCION: { required: true, minlength: 10, maxlength: 50 },
    CARRERA:{ required: true },
    FECHA_NACIMIENTO:{ required: true }
  },
  messages: {
    CARNET: { required: 'Carnet es requerido.', number: 'Ingrese número de carnet', minlength: 'El mínimo permitido son 6 números.', maxlength: 'El máximo permitido son 6 números.' },
    PRIMER_NOMBRE_PERSONA: { required: 'Primer nombre es requerido.', minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 50 caracteres.' },
    SEGUNDO_NOMBRE_PERSONA: { required: 'Segundo nombre es requerido.', minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 50 caracteres.' },
    PRIMER_APELLIDO_PERSONA: { required: 'Primer apellido es requerido.', minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 50 caracteres.' },
    SEGUNDO_APELLIDO_PERSONA: { required: 'Segundo apellido es requerido.', minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 50 caracteres.' },
    SEXO: { required: 'Sexo es requerido.' },
    DUI: { required: 'DUI es requerido.',telnitdui: 'Ingrese número de DUI', minlength: 'El mínimo permitido son 6 números.', maxlength: 'El máximo permitido son 6 números.' },
    NIT: { required: 'NIT es requerido.',telnitdui: 'Ingrese número de NIT', minlength: 'El mínimo permitido son 6 números.', maxlength: 'El máximo permitido son 6 números.' },
    CORREO_PERSONAL: { required: 'Correo es requerido.', email: 'Ingrese un correo válido' },
    CORREO_INSTITUCIONAL: { required: 'Correo es requerido.', email: 'Ingrese un correo válido' },
    TELEFONO_FIJO: { required: 'Teléfono fijo es requerido.',telnitdui: 'Ingrese número de Teléfono fijo' },
    TELEFONO_MOVIL: { required: 'Teléfono movil es requerido.' ,telnitdui: 'Ingrese número de Teléfono movil' },
    DEPARTAMENTO: { required: 'Departamento es requerido.' },
    DIRECCION: { required: 'Dirección es requerida.', minlength: 'El mínimo permitido son 10 caracteres', maxlength: 'El máximo permitido son 50 caracteres.' },
    CARRERA: { required: 'Carrera es requerido.' },
    FECHA_NACIMIENTO: { required: 'Fecha es requerido.' }
  }
});

$('#CARNET_A').mask('999999');
$('#DUI_A').mask('99999999-9');
$('#NIT_A').mask('9999-999999-999-9');
$('#TELEFONO_FIJO_A').mask('9999-9999');
$('#TELEFONO_MOVIL_A').mask('9999-9999');

//Validación correo institucional
function valCI(){
  var ci =$('#CORREO_INSTITUCIONAL_A').val();
  if(ci){
    $.ajax({
      url:url+ 'Alumno/validarCorreoInstitucional',
      data:'CORREO_INSTITUCIONAL_A='+ci,
      type:'post',
      success: function(data){

        if (data==1) {

          Swal.fire({
            icon: 'error',
            title: 'Datos personales',
            text: 'Este correo ya existe!'
          })
          $('#CORREO_INSTITUCIONAL_A').val('');   
          $('#CORREO_INSTITUCIONAL_A').removeClass('is-valid');

        } 
      }
    });
  }
}
//Validación correo personal
function valCP(){
  var cp =$('#CORREO_PERSONAL_A').val();
  if(cp){
    $.ajax({
      url:url+ 'Alumno/validarCorreoPersonal',
      data:'CORREO_PERSONAL_A='+cp,
      type:'post',
      success: function(data){

        if (data==1) {

          Swal.fire({
            icon: 'error',
            title: 'Datos personales',
            text: 'Este correo ya existe!'
          })
          $('#CORREO_PERSONAL_A').val('');   
          $('#CORREO_PERSONAL_A').removeClass('is-valid');

        } 
      }
    });
  }
}
//Validación carnet
function valC(){
  var carnet =$('#CARNET_A').val();
  if(carnet){
    $.ajax({
      url:url+ 'Alumno/validarCarnet',
      data:'CARNET_A='+carnet,
      type:'post',
      success: function(data){

        if (data==1) {

          Swal.fire({
            icon: 'error',
            title: 'Datos personales',
            text: 'Este carnet ya existe!'
          })
          $('#CARNET_A').val('');   
          $('#CARNET_A').removeClass('is-valid');

        } 
      }
    });
  }
}

//Validación DUI
function valD(){
  var dui =$('#DUI_A').val();
  if(dui){
    $.ajax({
      url:url+ 'Alumno/validarDUI',
      data:'DUI_A='+dui,
      type:'post',
      success: function(data){

        if (data==1) {

          Swal.fire({
            icon: 'error',
            title: 'Datos personales',
            text: 'Este DUI ya existe!'
          })
          $('#DUI_A').val('');   
          $('#DUI_A').removeClass('is-valid');

        } 
      }
    });
  }
}

//Validación NIT
function valN(){
  var nit =$('#NIT_A').val();
  if(nit){
    $.ajax({
      url:url+ 'Alumno/validarNIT',
      data:'NIT_A='+nit,
      type:'post',
      success: function(data){

        if (data==1) {

          Swal.fire({
            icon: 'error',
            title: 'Datos personales',
            text: 'Este NIT ya existe!'
          })
          $('#NIT_A').val('');   
          $('#NIT_A').removeClass('is-valid');

        } 
      }
    });
  }
}
//valida el boton de guardar 
$(document).on('change keyup', '.required', function(e){
 let Disabled = true;
 $(".required").each(function() {
  let value = this.value
  if ((value)&&(value.trim() !=''))
  {
    Disabled = false
  }else{
    Disabled = true
    return false
  }
});

 if(Disabled){

        //$('.d').css('pointer-events', 'none');
        $('.toggle-disabled').prop("disabled", true);
      }else{

       //$('.d').css('pointer-events', 'auto');
       $('.toggle-disabled').prop("disabled", false);
     }
   })


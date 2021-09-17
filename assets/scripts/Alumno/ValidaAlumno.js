
//expresión regular teléfono nit dui
jQuery.validator.addMethod("telnitdui", function(value, element) {
  return this.optional(element) || /^[0-9-\s]+$/.test(value);
});

$("#crearAlumno").validate({
  rules: {
    CARNET_A: { required: true, number: true, minlength: 6, maxlength: 6 },
    PRIMER_NOMBRE_PERSONA_A: { required: true, minlength: 3, maxlength: 50 },
    SEGUNDO_NOMBRE_PERSONA_A: { required: true, minlength: 3, maxlength: 50 },
    PRIMER_APELLIDO_PERSONA_A: { required: true, minlength: 3, maxlength: 50 },
    SEGUNDO_APELLIDO_PERSONA_A: { required: true, minlength: 3, maxlength: 50 },
    SEXO_A: { required: true },
    DUI_A: { required: true, telnitdui:true, minlength: 10, maxlength: 10 },
    NIT_A: { required: true, telnitdui:true, minlength: 17, maxlength: 17 },
    CORREO_PERSONAL_A: { required: true, email: true },
    CORREO_INSTITUCIONAL_A: { required: true, email: true },
    TELEFONO_FIJO_A: { required: true, telnitdui:true},
    TELEFONO_MOVIL_A: { required: true,  telnitdui:true },
    DEPARTAMENTO_A: { required: true },
    DIRECCION_A: { required: true, minlength: 10, maxlength: 50 },
    CARRERA_A:{ required: true },
    FECHA_NACIMIENTO_A:{ required: true }
  },
  messages: {
    CARNET_A: { required: 'Carnet es requerido.', number: 'Ingrese número de carnet', minlength: 'El mínimo permitido son 6 números.', maxlength: 'El máximo permitido son 6 números.' },
    PRIMER_NOMBRE_PERSONA_A: { required: 'Primer nombre es requerido.', minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 50 caracteres.' },
    SEGUNDO_NOMBRE_PERSONA_A: { required: 'Segundo nombre es requerido.', minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 50 caracteres.' },
    PRIMER_APELLIDO_PERSONA_A: { required: 'Primer apellido es requerido.', minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 50 caracteres.' },
    SEGUNDO_APELLIDO_PERSONA_A: { required: 'Segundo apellido es requerido.', minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 50 caracteres.' },
    SEXO_A: { required: 'Sexo es requerido.' },
    DUI_A: { required: 'DUI es requerido.',telnitdui: 'Ingrese número de DUI', minlength: 'El mínimo permitido son 6 números.', maxlength: 'El máximo permitido son 6 números.' },
    NIT_A: { required: 'NIT es requerido.',telnitdui: 'Ingrese número de NIT', minlength: 'El mínimo permitido son 6 números.', maxlength: 'El máximo permitido son 6 números.' },
    CORREO_PERSONAL_A: { required: 'Correo es requerido.', email: 'Ingrese un correo válido' },
    CORREO_INSTITUCIONAL_A: { required: 'Correo es requerido.', email: 'Ingrese un correo válido' },
    TELEFONO_FIJO_A: { required: 'Teléfono fijo es requerido.',telnitdui: 'Ingrese número de Teléfono fijo' },
    TELEFONO_MOVIL_A: { required: 'Teléfono movil es requerido.' ,telnitdui: 'Ingrese número de Teléfono movil' },
    DEPARTAMENTO_A: { required: 'Departamento es requerido.' },
    DIRECCION_A: { required: 'Dirección es requerida.', minlength: 'El mínimo permitido son 10 caracteres', maxlength: 'El máximo permitido son 50 caracteres.' },
    CARRERA_A: { required: 'Carrera es requerido.' },
    FECHA_NACIMIENTO_A: { required: 'Fecha es requerido.' }
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
        $('.toggle-disabled').prop("disabled", true);
      }else{
        $('.toggle-disabled').prop("disabled", false);
      }
 })



function mostrarPassword(){
		var cambio = document.getElementById("txtPassword");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
	$(document).ready(function () {
	//CheckBox mostrar contraseña
	$('#ShowPassword').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});
// login ajax y estados 
$(document).ready(function(){
	
		$("#logForm").submit(function(ev) {//id de formulario 
			$("#alert").html("");//esto quita el mensaje de error si todo esta bien
			$.ajax({
				url: url + 'Accesos/Validar',
				type:'POST',
				data: $(this).serialize(),
				success: function(data){//
					var json = JSON.parse(JSON.stringify(data));
					location.reload();//devuelve una url con json	
				},
				error: function(xhr){
					if(xhr.status == 400){
						var json = JSON.parse(xhr.responseText);
						//console.log(json);
						$("#alert").html('<div class="alert alert-danger" role="alert">'+ json.msg+'</div>');
					}
					if(xhr.status == 401){
						var json = JSON.parse(xhr.responseText);
						//console.log(json);
						$("#alert").html('<div class="alert alert-danger" role="alert">'+ json.msg+'</div>');
					}
				},	
			});
			ev.preventDefault();
		});	

});
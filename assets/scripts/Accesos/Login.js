$(document).ready(function(){
	$('#logText').html('Ingresar');
	$('#logForm').submit(function(e){
		e.preventDefault();
		$('#logText').html('Comprobado ...');
		var user = $('#logForm').serialize();
		var login = function(){
			$.ajax({
				type: 'POST',
				url: url + 'Accesos/login',
				dataType: 'json',
				data: user,
				success:function(response){
					$('#message').html(response.message);
					$('#logText').html('Ingresar');
					if(response.error){
						$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
					}
					else{
						$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
						$('#logForm')[0].reset();
						setTimeout(function(){
							location.reload();
						}, 3000);
					}
				}
			});
		};
		setTimeout(login, 3000);
	});

	$(document).on('click', '#clearMsg', function(){
		$('#responseDiv').hide();
	});
});
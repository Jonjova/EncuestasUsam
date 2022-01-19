$(function() {

	$("#Selectfiltro").on('change', function() {

	var selectValue = $(this).val();
	switch (selectValue) {

		case "1":
		$("#asig").show();
		$("#coord").hide();
		$("#fac").hide();
		$("#cic").hide();
		break;

		case "2":
		$("#asig").hide();
		$("#coord").show();
		$("#fac").hide();
		$("#cic").hide();
		break;

		case "3":
		$("#asig").hide();
		$("#coord").hide();
		$("#fac").show();
		$("#cic").hide();
		break;

		case "4":
		$("#asig").hide();
		$("#coord").hide();
		$("#fac").hide();
		$("#cic").show();
		break;

	}

	}).change();

	});
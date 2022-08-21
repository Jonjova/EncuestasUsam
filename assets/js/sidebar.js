$(document).ready(function () {
	// $("#sidebar").mCustomScrollbar({
	//   theme: "minimal"
	// });
	$(".menu").mCustomScrollbar({
    theme:"minimal",
		axis: "yx",
		scrollbarPosition: "inside",
		raggerLength: true,
		mouseWheel: { enable: true },
    scrollButtons: {enable:true},
    mouseWheelPixels: 80,
    scrollInertia: 0
	});
	$("#dismiss, .overlay").on("click", function () {
		$("#sidebar").removeClass("active");
		$(".overlay").removeClass("active");
	});

	$("#sidebarCollapse").on("click", function () {
		$("#sidebar").toggleClass("active");
	});
});

//Select 2 otro diseño  buscador en tiempo real
$(".sele").select2({
	theme: "bootstrap",
	allowClear: true,
	placeholder: "Seleccione...",
	tokenSeparators: [",", " "],
});

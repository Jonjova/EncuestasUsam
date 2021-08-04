	
  $(document).ready(function () {
    $("#sidebar").mCustomScrollbar({
      theme: "minimal"
    });

    $('#dismiss, .overlay').on('click', function () {
      $('#sidebar').removeClass('active');
      $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse').on('click', function () {
     $('#sidebar').toggleClass('active');
   });
  });

  //Select 2 otro diseño  buscador en tiempo real
$('.sele').select2({
   theme:"bootstrap",
    allowClear: true,
     placeholder: "Seleccione...",
     tokenSeparators: [',', ' ']
});

 
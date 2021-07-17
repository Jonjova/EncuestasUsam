        </div>
        <!--agregar los div aqui termina contenido de la página  -->

    </div>
    <!--es nesesarios este div de la clase wrapper -->

<div class="overlay">
</div>
</body>
<!--tambien es necesario este div para overlay  -->

<!-- DATATABLES PAPA BUSQUEDA Y PAGINACION AL MOSTRAR LOS DATOS JS -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/idiomaDatatable.js"></script>

<!-- BOOTSTRAP WIZARD JS -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.bootstrap.wizard.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/gsdk-bootstrap-wizard.js"></script>

<!-- VALIDACION DE CAMPOS-->
<script  type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script  type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<!--LOGIN -->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Accesos/Login.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Accesos/ValidaLogin.js"></script>

<!-- CRUD AJAX COORDINADOR & DOCENTE -->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/CrudAjax/coordinador_docente_Crud.js"></script>

<!--CRUD PROYECTO-->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Proyecto/ValidaProyecto.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Proyecto/CrudProyecto.js"></script>

<!-- ALERTAS JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/sweetalert2.js"></script>	

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!--custom-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>


<!--Importante base_url() es un complementa a la url que hagamos en ajax -->	
<script type="text/javascript">
	var url = '<?php echo base_url();?>';
	
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
</script>

</html>
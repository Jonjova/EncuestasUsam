<!-- DATATABLES PAPA BUSQUEDA Y PAGINACION AL MOSTRAR LOS DATOS JS -->
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
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

<!-- CRUD AJAX COORDINADOR -->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/CrudAjax/coordinadorCrud.js"></script>

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
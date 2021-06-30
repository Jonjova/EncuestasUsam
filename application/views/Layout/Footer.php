
<!--dataTables para búsqueda y paginación al mostrar los datos -->
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/idiomaDatatable.js"></script>

<!--Validación de campos-->
<script  type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script  type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<!--Logear -->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Accesos/Login.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Accesos/ValidaLogin.js"></script>

<!--Recursos Diseño y alertas -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" ></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/sweetalert2.js"></script>	

<!--Chart -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!--Importante base_url() es un complementa a la url que hagamos en ajax -->	
<script type="text/javascript">
	var url = '<?php echo base_url();?>';
	
	$(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
</script>

</html>
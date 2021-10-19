        </div>
        <!--agregar los div aqui termina contenido de la página  -->

    </div>
    <!--es nesesarios este div de la clase wrapper -->

    <div class="overlay">
    </div>
</body>
<!--tambien es necesario este div para overlay  -->

<!-- DATATABLES PAPA BUSQUEDA Y PAGINACION AL MOSTRAR LOS DATOS JS -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/idiomaDatatable.js"></script>

<!-- BOOTSTRAP WIZARD JS -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.bootstrap.wizard.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/gsdk-bootstrap-wizard.js"></script>

<!-- VALIDACION DE CAMPOS-->
<script  type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script  type="text/javascript" src="<?php echo base_url();?>assets/js/additional-methods.min.js"></script>

<!--LOGIN -->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Accesos/Login.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Accesos/ValidaLogin.js"></script>

<!-- DATOS Y VALIDACIONES -->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/DatosValidaciones/DatosValidaciones.js"></script>
<!-- CRUD COORDINADOR -->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Coordinador/CrudCoordinador.js"></script>
<!-- CRUD DOCENTE -->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Docente/CrudDocente.js"></script>
<!-- CRUD MATERIA -->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Materia/CrudMateria.js"></script>

<!--CRUD PROYECTO-->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Proyecto/ValidaProyecto.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Proyecto/CrudProyecto.js"></script>

<!--CRUD GRUPO ALUMNO-->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/GrupoAlumno/CrudGrupoAlumno.js"></script>

<!--CRUD ALUMNO-->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Alumno/crudAlumno.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Alumno/ValidaAlumno.js"></script>

<!--CRUD PERMISOS-->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Permisos/crudPermisos.js"></script>


<!-- ALERTAS JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/sweetalert2.js"></script> 

<!--Select2 y bootstrap-select -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-select.js');?>"></script>

<!-- CHART JS -->
<script src="<?php echo base_url();?>assets/js/chart.js"></script>

<!--custom-->
<script src="<?php echo base_url();?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

<!--sidebar-->
<script type="text/javascript" src="<?php echo base_url('assets/js/sidebar.js');?>"></script>

<!--Importante base_url() es un complementa a la url que hagamos en ajax -->    
<script type="text/javascript">
	var url = '<?php echo base_url();?>';
</script>
<!--Progreso -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/formeter.js"></script>


</html>
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

<!-- ALERTAS JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/sweetalert2.js"></script> 

<!--Select2 -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-select.js');?>"></script>

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!--custom-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<!--sidebar-->
<script type="text/javascript" src="<?php echo base_url('assets/js/sidebar.js');?>"></script>

<!--Importante base_url() es un complementa a la url que hagamos en ajax -->    
<script type="text/javascript">
    var url = '<?php echo base_url();?>';
</script>

</html>
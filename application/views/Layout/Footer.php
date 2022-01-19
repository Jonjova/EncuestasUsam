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
<script type="text/javascript" src="<?php echo base_url();?>assets/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/vfs_fonts.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/buttons.print.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/idiomaDatatable.js"></script>

<!--Importante base_url() es un complementa a la url que hagamos en ajax -->    
<script type="text/javascript">
	var url = '<?php echo base_url();?>',
        cod_coordinador = '<?php echo  $this->session->userdata('COORDINADOR');?>',
        cod_docente = '<?php echo $this->session->userdata('DOCENTE');?>';
    if (cod_coordinador == "") {
        cod_coordinador = 0;
    }
    if (cod_docente == "") {
        cod_docente = 0;
    }
</script>

<!-- ALERTAS JS -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/popper.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/sweetalert2.js"></script> 

<!--Select2 y bootstrap-select -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-select.js"></script>

<!-- CHART JS -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/chart.js"></script>

<!--custom-->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

<!--sidebar-->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/sidebar.js"></script>

<!--Progreso -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/formeter.js"></script>

<!-- VALIDACION DE CAMPOS-->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/additional-methods.min.js"></script>

<!-- BOOTSTRAP WIZARD JS -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.bootstrap.wizard.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/gsdk-bootstrap-wizard.js"></script>

<!--LOGIN -->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Accesos/Login.js"></script>

<!-- DATOS Y VALIDACIONES -->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/DatosValidaciones/DatosValidaciones.js"></script>

<!-- CRUD PROFESIONES -->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Profesion/CrudProfesion.js"></script>

<!--GESTION USUARIOS-->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Usuario/GestionUsuarios.js"></script>

<!-- CRUD COORDINADOR -->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Coordinador/CrudCoordinador.js"></script>

<!-- CRUD DOCENTE -->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Docente/CrudDocente.js"></script>

<!-- DATOS CUENTA -->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Cuenta/DatosCuenta.js"></script>

<!-- CRUD ASIGNATURA -->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Asignatura/CrudAsignatura.js"></script>

<!-- CRUD CICLO -->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Ciclo/crudCiclo.js"></script>

<!--CRUD PROYECTO-->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Proyecto/CrudProyecto.js"></script>

<!--Filtro PROYECTO-->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Proyecto/filtroReporte.js"></script>

<!--CRUD GRUPO ALUMNO-->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/GrupoAlumno/CrudGrupoAlumno.js"></script>

<!--CRUD ALUMNO-->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Alumno/crudAlumno.js"></script>

<!--CRUD PERMISOS-->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Permisos/crudPermisos.js"></script>

<!--GESTION BITACORA-->
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/Bitacora/GestionBitacora.js"></script>

<!--Mensaje de error-->
<?php if($this->session->flashdata('msjerror') != null): ?>
<script type="text/javascript">
    var msjerror = "$this->session->flashdata('msjerror')";
    Swal.fire({
        icon: 'error',
        allowEscapeKey: false,
        allowOutsideClick: false,
        confirmButtonColor: "#343a40",
        title: '<p style="color: #343a40; font-size: 1.04em; font-weight: 600; line-height: unset; margin: 0;">' + '<?php echo  $this->session->flashdata('msjerror')?>' + '</p>'
    });
</script>
<?php endif; ?>

</html>
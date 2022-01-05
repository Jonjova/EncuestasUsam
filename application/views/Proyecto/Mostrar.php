<h2>Registro de Proyecto</h2><br>
		<!--Aquí se listan las Cliente.-->

		<?php if($this->session->userdata('ID_TIPO_USUARIO') == 1 || $this->session->userdata('ID_TIPO_USUARIO') == 5):

			require 'application/config/database.php';		

			$sql = "SELECT * FROM vw_asignatura_asignada;";
			$resultado = $mysqli->query($sql);

			$sql_c = "SELECT * FROM vw_coordinador_facultad";
			$resultado_c = $mysqli->query($sql_c);

			$sql_f = "SELECT * FROM vw_facultad";
			$resultado_f = $mysqli->query($sql_f);
		?>

    <div class="row">
    <div class="col-sm-4">
	<label>Filtrar Información</label>
	<select name="select" id="Selectfiltro" class="custom-select" required="required">
					<option value="1">Filtrar Asignatura</option>
					<option value="2">Filtrar Coordinador</option>
					<option value="3">Filtrar Facultad</option>
	</select>
	</div>
	<br />
	<div class="col-sm-8">
	<div id="asig">
		<form action="<?php echo base_url();?>Reportes/reporte" method="post" autocomplete="off">
		<label>Asignatura: </label>
		<select class="custom-select" id="asignaturaR" name="asignaturaR" required="required"> 
            <option value="">Selecciona una opción</option>
            <?php while ($fila = $resultado->fetch_assoc()) { ?>
                <option value="<?php echo $fila['id_asignatura']; ?>"><?php echo $fila['nombre_asignatura']; ?></option>
            <?php } ?>
        </select>
		<br /><br />
		<button type="submit" class="btn btn-info"><i class="fas fa-file-pdf"></i> Reporte Asignatura</button>
    	</form>
	</div>

	<div id="coord">
		<form action="<?php echo base_url();?>Reportes/reporteC" method="post" autocomplete="off">		
		<label>Coordinador: </label>
		<select class="custom-select" id="coordinadorR" name="coordinadorR" required="required">
            <option value="">Selecciona una opción</option>
            <?php while ($fila = $resultado_c->fetch_assoc()) { ?>
                <option value="<?php echo $fila['coordinador']; ?>"><?php echo $fila['n_coordinador']; ?></option>
            <?php } ?>
        </select>
		<br /><br />		
		<button type="submit" class="btn btn-info"><i class="fas fa-file-pdf"></i> Reporte Coordinador</button>
    	</form>
	</div>

	<div id="fac">
		<form action="<?php echo base_url();?>Reportes/reporteF" method="post" autocomplete="off">		
		<label>Facultad: </label>
		<select class="custom-select" id="facultadR" name="facultadR" required="required">
            <option value="">Selecciona una opción</option>
            <?php while ($fila = $resultado_f->fetch_assoc()) { ?>
                <option value="<?php echo $fila['id_facultad']; ?>"><?php echo $fila['nombre_facultad']; ?></option>
            <?php } ?>
        </select>
		<br /><br />				
		<button type="submit" class="btn btn-info"><i class="fas fa-file-pdf"></i> Reporte Facultad</button>
    	</form>
	</div>
	</div>
	</div>
        <br />

        <a class="btn btn-danger" href="<?php echo base_url();?>Reportes/reportes"><i class="fas fa-file-pdf"></i></a>
		<?php endif; ?>
		<br>		
			<table id="Proyecto"  class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead class="thead-dark">
					<tr>
						<th>Id</th>
						<th>Nombre Proyecto </th>
						<th>Descripción</th>
						<th>Tipo de investigación</th>
						<th>Asignatura</th>
						<th>Diseño</th>
						<th>Fecha Asignación</th>
						<th>Alumnos</th>
						<th>Cod Ciclo</th>
						<th>Estado</th>		
					</tr>
				</thead>

			</table>
		
		<!--Aqui termina la lista de tabla de Cliente-->

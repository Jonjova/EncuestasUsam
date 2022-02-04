			<h2>Proyectos Registrados</h2><br>

			<?php 
				require 'application/config/database.php';		

				$sql = "SELECT * FROM VW_ASIGNATURA_ASIGNADA;";
				$resultado = $mysqli->query($sql);

				$sql_c = "SELECT * FROM VW_COORDINADOR_FACULTAD;";
				$resultado_c = $mysqli->query($sql_c);

				$sql_f = "SELECT * FROM VW_FACULTAD;";
				$resultado_f = $mysqli->query($sql_f);

				$sql_ci = "SELECT * FROM TBL_CICLO;";
				$resultado_ci = $mysqli->query($sql_ci);
			?>

			<div class="row">
			    <?php if($this->session->userdata('ID_TIPO_USUARIO') != 3 && $this->session->userdata('ID_TIPO_USUARIO') != 4):?>
			    <div class="col-sm-4">
			        <label>Filtrar Información</label>
			        <select name="select" id="Selectfiltro" class="custom-select" required="required">
			            <option value="1">Filtrar Asignatura</option>
			            <option value="2">Filtrar Coordinador</option>
			            <option value="3">Filtrar Facultad</option>
			        </select>
			        <br /><br />
			    </div>
			    <?php else: ?>
			    <input type="text" readonly value="Filtrar Información"
			        style="text-align:center; font-size: 30px; background: #fff; border: none; outline: none; width: 350px;">
			    <?php endif; ?>

			    <div class="col-sm-4">
			        <div id="asig">
			            <form action="<?php echo base_url();?>Reportes/reporte" method="post" autocomplete="off">
			                <?php if($this->session->userdata('ID_TIPO_USUARIO') == 3 || $this->session->userdata('ID_TIPO_USUARIO') == 4):?>
			                    <label>Asignatura: </label>
			                    <select name="asignaturaR" id="ASIGNATURA_PROY" class="custom-select" style="font-size: 1rem;">
			                    </select>
			                    <br /><br />
			                    <label>Ciclo: </label>
			                    <select name="cicloR" id="CICLO_PROY" class="custom-select" style="font-size: 1rem;" required>
			                    </select>
			                    <br /><br />
			                    <button type="submit" class="btn btn-info"><i class="fas fa-file-pdf"></i> Reporte
			                        Asignatura</button>
			                    <br /><br />
			                <?php endif; ?>

			                <?php if($this->session->userdata('ID_TIPO_USUARIO') != 3 && $this->session->userdata('ID_TIPO_USUARIO') != 4):?>
			                <label>Asignatura: </label>
			                <select class="custom-select" id="asignaturaR" name="asignaturaR" required="required">
			                    <option value="0">Todas</option>
			                    <?php while ($fila = $resultado->fetch_assoc()) { ?>
			                    <option value="<?php echo $fila['ID_ASIGNATURA']; ?>">
			                        <?php echo $fila['NOMBRE_ASIGNATURA']; ?>
			                    </option>
			                    <?php } ?>
			                </select>

			                <br /><br />
			                <label>Ciclo: </label>
			                <select class="custom-select" id="cicloR" name="cicloR" required>
			                    <option value="0">Todos</option>
			                    <?php while ($fila = $resultado_ci->fetch_assoc()) { ?>
			                    <option value="<?php echo $fila['ID_CICLO']; ?>"><?php echo $fila['COD_CICLO']; ?>
			                    </option>
			                    <?php } ?>
			                </select>
			                <br /><br />
			                <button type="submit" class="btn btn-info"><i class="fas fa-file-pdf"></i> Reporte
			                    Asignatura</button>
			                <?php endif; ?>
			            </form>
			        </div>

			        <?php if($this->session->userdata('ID_TIPO_USUARIO') != 3 && $this->session->userdata('ID_TIPO_USUARIO') != 4):?>
			        <div id="coord">
			            <form action="<?php echo base_url();?>Reportes/reporteC" method="post" autocomplete="off">
			                <label>Coordinador: </label>
			                <select class="custom-select" id="coordinadorR" name="coordinadorR" required="required">
			                    <option value="0">Todos</option>
			                    <?php while ($fila = $resultado_c->fetch_assoc()) { ?>
			                    <option value="<?php echo $fila['COORDINADOR']; ?>"><?php echo $fila['N_COORDINADOR']; ?>
			                    </option>
			                    <?php } ?>
			                </select>
			                <br /><br />
			                <button type="submit" class="btn btn-info"><i class="fas fa-file-pdf"></i> Reporte
			                    Coordinador</button>
			            </form>
			        </div>

			        <div id="fac">
			            <form action="<?php echo base_url();?>Reportes/reporteF" method="post" autocomplete="off">
			                <label>Facultad: </label>
			                <select class="custom-select" id="facultadR" name="facultadR" required="required">
			                    <option value="0">Todas</option>
			                    <?php while ($fila = $resultado_f->fetch_assoc()) { ?>
			                    <option value="<?php echo $fila['ID_FACULTAD']; ?>"><?php echo $fila['NOMBRE_FACULTAD']; ?>
			                    </option>
			                    <?php } ?>
			                </select>
			                <br /><br />
			                <button type="submit" class="btn btn-info"><i class="fas fa-file-pdf"></i> Reporte
			                    Facultad</button>
			            </form>
			        </div>
			        <?php endif; ?>

			    </div>
			</div>

			<?php if($this->session->userdata('ID_TIPO_USUARIO') == 4): ?>
			<br>
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAlumno" id="btnAlumno">
				<i class="fas fa-plus-circle"></i> Agregar Estudiante
			</button>
			<?php endif ?>

			<br />

			<?php if($this->session->userdata('ID_TIPO_USUARIO') != 3 && $this->session->userdata('ID_TIPO_USUARIO') != 4): ?>
			<a class="btn btn-danger" href="<?php echo base_url();?>Reportes/reportes" target="_blank">
			    <i class="fas fa-file-pdf"></i> Reporte General</a>
			<?php endif ?>

			<br><br />

			<table id="Proyecto" class="table table-hover table-striped dt-responsive nowrap" style="width:100%;">
			    <thead style="background-color: #094f8b; color: #fff; font-size: 17px;">
			        <tr>
			            <th>Tema</th>
						<th>Descripción</th>
			            <th>Investigación</th>
						<th>Diseño</th>
			            <th>Asignatura</th>
						<?php if($this->session->userdata('ID_TIPO_USUARIO') != 4): ?>
						<th>Docente</th>
						<?php endif ?>
			            <th>Alumnos</th>
			            <th>Estado</th>
			            <th>Ciclo</th>
			            <th>Fecha Asignación</th>
			        </tr>
			    </thead>
			</table>
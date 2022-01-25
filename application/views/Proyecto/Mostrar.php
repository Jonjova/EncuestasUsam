			<div id="carga" class="double" style="display: none;">
			    <div class="double-bounce1"></div>
			    <div class="double-bounce2"></div>
			</div>

			<div id="contenido" style="display: none">
			    <h2>Proyectos Registrados</h2><br>
			    <!--<?php if($this->session->userdata('ID_TIPO_USUARIO') == 3 || $this->session->userdata('ID_TIPO_USUARIO') == 4): ?>
			<div class="row">
			    <div class="col-sm-4">
			        <div class="form-group">
			            <label>Filtrar por Asignatura:</label>
			            <select name="ASIGNATURA_PROY" id="ASIGNATURA_PROY" class="custom-select"
			                style="font-size: 1rem;">
			            </select>
			        </div>
			    </div>
				<div class="col-sm-4">
			        <div class="form-group">
			            <label>Filtrar por Ciclo:</label>
			            <select name="CICLO_PROY" id="CICLO_PROY" class="custom-select"
			                style="font-size: 1rem;">
			            </select>
			        </div>
			    </div>
			</div>
			<?php endif ?>-->

			<?php 
				require 'application/config/database.php';		

				$sql = "SELECT * FROM vw_asignatura_asignada;";
				$resultado = $mysqli->query($sql);

				$sql_c = "SELECT * FROM vw_coordinador_facultad";
				$resultado_c = $mysqli->query($sql_c);

				$sql_f = "SELECT * FROM vw_facultad";
				$resultado_f = $mysqli->query($sql_f);

				$sql_ci = "SELECT id_ciclo, cod_ciclo FROM encuestasusam.tbl_ciclo;";
				$resultado_ci = $mysqli->query($sql_ci);
			?>
			    <!-- begin dots modal -->


			    <div class="row">
			        <div class="col-sm-4">
			            <label>Filtrar Información</label>
			            <select name="select" id="Selectfiltro" class="custom-select" required="required">
			                <option value="1">Filtrar Asignatura</option>
			                <?php if($this->session->userdata('ID_TIPO_USUARIO') != 3 && $this->session->userdata('ID_TIPO_USUARIO') != 4):?>
			                <option value="2">Filtrar Coordinador</option>
			                <option value="3">Filtrar Facultad</option>
			                <?php endif; ?>
			                <!-- <option value="4">Filtrar Ciclo</option> -->
			            </select>
			        </div>
			        <br />
			        <div class="col-sm-4">
			            <div id="asig">
			                <form action="<?php echo base_url();?>Reportes/reporte" method="post" autocomplete="off">
			                    <label>Asignatura: </label>
			                    <?php if($this->session->userdata('ID_TIPO_USUARIO') == 3 || $this->session->userdata('ID_TIPO_USUARIO') == 4):?>
			                    <select name="asignaturaR" id="ASIGNATURA_PROY" class="custom-select" style="font-size: 1rem;">
			                    </select>

								</select>
								<label>Ciclo: </label>
								<select name="cicloR" id="CICLO_PROY" class="custom-select" style="font-size: 1rem;" required>
			               		</select>
			                    <?php endif; ?>
			                    <?php if($this->session->userdata('ID_TIPO_USUARIO') != 3 && $this->session->userdata('ID_TIPO_USUARIO') != 4):?>
			                    <select class="custom-select" id="asignaturaR" name="asignaturaR" required="required">
			                        <option value="0">Selecciona una opción</option>
			                        <?php while ($fila = $resultado->fetch_assoc()) { ?>
			                        <option value="<?php echo $fila['id_asignatura']; ?>">
			                            <?php echo $fila['nombre_asignatura']; ?>
			                        </option>
			                        <?php } ?>
			                    </select>
								<br/><br/>
							<label>Ciclo: </label>
			                <select class="custom-select" id="cicloR" name="cicloR" required>
			                    <option value="0">Selecciona una opción</option>
			                    <?php while ($fila = $resultado_ci->fetch_assoc()) { ?>
			                    <option value="<?php echo $fila['id_ciclo']; ?>"><?php echo $fila['cod_ciclo']; ?>
			                    </option>
			                    <?php } ?>
			                </select>
			                    <?php endif; ?>
			                    <br /><br />
			                    <button type="submit" class="btn btn-info"><i class="fas fa-file-pdf"></i> Reporte
			                        Asignatura</button>
			                </form>
			            </div>

			            <div id="coord">
			                <form action="<?php echo base_url();?>Reportes/reporteC" method="post" autocomplete="off">
			                    <label>Coordinador: </label>
			                    <select class="custom-select" id="coordinadorR" name="coordinadorR" required="required">
			                        <option value="0">Selecciona una opción</option>
			                        <?php while ($fila = $resultado_c->fetch_assoc()) { ?>
			                        <option value="<?php echo $fila['coordinador']; ?>"><?php echo $fila['n_coordinador']; ?>
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
			                        <option value="0">Selecciona una opción</option>
			                        <?php while ($fila = $resultado_f->fetch_assoc()) { ?>
			                        <option value="<?php echo $fila['id_facultad']; ?>"><?php echo $fila['nombre_facultad']; ?>
			                        </option>
			                        <?php } ?>
			                    </select>
			                    <br /><br />
			                    <button type="submit" class="btn btn-info"><i class="fas fa-file-pdf"></i> Reporte
			                        Facultad</button>
			                </form>
			            </div>
<!-- 
			            <div id="cic">
			                <form action="<?php echo base_url();?>Reportes/reporteCI" method="post" autocomplete="off">
			                    <label>Ciclo: </label>
			                    <select class="custom-select" id="cicloR" name="cicloR" required="required">
			                        <option value="0">Selecciona una opción</option>
			                        <?php while ($fila = $resultado_ci->fetch_assoc()) { ?>
			                        <option value="<?php echo $fila['id_ciclo']; ?>"><?php echo $fila['cod_ciclo']; ?>
			                        </option>
			                        <?php } ?>
			                    </select>
			                    <br /><br />
			                    <button type="submit" class="btn btn-info"><i class="fas fa-file-pdf"></i> Reporte Ciclo</button>
			                </form>
			            </div> -->

			        </div>
			    </div>
			    <?php if($this->session->userdata('ID_TIPO_USUARIO') == 4): ?>
			    <label>Agregar Estudiante</label><br>
			    <button type="button" class="btn btn-success " data-toggle="modal" data-target="#modalAlumno"><i
			            class="fas fa-plus-circle"></i>
			    </button>
			    <?php endif ?>
			</div>
			<br />

			<?php if($this->session->userdata('ID_TIPO_USUARIO') != 3 && $this->session->userdata('ID_TIPO_USUARIO') != 4): ?>
			<a class="btn btn-danger" href="<?php echo base_url();?>Reportes/reportes">
			    <i class="fas fa-file-pdf"></i></a>
			<?php endif ?>

			<br>

			<table id="Proyecto" class=" table-loader table table-hover table-striped dt-responsive nowrap" style="width:100%;">
			    <thead style="background-color: #094f8b; color: #fff; font-size: 17px;">
			        <tr>
			            <th>Nombre Proyecto </th>
			            <th>Tipo de investigación</th>
			            <th>Asignatura</th>
			            <th>Diseño</th>
			            <th>Alumnos</th>
			            <th>Estado</th>
			            <th>Cod Ciclo</th>
			            <th>Descripción</th>
			            <th>Fecha Asignación</th>
			        </tr>
			    </thead>
			</table>
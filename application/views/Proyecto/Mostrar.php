	
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
			            <option value="4">Filtrar Ciclo</option>
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
			                <?php endif; ?>
			                <?php if($this->session->userdata('ID_TIPO_USUARIO') != 3 && $this->session->userdata('ID_TIPO_USUARIO') != 4):?>
			                <select class="custom-select" id="asignaturaR" name="asignaturaR" required="required">
			                    <option value="0">Selecciona una opción</option>
			                    <?php while ($fila = $resultado->fetch_assoc()) { ?>
			                    <option value="<?php echo $fila['id_asignatura']; ?>"><?php echo $fila['nombre_asignatura']; ?>
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
			                <button type="submit" class="btn btn-info"><i class="fas fa-file-pdf"></i> Reporte Facultad</button>
			            </form>
			        </div>

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
			        </div>

			    </div>
			</div>

			</div>
			<br />

			<?php if($this->session->userdata('ID_TIPO_USUARIO') != 3 && $this->session->userdata('ID_TIPO_USUARIO') != 4): ?>
			<a class="btn btn-danger" href="<?php echo base_url();?>Reportes/reportes">
			    <i class="fas fa-file-pdf"></i></a>
			<?php endif ?>

			<br>

			<table id="Proyecto" class=" table-loader table table-hover table-striped dt-responsive nowrap" style="width:100%;"  >
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

			<form id="createForm">
			    <div class="modal fade" id="createModal" data-backdrop="static" aria-hidden="true">
			        <div class="modal-dialog" role="document">
			            <div class="modal-content">
			                <div class="modal-header">
			                    <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Grupo de Alumno</h5>
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                        <span aria-hidden="true" onclick="limpiar2();">&times;</span>
			                    </button>
			                </div>
			                <div class="modal-body">
			                    <div class="form-group">
			                        <label>Nombre de Grupo</label>
			                        <input type="text" placeholder="Ingrese nuevo grupo" id="NOMBRE_GRUPO" name="NOMBRE_GRUPO"
			                            class="form-control mb-2 mr-sm-2 " required>
			                    </div>

			                    <input type="hidden" name="ID_ASIGNATURA_G" id="ID_ASIGNATURA_G">
			                    <input type="hidden" name="CICLO_G" id="CICLO_G">

			                    <div class="form-group">
			                        <label>Alumno</label>
			                        <select name="ID_ALUMNO_GA[]" id="ID_ALUMNO_GA" title="Selecciona.."
			                            onblur="validaSelect(this);" data-live-search="true"
			                            class="bootstrap-select strings show-tick " multiple data-width="100%" required>
			                        </select>
			                    </div>
			                </div>
			                <div class="modal-footer">
			                    <button type="button" class="btn btn-secondary pull-left btn-sm" onclick="limpiar2();"
			                        data-dismiss="modal">Cerrar</button>
			                    <button type="submit" class="btn btn-success btn-sm" id="btnLimpiar">Guardar</button>
			                </div>
			            </div>
			        </div>
			    </div>
			</form>
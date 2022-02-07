<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos extends CI_Controller
{
	//private $permisos;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProyectoModel', 'pm', true);
		$this->load->model('GrupoAlumnoModel', 'gam', true);
	}

	public function proyecto()
	{
		if ($this->session->userdata('is_logged') && $this->session->userdata('ID_TIPO_USUARIO') == 4)
		{
			$data = array('title' => 'USAM - Nuevo Proyecto' );
			//header
			$this->load->view('Layout/Header', $data);
			//Body
			$this->load->view('Layout/Sidebar');
			$this->load->view('Proyecto/insertar');
			$this->load->view('GrupoAlumno/insertar');
		    //Footer
			$this->load->view('Layout/Footer');
		}
		else
		{
			$this->session->set_flashdata('msjerror', 'Usted no se ha identificado.');
			redirect('/Accesos/');
			show_404();
		}
	}

	public function proyectos()
	{
		if ($this->session->userdata('is_logged'))
		{

			$data = array('title' => 'USAM - Proyectos' );
			//header
			$this->load->view('Layout/Header', $data);
			//Body
			$this->load->view('Layout/Sidebar');
			$this->load->view('Proyecto/Mostrar');
			$this->load->view('Alumno/insertarAlumno');
			$this->load->view('Alumno/MostrarGrupoAlumno');
			$this->load->view('Proyecto/actualizarProyecto');
		 	//Footer
			$this->load->view('Layout/Footer');
		}
		else
		{
			$this->session->set_flashdata('msjerror', 'Usted no se ha identificado.');
			redirect('/Accesos/');
			show_404();
		}
	}

	// INFORMACION GRUPO
	public function datosInfoGrupo($proyecto)
	{
		$resultData = $this->pm->datosGrupoAlumnoModel(array('ID_PROYECTO' => $proyecto));
		echo json_encode($resultData);
	}

	// MOSTRAR PROYECTOS
	public function MostrarProyecto($asignatura, $ciclo, $coordinador, $facultad)
	{
		$resultList = $this->pm->mostrarProyect($asignatura, $ciclo, $coordinador, $_SESSION['DOCENTE'], $_SESSION['ID_TIPO_USUARIO'], $facultad);

		$result = array();
		if (!empty($resultList))
		{
			$var = 0;
			foreach ($resultList as $key => $value)
			{
				$btnUpdate = 
					'<a class="btn btn-dark" style="font-size: x-large;" onclick="obtenerProyecto('.$value['ID_PROYECTO'].');" 
						data-toggle="modal" data-target="#modalProyecto">
						<i class="fas fa-pen" title="Actualizar"></i>
					</a>';
				switch ($value['ESTADO_PROYECTO'])
				{
					case "Iniciado":
						$estado = '<a class="btn btn-info" title="Estado">'.$value['ESTADO_PROYECTO'].'</a>';
						$selectEstado = '<select name="ESTADO_PROY" onchange="cambiarEstadoProyecto('.$value['ID_PROYECTO'].', this.value);" 
									class="custom-select" style="width: 160px;">
									<option value="Iniciado">Iniciado</option>
									<option value="En proceso">En proceso</option>
									<option value="Finalizado">Finalizado</option>
									<option value="Incompleto">Incompleto</option>
									<option value="No entregado">No entregado</option>
								</select>';
						break;
					case "En proceso":
						$estado = '<a class="btn btn-warning" title="Estado">'.$value['ESTADO_PROYECTO'].'</a>';
						$selectEstado = '<select name="ESTADO_PROY" onchange="cambiarEstadoProyecto('.$value['ID_PROYECTO'].', this.value);" 
									class="custom-select" style="width: 160px;">
									<option value="En proceso">En proceso</option>
									<option value="Finalizado">Finalizado</option>
									<option value="Incompleto">Incompleto</option>
									<option value="No entregado">No entregado</option>
								</select>';
						break;
					case "Finalizado":
						$estado = '<a class="btn btn-success" title="Estado">'.$value['ESTADO_PROYECTO'].'</a>';
						$selectEstado = '<select name="ESTADO_PROY" onchange="cambiarEstadoProyecto('.$value['ID_PROYECTO'].', this.value);" 
								class="custom-select" style="width: 160px;">
									<option value="Finalizado">Finalizado</option>
								</select>';
						$btnUpdate = 
							'<a class="btn btn-danger" style="font-size: x-large;">
								<i class="fas fa-pen" title="Actualizar"></i> <i class="fas fa-times" title="Actualizar"></i>
							</a>';
						break;
					case "Incompleto":
						$estado = '<a class="btn btn-dark" title="Estado">'.$value['ESTADO_PROYECTO'].'</a>';
						$selectEstado = '<select name="ESTADO_PROY" onchange="cambiarEstadoProyecto('.$value['ID_PROYECTO'].', this.value);" 
								class="custom-select" style="width: 160px;">
									<option value="Incompleto">Incompleto</option>
								</select>';
						$btnUpdate = 
							'<a class="btn btn-danger" style="font-size: x-large;">
								<i class="fas fa-pen" title="Actualizar"></i> <i class="fas fa-times" title="Actualizar"></i>
							</a>';
						break;
					case "No entregado":
						$estado = '<a class="btn btn-danger" title="Estado">'.$value['ESTADO_PROYECTO'].'</a>';
						$selectEstado = '<select name="ESTADO_PROY" onchange="cambiarEstadoProyecto('.$value['ID_PROYECTO'].', this.value);" 
								class="custom-select" style="width: 160px;">
									<option value="No entregado">No entregado</option>
								</select>';
						$btnUpdate = 
							'<a class="btn btn-danger" style="font-size: x-large;">
								<i class="fas fa-pen" title="Actualizar"></i> <i class="fas fa-times" title="Actualizar"></i>
							</a>';
						break;
				}
				
				$btnInfo = '<a data-backdrop="static" class="btn btn-secondary" 
							style="font-size: x-large;" onclick="infoGrupo('.$value['ID_PROYECTO'].');">
							<i class="fas fa-info-circle"></i>
						</a>';
				$heightN = strlen($value['NOMBRE_PROYECTO']);
				$heightD = strlen($value['DESCRIPCION']);
				$nombreProy = '<textarea class="txt-tbl" style="height: '.($heightN + 28).'px;" readonly>'.$value['NOMBRE_PROYECTO'].'.</textarea>';
				$descProy = '<textarea class="txt-tbl" style="height: '.($heightD + 28).'px;" readonly>'.$value['DESCRIPCION'].'.</textarea>';

				if ($heightN < 25)
				{
					$nombreProy = $value['NOMBRE_PROYECTO'];
				}
				if ($heightD < 25)
				{
					$descProy = $value['DESCRIPCION'];
				}
				if ($_SESSION['ID_TIPO_USUARIO'] != 4)
				{
					$result['data'][] = array(
						$nombreProy,
						$descProy,
						$value['NOMBRE_TIPO_INVESTIGACION'],
						$value['NOMBRE_DISENIO'],
						$value['NOMBRE_ASIGNATURA'],
						$value['DOCENTE'],
						// $value['NOMBRE_GRUPO'].'<br><br>'.
						$value['Alumnos']. ' Integrantes &nbsp;'.
						$btnInfo,
						$estado,
						$value['COD_CICLO'],
						$value['FECHA_ASIGNACION']
						);
				}
				else
				{
					$result['data'][] = array(
						$nombreProy,
						$descProy,
						$value['NOMBRE_TIPO_INVESTIGACION'],
						$value['NOMBRE_DISENIO'],
						$value['NOMBRE_ASIGNATURA'],
						// $value['NOMBRE_GRUPO'].'<br><br>'.
						$value['Alumnos']. ' Integrantes &nbsp;'.
						$btnInfo,
						$selectEstado,
						$value['COD_CICLO'],
						$value['FECHA_ASIGNACION'],
						$btnUpdate
						);
				}
			}
		}
		else
		{
			$result['data'] = array();
		}
		echo json_encode($result);
	}

	// GUARDAR PROYECTO
	public function Guardar()
	{
		date_default_timezone_set("America/El_Salvador"); // ZONA HORARIA
		$datos = array(
			'NOMBRE_PROYECTO' => $this->input->post('NOMBRE_PROYECTO'),
			'DESCRIPCION' => $this->input->post('DESCRIPCION'),
			'ID_TIPO_INVESTIGACION' => $this->input->post('ID_TIPO_INVESTIGACION'),
			'ID_ASIGNATURA' => $this->input->post('ID_ASIGNATURA'),
			'ID_DISENIO_INVESTIGACION' => $this->input->post('ID_DISENIO_INVESTIGACION'),
			'FECHA_ASIGNACION' => date('Y-m-d H:i:s'),
			'ID_GRUPO_ALUMNO' => $this->input->post('ID_GRUPO_ALUMNO'),
			'CICLO' => $this->input->post('CICLO'),
			'ESTADO_PROYECTO' => "Iniciado",
			'USUARIO_CREA' => $this->session->userdata('ID_USUARIO'),
			'FECHA_CREA' => date('Y-m-d H:m:s')
			);

		$insert = $this->pm->insertProyecto($datos);
		if ($insert == TRUE )
		{
			echo "true";
		}
	}

	// OBTENER DATOS DE UN PROYECTO
	public function obtenerDatosProyecto($id){
		
		$resultado = $this->pm->idDatosProyecto(array('ID_PROYECTO' =>$id));
		echo json_encode($resultado);
	}

	// ACTUALIZAR PROYECTO
	public function Actualizar()
	{
		date_default_timezone_set("America/El_Salvador"); // ZONA HORARIA
		$whereProyecto = $this->input->post('ID_PROYECTO_UPDATE');
		$datosProyectos = array(
			'NOMBRE_PROYECTO' => $this->input->post('NOMBRE_PROYECTO_UPDATE'),
			'DESCRIPCION' => $this->input->post('DESCRIPCION_UPDATE'),
			'ID_TIPO_INVESTIGACION' => $this->input->post('ID_TIPO_INVESTIGACION_UPDATE'),
			'ID_ASIGNATURA' => $this->input->post('ID_ASIGNATURA_UPDATE'),
			'ID_DISENIO_INVESTIGACION' => $this->input->post('ID_DISENIO_INVESTIGACION_UPDATE'),
			'USUARIO_CREA' => $this->session->userdata('ID_USUARIO'),
			);

		 $actualizarProyecto = $this->pm->actualizarProyecto('TBL_PROYECTO', $datosProyectos, array('ID_PROYECTO' => $whereProyecto));
		
		if ($actualizarProyecto == TRUE)
		{
			echo json_encode('Datos actualizados!');
        }
        else
        {
            echo json_encode('Error al actualizar!');
		}
      
	}

	// CAMBIAR ESTADO
	public function cambiarEstado($where)
	{
		$estado = $this->input->post('ESTADO_PROY');
		$editar = $this->pm->cambiarEstadoModel('TBL_PROYECTO', array('ESTADO_PROYECTO' => $estado), array('ID_PROYECTO' => $where));
		if ($editar == TRUE)
		{
			echo "true";
		}
		else
		{
			echo "false";
		}
	}

}
?>
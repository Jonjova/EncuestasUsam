<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos extends CI_Controller
{
	//private $permisos;
	public function __construct()
	{
		parent::__construct();
		//$this->permisos = $this->backend_lib->controles();
		$this->load->model('ProyectoModel','pm',true);
		$this->load->model('GrupoAlumnoModel','gam',true);
	}

	public function index()
	{

		if($this->session->userdata('is_logged'))
		{
			$data = array('title' => 'Registro de Proyecto' );
			//$otro  = array('permisos' => $this->permisos );
			//header
			$this->load->view('Layout/Header',$data);
		//Body
			$this->load->view('Layout/Sidebar');
			$this->load->view('Proyecto/Mostrar');
			$this->load->view('Alumno/MostrarGrupoAlumno');
		 //Footer
			$this->load->view('Layout/Footer');
		}
		else
		{
			$this->session->set_flashdata('msjerror','Usted no se ha identificado.');
			redirect('/Accesos/');
			show_404();
		}
	}

	public function proyecto()
	{
		if($this->session->userdata('is_logged') && $this->session->userdata('ID_TIPO_USUARIO') == 4)
		{
			$data = array('title' => 'Proyecto' );
				//$otro  = array('permisos' => $this->permisos );
			//header
			$this->load->view('Layout/Header',$data);
			//Body
			$this->load->view('Layout/Sidebar');
			
			
			$this->load->view('Proyecto/insertar');
			$this->load->view('GrupoAlumno/insertar');
			$this->load->view('Alumno/insertarAlumno');

		    //Footer
			$this->load->view('Layout/Footer');
		}
		else
		{
			$this->session->set_flashdata('msjerror','Usted no se ha identificado.');
			redirect('/Accesos/');
			show_404();
		}
	}

	// INFORMACION COORDINADOR
	public function datosInfoGrupo($proyecto)
	{
		$resultData = $this->pm->datosGrupoAlumnoModel(array('ID_PROYECTO' => $proyecto));
		echo json_encode($resultData);
	}

	//Mostrar
	public function MostrarProyecto($asignatura, $ciclo, $coordinador, $facultad)
	{
		$resultList = $this->pm->mostrarProyect($asignatura, $ciclo, $coordinador, $_SESSION['DOCENTE'], $_SESSION['ID_TIPO_USUARIO'], $facultad);

		$result = array();
		// $i = 1;
		foreach ($resultList as $key => $value) {
			switch ($value['ESTADO_PROYECTO'])
			{
				case "Iniciado":
					$estado = '<a class="btn btn-info" title="Estado">'.$value['ESTADO_PROYECTO'].'</a>';
					$selectEstado = '<select name="ESTADO_PROY" onchange="cambiarEstadoProyecto('.$value['ID_PROYECTO'].', this.value);" 
								class="custom-select" style="width: auto;">
								<option value="Iniciado">Iniciado</option>
								<option value="En proceso">En Proceso</option>
								<option value="Finalizado">Finalizado</option>
								<option value="Incompleto">Incompleto</option>
								<option value="No entregado">No entregado</option>
							</select>';
					break;
				case "En proceso":
					$estado = '<a class="btn btn-warning" title="Estado">'.$value['ESTADO_PROYECTO'].'</a>';
					$selectEstado = '<select name="ESTADO_PROY" onchange="cambiarEstadoProyecto('.$value['ID_PROYECTO'].', this.value);" 
								class="custom-select" style="width: auto;">
								<option value="En proceso">En Proceso</option>
								<option value="Finalizado">Finalizado</option>
								<option value="Incompleto">Incompleto</option>
								<option value="No entregado">No entregado</option>
							</select>';
					break;
				case "Finalizado":
					$estado = '<a class="btn btn-success" title="Estado">'.$value['ESTADO_PROYECTO'].'</a>';
					$selectEstado = '<select name="ESTADO_PROY" onchange="cambiarEstadoProyecto('.$value['ID_PROYECTO'].', this.value);" 
							class="custom-select" style="width: auto;">
								<option value="Finalizado">Finalizado</option>
							</select>';
					break;
				case "Incompleto":
					$estado = '<a class="btn btn-dark" title="Estado">'.$value['ESTADO_PROYECTO'].'</a>';
					$selectEstado = '<select name="ESTADO_PROY" onchange="cambiarEstadoProyecto('.$value['ID_PROYECTO'].', this.value);" 
							class="custom-select" style="width: auto;">
								<option value="Incompleto">Incompleto</option>
							</select>';
					break;
				case "No entregado":
					$estado = '<a class="btn btn-danger" title="Estado">'.$value['ESTADO_PROYECTO'].'</a>';
					$selectEstado = '<select name="ESTADO_PROY" onchange="cambiarEstadoProyecto('.$value['ID_PROYECTO'].', this.value);" 
							class="custom-select" style="width: auto;">
								<option value="No entregado">No entregado</option>
							</select>';
					break;
			}
			
			$btnInfo = '<a data-backdrop="static" class="btn btn-secondary" 
							style="font-size: x-large;" onclick="infoGrupo('.$value['ID_PROYECTO'].', this.value);">
							<i class="fas fa-info-circle"></i>
						</a>';
			$ver = '<a onclick="infoGrupo('.$value['ID_PROYECTO'].', this.value)">
						<i class="far fa-eye"></i>
					</a> ';
			if ($_SESSION['ID_TIPO_USUARIO'] != 4)
			{
				$result['data'][] = array(
					// $i++,
					$value['NOMBRE_PROYECTO'],
					$value['NOMBRE_TIPO_INVESTIGACION'],
					$value['NOMBRE_ASIGNATURA'],
					$value['NOMBRE_DISENIO'],
					$value['Alumnos']. ' Integrantes &nbsp;'.
					$btnInfo,
					$estado,
					$value['COD_CICLO'],
					$value['DESCRIPCION'],
					$value['FECHA_ASIGNACION']
					);
			}
			else
			{
				$result['data'][] = array(
					// $i++,
					$value['NOMBRE_PROYECTO'],
					$value['NOMBRE_TIPO_INVESTIGACION'],
					$value['NOMBRE_ASIGNATURA'],
					$value['NOMBRE_DISENIO'],
					$value['Alumnos']. ' Integrantes &nbsp;'.
					$btnInfo,
					$selectEstado,
					$value['COD_CICLO'],
					$value['DESCRIPCION'],
					$value['FECHA_ASIGNACION']
					);
			}
			
		}
		echo json_encode($result);
	}

	//Guardar Proyecto
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

		//Datos de tabla  "Proyectos"
		$insert = $this->pm->insertProyecto($datos);
		if($insert == TRUE )
		{
			echo "true";
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
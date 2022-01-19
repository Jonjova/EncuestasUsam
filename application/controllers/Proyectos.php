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
	public function MostrarProyecto()
	{

		$resultList = $this->pm->mostrarProyect();

		$result = array();
		$estado = '';
		$i = 1;
		if (!empty($resultList)) {
			foreach ($resultList as $key => $value) {

				$estado = ($value['ESTADO_PROYECTO'] > 0) ? 'Activo' : 'Inactivo';
				$btnInfo = '<a data-backdrop="static" class="btn btn-secondary" style="font-size: x-large;" onclick="infoGrupo('.$value['ID_PROYECTO'].');" ><i class="fas fa-info-circle"></i></a>';
				$ver = '<a  onclick="infoGrupo('.$value['ID_PROYECTO'].')"  ><i class="far fa-eye"></i> </a> ';
				$result['data'][] = array(
					$i++,
					$value['NOMBRE_PROYECTO'],
					$value['DESCRIPCION'],
					$value['NOMBRE_TIPO_INVESTIGACION'],
					$value['NOMBRE_ASIGNATURA'],
					$value['NOMBRE_DISENIO'],
					$value['FECHA_ASIGNACION'],
					$value['Alumnos']. ' Integrantes &nbsp;'.
					$btnInfo,
					$value['COD_CICLO'],
					$estado
					);
			}
		}else{
			$result['data']= array();
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
			'ESTADO_PROYECTO' => true,
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
}
?>
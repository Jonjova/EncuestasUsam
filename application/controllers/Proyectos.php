<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProyectoModel','pm',true);
		$this->load->model('GrupoAlumnoModel','gam',true);
	}

	public function index()
	{

		if($this->session->userdata('is_logged')){
			
			$data = array('title' => 'Registro de Proyecto' );
			//header
			$this->load->view('Layout/Header',$data);
		//Body
			$this->load->view('Layout/Sidebar');
			$this->load->view('Proyecto/Mostrar');
		 //Footer
			$this->load->view('Layout/Footer');
		}
		else{
			$this->session->set_flashdata('msjerror','Usted no se ha identificado.');
			redirect('/Accesos/');
			show_404();
		}
	}

	public function proyecto(){
		if($this->session->userdata('is_logged')){
			$data = array('title' => 'Proyecto' );
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
		else{
			$this->session->set_flashdata('msjerror','Usted no se ha identificado.');
			redirect('/Accesos/');
			show_404();
		}
	}
	//Obteniendo Tipo de investigación
	public function obtTipoInvestigacion(){
		$datos = $this->pm->obtTI();
		echo "<option selected disabled value=''>Seleccionar...</option>";
		foreach ($datos as $ti) {
			echo "<option value='".$ti['ID_TIPO']."'>".$ti['NOMBRE_TIPO_INVESTIGACION']."</option>";
		}
	}
	//Obteniendo Materia
	public function obtMaterias(){
		$datos = $this->pm->obtM();
		echo "<option selected disabled value=''>Seleccionar...</option>";
		foreach ($datos as $m) {
			echo "<option value='".$m['ID_ASIGNATURA']."'>".$m['NOMBRE_ASIGNATURA']."</option>";
		}
	}

	//Obteniendo Diseño de investigación
	public function obtDisenioInvestigacion(){
		$datos = $this->pm->obtDI();
		echo "<option selected disabled value=''>Seleccionar...</option>";
		foreach ($datos as $di) {
			echo "<option value='".$di['ID_DISENIO']."'>".$di['NOMBRE_DISENIO']."</option>";
		}
	}
	//Obteniendo Grupo de alumno 
	public function obtGrupoAlumno(){
		$datos = $this->pm->obtGA();
		echo json_encode($datos);
	}
	//Obteniendo Ciclo
	public function obtCiclo(){
		$datos = $this->pm->obtC();
		echo "<option selected disabled value=''>Seleccionar Ciclo</option>";
		foreach ($datos as $c) {
			echo "<option value='".$c['ID_CICLO']."'>".$c['COD_CICLO']."</option>";
		}
	}
	//Mostrar
	public function MostrarProyecto()
	{

		$resultList = $this->pm->mostrarProyect('*','tbl_proyecto',array());

		$result = array();
		$estado = '';
		$i = 1;
		foreach ($resultList as $key => $value) {

			$estado = ($value['ESTADO_PROYECTO'] > 0) ? 'Activo' : 'Inactivo';
			$result['data'][] = array(
				$i++,
				$value['NOMBRE_PROYECTO'],
				$value['DESCRIPCION'],
				$value['NOMBRE_TIPO_INVESTIGACION'],
				$value['NOMBRE_ASIGNATURA'],
				$value['NOMBRE_DISENIO'],
				$value['FECHA_ASIGNACION'],
				$value['NOMBRE_GRUPO'],
				$value['COD_CICLO'],
				$estado
				);
		}
		echo json_encode($result);
	}
	//Guardar Proyecto
	public function Guardar()
	{
		$datos = array('NOMBRE_PROYECTO' => $this->input->post('NOMBRE_PROYECTO'),
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
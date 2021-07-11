<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProyectoModel','pm',true);
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
		echo "<option selected disabled value=''>Seleccionar Tipo de investigación</option>";
		foreach ($datos as $ti) {
			echo "<option value='".$ti['ID_TIPO']."'>".$ti['NOMBRE_TIPO_INVESTIGACION']."</option>";
		}
	}
	//Obteniendo Materia
	public function obtMaterias(){
		$datos = $this->pm->obtM();
		echo "<option selected disabled value=''>Seleccionar Materia</option>";
		foreach ($datos as $m) {
			echo "<option value='".$m['ID_MATERIA']."'>".$m['NOMBRE_MATERIA']."</option>";
		}
	}

	//Obteniendo Diseño de investigación
	public function obtDisenioInvestigacion(){
		$datos = $this->pm->obtDI();
		echo "<option selected disabled value=''>Seleccionar investigación</option>";
		foreach ($datos as $di) {
			echo "<option value='".$di['ID_DISENIO']."'>".$di['NOMBRE_DISENIO']."</option>";
		}
	}
	//Obteniendo Grupo de alumno 
	public function obtGrupoAlumno(){
		$datos = $this->pm->obtGA();
		echo "<option selected disabled value=''>Seleccionar Grupo Alumno</option>";
		foreach ($datos as $ga) {
			echo "<option value='".$ga['ID_GRUPO_ALUMNO']."'>".$ga['NOMBRE_GRUPO']."</option>";
		}
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
				$value['NOMBRE_MATERIA'],
				$value['NOMBRE_DISENIO'],
				$value['FECHA_ASIGNACION'],
				$value['NOMBRE_GRUPO'],
				$value['COD_CICLO'],
				$estado
				);
		}
		echo json_encode($result);
	}
	//Guardar
	public function Guardar()
	{
		//Datos de tabla  "Proyectos"
		$insert = $this->pm->insertProyecto($_POST);
		if($insert == TRUE )
		{
			echo "true";
		}

	}
}
?>
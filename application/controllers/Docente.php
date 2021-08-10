<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docente extends CI_Controller {

	// CONSTRUCTOR PARA LLAMAR AL MODELO
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DocenteModel', 'modelDocente', true);
		$this->load->model('DatosComunesModel', 'modelDatos', true);
	}

	// VISTA INSERTAR DOCENTE
	public function docente()
	{
		if($this->session->userdata('is_logged')){
			//header
			$data = array('title' => 'Nuevo Docente' );
			$this->load->view('Layout/Header', $data);
			//Body
			$this->load->view('Layout/Sidebar');
			$this->load->view('VistasCoordinador/InsertarDocente');
		 	//Footer
			$this->load->view('Layout/Footer');
		}
		else{
			$this->session->set_flashdata('msjerror', 'Usted no se ha identificado.');
			redirect('/Accesos/');
			show_404();
		}
	}

	// VISTA MOSTRAR DOCENTES
	public function viewDocentes()
	{
		if($this->session->userdata('is_logged')){
			$data = array('title' => 'Docentes' );
			//header
			$this->load->view('Layout/Header', $data);
			//Body
			$this->load->view('Layout/Sidebar');
			$this->load->view('VistasCoordinador/MostrarDocentes');
			//Footer
			$this->load->view('Layout/Footer');
		}
		else{
			$this->session->set_flashdata('msjerror', 'Usted no se ha identificado.');
			redirect('/Accesos/');
			show_404();
		}
	}

	// ID PERSONA
	public function maxPersona()
	{
		$id = $this->modelDatos->maxPersonaModel();
		foreach ($id as $i) {
			if ($i['ID_PERSONA'] == null) {
				return 1;
			} else {
				return $i['ID_PERSONA'];
			}
		}
	}

	// ID DOCENTE
	public function maxDocente()
	{
		$datos = $this->modelDatos->maxDocenteModel();
		foreach ($datos as $i) {
			if ($i['ID_DOCENTE'] == null) {
				return 1;
			} else {
				return $i['ID_DOCENTE'];
			}
		}
	}

	// ID USUARIO
	public function maxUsuario()
	{
		$datos = $this->modelDatos->maxUsuarioModel();
		foreach ($datos as $i) {
			if ($i['ID_USUARIO'] == null) {
				return 1;
			} else {
				return $i['ID_USUARIO'];
			}
		}
	}

	// GUARDAR DOCENTE
	public function crearDocente()
	{
		$datosDocente = array(
			'ID_PERSONA' => $this->maxPersona(),
			'PRIMER_NOMBRE_PERSONA' => $this->input->post('PRIMER_NOMBRE_PERSONA'),
			'SEGUNDO_NOMBRE_PERSONA' => $this->input->post('SEGUNDO_NOMBRE_PERSONA'),
			'PRIMER_APELLIDO_PERSONA' => $this->input->post('PRIMER_APELLIDO_PERSONA'),
			'SEGUNDO_APELLIDO_PERSONA' => $this->input->post('SEGUNDO_APELLIDO_PERSONA'),
			'SEXO' => $this->input->post('SEXO'),
			'CORREO_INSTITUCIONAL' => $this->input->post('CORREO_INSTITUCIONAL'),
			'CORREO_PERSONAL' => $this->input->post('CORREO_PERSONAL'),
			'DUI' => $this->input->post('DUI'),
			'NIT' => $this->input->post('NIT'),
			'DIRECCION' => $this->input->post('DIRECCION'),
			'DEPARTAMENTO' => $this->input->post('DEPARTAMENTO'),
			'TELEFONO_FIJO' => $this->input->post('TELEFONO_FIJO'),
			'TELEFONO_MOVIL' => $this->input->post('TELEFONO_MOVIL'),
			'ID_DOCENTE' => $this->maxDocente(),
			'PROFESION' => $this->input->post('PROFESION'),
			'COORDINADOR' => $this->input->post('COORDINADOR'),
			'ID_USUARIO' => $this->maxUsuario(),
			'NOMBRE_USUARIO' => $this->input->post('NOMBRE_USUARIO'),
			'PASSWORD' => $this->input->post('PASSWORD')
		);

		$insert = $this->modelDocente->crearDocenteModel($datosDocente);
		if ($insert == TRUE) 
		{
			echo "true";
		} else {
			echo "false";
		}
	}
	
	// MOSTRAR DOCENTES
	public function mostrarDocentes()
	{
		$resultList = $this->modelDocente->mostrarDocentesModel('*', 'vw_docentes', array());

		$result = array();
		foreach ($resultList as $key => $value) {

			$btnestado = ($value['ESTADO_PERMISO'] > 0) ? '<button class="btn btn-success">Activo</button>' : '<button class="btn btn-danger">Inactivo</button>';
			$btnSwitch = ($value['ESTADO_PERMISO'] > 0) ?
				'<input type="checkbox" name="ESTADO_PERMISO" id="ESTADO_PERMISO" onchange="cambiarEstado('.$value['ID_USUARIO'].');" checked="checked">' :
				'<input type="checkbox" name="ESTADO_PERMISO" id="ESTADO_PERMISO" onchange="cambiarEstado('.$value['ID_USUARIO'].');">';
			$result['data'][] = array(
				// $value['ID_USUARIO'],
				$value['ID_DOCENTE'],
				$value['DOCENTE'],
				$value['CORREO_PERSONAL'],
				$value['CORREO_INSTITUCIONAL'],
				$value['RESPONSABLE'],
				$btnestado,
				$btnSwitch,
			);
		}
		echo json_encode($result);
	}

	// CAMBIAR ESTADO DOCENTES
	public function cambiarEstado()
	{
		$where = $this->input->post('ID_USUARIO');
		$estado_permiso = $this->modelDocente->getEstadoModel($where);
		$estado = 0;
		foreach ($estado_permiso as $e) {
			if ($e['ESTADO_PERMISO'] == 0) {
				$estado = 1;
			}
		}
		
		$editar = $this->modelDocente->cambiarEstadoModel('tbl_usuario', array('ESTADO_PERMISO' => $estado), array('ID_USUARIO' => $where));
		if ($editar == TRUE) 
		{
			echo "true";
		}else{
			echo "false";
		}
	}

}
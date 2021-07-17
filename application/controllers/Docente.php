<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docente extends CI_Controller {

	// CONSTRUCTOR PARA LLAMAR AL MODELO
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DocenteModel','modelDocente',true);
	}

	// VISTA INSERTAR DOCENTE
	public function docente()
	{
		if($this->session->userdata('is_logged')){
			//header
			$data = array('title' => 'Nuevo Docente' );
			$this->load->view('Layout/Header',$data);
			//Body
			$this->load->view('Layout/Sidebar');
			$this->load->view('VistasCoordinador/InsertarDocente');
		 	//Footer
			$this->load->view('Layout/Footer');
		}
		else{
			$this->session->set_flashdata('msjerror','Usted no se ha identificado.');
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
			$this->load->view('Layout/Header',$data);
		//Body
			$this->load->view('Layout/Sidebar');
			$this->load->view('VistasCoordinador/MostrarDocentes');
		 //Footer
			$this->load->view('Layout/Footer');
		}
		else{
			$this->session->set_flashdata('msjerror','Usted no se ha identificado.');
			redirect('/Accesos/');
			show_404();
		}
	}

	// METODO GUARDAR
	public function Guardar()
	{
		$datosPersona = array(
			'ID_PERSONA' => $this->input->post('ID_PERSONA'),
			'PRIMER_NOMBRE_PERSONA' => $this->input->post('PRIMER_NOMBRE_PERSONA'),
			'SEGUNDO_NOMBRE_PERSONA' => $this->input->post('SEGUNDO_NOMBRE_PERSONA'),
			'PRIMER_APELLIDO_PERSONA' => $this->input->post('PRIMER_APELLIDO_PERSONA'),
			'SEGUNDO_APELLIDO_PERSONA' => $this->input->post('SEGUNDO_APELLIDO_PERSONA'),
			'SEXO' => $this->input->post('SEXO'),
			'CORREO_INSTITUCIONAL' => $this->input->post('CORREO_INSTITUCIONAL'),
			'CORREO_PERSONAL' => $this->input->post('CORREO_PERSONAL'),
			'DIRECCION' => $this->input->post('DIRECCION'),
			'DEPARTAMENTO' => $this->input->post('DEPARTAMENTO'),
			'DUI' => $this->input->post('DUI'),
			'NIT' => $this->input->post('NIT'),
			'TELEFONO_FIJO' => $this->input->post('TELEFONO_FIJO'),
			'TELEFONO_MOVIL' => $this->input->post('TELEFONO_MOVIL')
		);

		$datosDocente = array(
			'ID_DOCENTE' => $this->input->post('ID_DOCENTE'),
			'PERSONA' => $this->input->post('ID_PERSONA'),
			'PROFESION' => $this->input->post('PROFESION'),
			'COORDINADOR' => $this->input->post('COORDINADOR')
		);

		$datosUsuario = array(
			'ID_USUARIO' => $this->input->post('ID_USUARIO'),
			'NOMBRE_USUARIO' => $this->input->post('NOMBRE_USUARIO'),
			'PASSWORD' => sha1($this->input->post('PASSWORD')),
			'ESTADO_PERMISO' => false,
			'ID_TIPO_USUARIO' => 4,
			'ID_PERSONA_USUARIO' => $this->input->post('ID_PERSONA')
		);

		$insert_persona = $this->modelDocente->insertarPersona($datosPersona);
		$insert_docente = $this->modelDocente->insertarDocente($datosDocente);
		$insert_usuario = $this->modelDocente->insertarUsuario($datosUsuario);
		
		if ($insert_persona == TRUE && $insert_docente == TRUE && $insert_usuario == TRUE)
		{
			echo "true";
		}
	}
	
	// MOSTRAR DOCENTES
	public function MostrarDocentes()
	{
		$resultList = $this->modelDocente->mostrarDocentes('*', 'vw_docentes', array());

		$result = array();
		foreach ($resultList as $key => $value) {

			$btnestado = ($value['ESTADO_PERMISO'] > 0) ? '<button class="btn btn-success">Activo</button>' : '<button class="btn btn-danger">Inactivo</button>';
			$btnSwitch = ($value['ESTADO_PERMISO'] > 0) ?
				'<input type="checkbox" name="ESTADO_PERMISO" id="ESTADO_PERMISO" onchange="CambiarEstado('.$value['ID_USUARIO'].');" checked="checked">' :
				'<input type="checkbox" name="ESTADO_PERMISO" id="ESTADO_PERMISO" onchange="CambiarEstado('.$value['ID_USUARIO'].');">';
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

	public function CambiarEstado()
	{

		$where = $this->input->post('ID_USUARIO');
		$estado_permiso = $this->modelDocente->setEstado($where);
		$estado = 0;
		foreach ($estado_permiso as $e) {
			if ($e['ESTADO_PERMISO'] == 0) {
				$estado = 1;
			}
		}
		
		$editar = $this->modelDocente->cambiarEstado('tbl_usuario', array('ESTADO_PERMISO' => $estado), array('ID_USUARIO' => $where));
		if ($editar == TRUE) 
		{
			echo "true";
			// echo $estado_permiso;
		}else{
			echo "false";
		}
	}

}
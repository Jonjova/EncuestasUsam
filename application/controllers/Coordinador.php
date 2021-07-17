<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coordinador extends CI_Controller
{
	// CONSTRUCTOR PARA LLAMAR AL MODELO
	public function __construct()
	{
		parent::__construct();
		$this->load->model('CoordinadorModel','modelCoordinador',true);
	}

	public function coordinador()
	{
		if($this->session->userdata('is_logged')){
			//header
			$data = array('title' => 'Coordinador' );
			$this->load->view('Layout/Header',$data);
			//Body
			$this->load->view('Layout/Sidebar');
			$this->load->view('VistasAdmin/InsertarCoordinador');
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

		$datosCoordinador = array(
			'ID_COORDINADOR' => $this->input->post('ID_COORDINADOR'),
			'PERSONA' => $this->input->post('ID_PERSONA'),
			'PROFESION' => $this->input->post('PROFESION'),
			'COORDINACION' => $this->input->post('COORDINACION')
		);

		$datosUsuario = array(
			'ID_USUARIO' => $this->input->post('ID_USUARIO'),
			'NOMBRE_USUARIO' => $this->input->post('NOMBRE_USUARIO'),
			'PASSWORD' => sha1($this->input->post('PASSWORD')),
			'ESTADO_PERMISO' => true,
			'ID_TIPO_USUARIO' => 3,
			'ID_PERSONA_USUARIO' => $this->input->post('ID_PERSONA')
		);

		$insert_persona = $this->modelCoordinador->insertarPersona($datosPersona);
		$insert_coordinador = $this->modelCoordinador->insertarCoordinador($datosCoordinador);
		$insert_usuario = $this->modelCoordinador->insertarUsuario($datosUsuario);
		
		if ($insert_persona == TRUE && $insert_coordinador == TRUE && $insert_usuario == TRUE)
		{
			echo "true";
		}
	}
	
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docente extends CI_Controller {

	// CONSTRUCTOR PARA LLAMAR AL MODELO
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DocenteModel','modelDocente',true);
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
			'COORDINADOR' => 1
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
	
}
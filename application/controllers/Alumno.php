<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumno extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AlumnoModel','am',true);
		$this->load->model('DatosComunesModel', 'modelDatos', true);
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

	// ID ALUMNO
	public function maxAlumno()
	{
		$id = $this->modelDatos->maxAlumnoModel();
		foreach ($id as $i) {
			if ($i['ID_ALUMNO'] == null) {
				return 1;
			} else {
				return $i['ID_ALUMNO'];
			}
		}
	}

	public function Guardar()
	{
		
		$datosPersona = array(
			'ID_PERSONA' => $this->maxPersona(),
			'PRIMER_NOMBRE_PERSONA' => $this->input->post('PRIMER_NOMBRE_PERSONA'),
			'SEGUNDO_NOMBRE_PERSONA' => $this->input->post('SEGUNDO_NOMBRE_PERSONA'),
			'PRIMER_APELLIDO_PERSONA' => $this->input->post('PRIMER_APELLIDO_PERSONA'),
			'SEGUNDO_APELLIDO_PERSONA' => $this->input->post('SEGUNDO_APELLIDO_PERSONA'),
			'FECHA_NACIMIENTO' => $this->input->post('FECHA_NACIMIENTO'),
			'SEXO' => $this->input->post('SEXO'),
			'CORREO_INSTITUCIONAL' => $this->input->post('CORREO_INSTITUCIONAL'),
			'CORREO_PERSONAL' => $this->input->post('CORREO_PERSONAL'),
			'DIRECCION' => $this->input->post('DIRECCION'),
			'DEPARTAMENTO' => $this->input->post('DEPARTAMENTO'),
			'DUI' => $this->input->post('DUI'),
			'NIT' => $this->input->post('NIT'),
			'TELEFONO_FIJO' => $this->input->post('TELEFONO_FIJO'),
			'TELEFONO_MOVIL' => $this->input->post('TELEFONO_MOVIL'),
			'PROFESION' => null,
			'FECHA_CREA' => date('Y-m-d H:m:s')
			);

		$datosAlumno = array( 
			'ID_ALUMNO' => $this->maxAlumno(),
			'CARNET' => $this->input->post('CARNET'),
			'PERSONA' => $this->maxPersona(),
			'CARRERA' => $this->input->post('CARRERA'),
			'USUARIO_CREA' =>$this->session->userdata('ID_USUARIO'),
			'FECHA_CREA' => date('Y-m-d H:m:s')
			);
		//Datos de tabla  "Persona"
		$insertPersona = $this->am->insertPerson($datosPersona);
		//Datos de tabla  "Alumnos"
		$insertAlumno = $this->am->insertAlum($datosAlumno);
		if($insertPersona == TRUE && $insertAlumno == TRUE )
		{
			echo "true";
		}
	}

}
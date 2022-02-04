<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumno extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AlumnoModel', 'am', true);
		$this->load->model('DatosComunesModel', 'modelDatos', true);
	}

	// ID PERSONA
	public function maxPersona()
	{
		$id = $this->modelDatos->maxPersonaModel();
		foreach ($id as $i)
		{
			if ($i['ID_PERSONA'] == null)
			{
				return 1;
			}
			else
			{
				return $i['ID_PERSONA'];
			}
		}
	}

	// ID ALUMNO
	public function maxAlumno()
	{
		$id = $this->modelDatos->maxAlumnoModel();
		foreach ($id as $i)
		{
			if ($i['ID_ALUMNO'] == null)
			{
				return 1;
			}
			else
			{
				return $i['ID_ALUMNO'];
			}
		}
	}

	// GUARDAR ALUMNO
	public function Guardar()
	{
		date_default_timezone_set("America/El_Salvador"); // ZONA HORARIA
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
			'USUARIO_CREA' => $this->session->userdata('ID_USUARIO'),
			'FECHA_CREA' => date('Y-m-d H:m:s')
			);

		$insertPersona = $this->am->insertPerson($datosPersona);
		$insertAlumno = $this->am->insertAlum($datosAlumno);

		if ($insertPersona == TRUE && $insertAlumno == TRUE )
		{
			echo "true";
		}
	}

	// ACTUALIZAR ALUMNO
	public function Actualizar()
	{
		date_default_timezone_set("America/El_Salvador"); // ZONA HORARIA
		$wherePersona = $this->input->post('ID_PERSONA_UPDATE');
		$whereAlumno =$this->input->post('ID_ALUMNO_UPDATE');

		$datosPersona = array(
			'PRIMER_NOMBRE_PERSONA' => $this->input->post('PRIMER_NOMBRE_PERSONA'),
			'SEGUNDO_NOMBRE_PERSONA' => $this->input->post('SEGUNDO_NOMBRE_PERSONA'),
			'PRIMER_APELLIDO_PERSONA' => $this->input->post('PRIMER_APELLIDO_PERSONA'),
			'SEGUNDO_APELLIDO_PERSONA' => $this->input->post('SEGUNDO_APELLIDO_PERSONA'),
			'FECHA_NACIMIENTO' => $this->input->post('FECHA_NACIMIENTO'),
			'SEXO' => $this->input->post('SEXO'),
			'CORREO_INSTITUCIONAL' => $this->input->post('CORREO_INSTITUCIONAL_UPDATE'),
			'CORREO_PERSONAL' => $this->input->post('CORREO_PERSONAL_UPDATE'),
			'DIRECCION' => $this->input->post('DIRECCION'),
			'DEPARTAMENTO' => $this->input->post('DEPARTAMENTO'),
			'TELEFONO_FIJO' => $this->input->post('TELEFONO_FIJO_UPDATE'),
			'TELEFONO_MOVIL' => $this->input->post('TELEFONO_MOVIL_UPDATE')
			);
		
		$datosAlumno = array( 
			'CARNET' => $this->input->post('CARNET_UPDATE'),
			'CARRERA' => $this->input->post('CARRERA'),
			);

        $actualizarPersona = $this->am->actualizarPerson('TBL_PERSONA', $datosPersona, array('ID_PERSONA' => $wherePersona));
		$actualizarAlumno = $this->am->actualizarAlum('TBL_ALUMNOS', $datosAlumno, array('ID_ALUMNO' => $whereAlumno));
		if ($actualizarPersona == TRUE || $actualizarAlumno == TRUE) 
		{
			echo "true";
		}
	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GrupoAlumno extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('GrupoAlumnoModel', 'gam', true);
	}
	
	//CREAR
	function Guardar()
	{
		$grupo = $this->input->post('NOMBRE_GRUPO', TRUE);
		$asignatura = $this->input->post('ID_ASIGNATURA_G', TRUE);
		$ciclo = $this->input->post('CICLO_G', TRUE);
		$alumno = $this->input->post('ID_ALUMNO_GA', TRUE);
		
		$insert = $this->gam->insertGrupoAlumno($grupo, $asignatura, $ciclo, $alumno);

		if ($insert == TRUE )
		{
			echo "true";
		}
	}

	// AGREGAR ALUMNO A UN GRUPO
	function agregar()
	{
		$grupo = $this->input->post('GRUPO_GA', TRUE);
		$alumno = $this->input->post('ID_ALUMNO_GA', TRUE);
		$insert = $this->gam->agregarGrupoAlumno($grupo, $alumno);
		if ($insert == TRUE )
		{
			echo "true";
		}
	}

	//LLenar select con ajax 
	public function Alumno($asignatura)
	{
		$datos = $this->gam->obtAlumno($asignatura);
		echo json_encode($datos);
	}

	//LLenar select con ajax 
	public function Asignatura()
	{
		$datos = $this->gam->obtAdignatura();
		echo json_encode($datos);
	}

	//Validar si ya existe en un Grupo el Alumno
	public function validarGrupoAlumno()
	{
		$ga = $this->input->post('ID_ALUMNO_GA');
		echo $this->gam->validarGrupo($ga);
	}

	//Eliminar
	public function eliminarGrupoAlumno($id)
	{
		return $this->gam->EliminarGA($id);
	}
	
}
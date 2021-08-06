<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GrupoAlumno extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('GrupoAlumnoModel','gam',true);
	}

	public function Guardar()
	{
		//Datos de tabla  "Grupo de alumnos"
		$insert = $this->gam->insertGrupoA($_POST);
		if($insert == TRUE )
		{
			echo "true";
		}
	}

	//LLenar select con ajax 
	public function Alumno()
	{
		
		$datos = $this->gam->obtAlumno();
		
		echo json_encode($datos);
	}

	
}
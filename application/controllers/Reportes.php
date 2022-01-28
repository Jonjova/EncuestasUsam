<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();		
	}

	public function reportes()
	{
		$this->load->view('Reportes/Proy_General');
	}

	public function reporte()
	{
		$this->load->view('Reportes/Proy_AsignaturaCiclo');
	}
	
	public function reporteC()
	{
		$this->load->view('Reportes/Proy_Coordinador');
	} 
	
	public function reporteF()
	{
		$this->load->view('Reportes/Proy_Facultad');		
	}

	public function reporteCI()
	{
		$this->load->view('Reportes/reporteProyectosCI');		
	}
	
}
?>
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
		$this->load->view('Reportes/reporteGeneralProy');
	}

	public function reporte()
	{
		$this->load->view('Reportes/reporteProyectos');
	}
	
	public function reporteC()
	{
		$this->load->view('Reportes/reporteProyectosC');
	} 
	
	public function reporteF()
	{
		$this->load->view('Reportes/reporteProyectosF');		
	}

	public function reporteCI()
	{
		$this->load->view('Reportes/reporteProyectosCI');		
	}
	
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('AccesosModel','am',true);
	}

	public function index()
	{
		if ($this->session->userdata('is_logged'))
		{
			//header
			$data = array('title' => 'USAM - Inicio' );
			$this->load->view('Layout/Header', $data);
			//Body
			$this->load->view('Layout/Sidebar');
			$this->load->view('Bienvenidos');
			 //Footer
			$this->load->view('Layout/Footer');
		}
		else
		{
			$this->session->set_flashdata('msjerror','Usted no se ha identificado.');
			redirect('/Accesos/');
		}
	}
}
?>
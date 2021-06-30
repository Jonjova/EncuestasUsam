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
		//header
		 $this->load->view('Layout/Header');
		//Body
		$this->load->view('Bienvenidos');
		 //Footer
		$this->load->view('Layout/Footer');
	}
}
?>
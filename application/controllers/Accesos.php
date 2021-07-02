<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accesos extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AccesosModel','am',true);
	}

	public function index()
	{
		if($this->session->userdata('nombre_usuario')){
			redirect('Accesos/home');
		}
		else{

			//header
			$this->load->view('Layout/Header');
		   //Body
			$this->load->view('Layout/Sidebar');
			$this->load->view('Login');
		   //Footer
			$this->load->view('Layout/Footer');
		}

	}

	public function login(){

		$output = array('error' => false);

		$user = $_POST['user'];
		$password = sha1($_POST['password']);
		
		$data = $this->am->loginUser($user, $password);

		if($data){
			$this->session->set_userdata('nombre_usuario', $data);
			$output['message'] = 'Iniciando sesión. Espere...';
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Inicio de sesión no válido. Usuario no encontrado';
		}

		echo json_encode($output); 
	}

	public function home(){
		
		if($this->session->userdata('nombre_usuario')){
			//header
			$this->load->view('Layout/Header');
		//Body
			$this->load->view('Layout/Sidebar');
			$this->load->view('Bienvenidos');
		 //Footer
			$this->load->view('Layout/Footer');
		}
		else{
			$this->index();
		}

	}

	public function logout(){
		//load session library
		$this->session->unset_userdata('nombre_usuario');
		$this->session->sess_destroy();
		redirect('Accesos/index');
	}
}


?>
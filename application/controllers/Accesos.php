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
		if($this->session->userdata('currently_logged_in') or false)
		{
			redirect('/Dashboard/');
		}
		else
		{
			if ($this->session->userdata('currently_logged_in') or true) 
			{
				//header
				$data = array('title' => 'Inicio de Sesion' );
				$this->load->view('Layout/Header',$data);
		  	   //Body
				$this->load->view('Login');
		       //Footer
				$this->load->view('Layout/Footer');
			}
		}
	}

	public function Validar()
	{
		$user = $this->input->post('user');
		$pass = sha1($this->input->post('password'));

		if (!isset($user) || $user == '' || !isset($pass) || $pass == '')
		{
			echo json_encode(array('msg' => 'Campo de usuario y de contraseña son requeridos.'));
			$this->output->set_status_header(400);//si no se cumple status 400
			exit();
		}

		if (!$res = $this->am->iniciarSession($user, $pass))//condicion de verificacion
		{
			echo json_encode(array('msg' => 'Verfique sus credenciales.'));
			$this->output->set_status_header(401);//si no se cumple status 401
			exit;
		}
			
		//si todo esta bien 
		$data = array(
			'PERSONA' => $res->PERSONA,
			'COORDINADOR' => $res->COORDINADOR,
			'DOCENTE' => $res->DOCENTE,
			'ID_USUARIO' => $res->ID_USUARIO,
			'ID_TIPO_USUARIO' => $res->ID_TIPO_USUARIO,
			'NOMBRE_ROL' => $res->NOMBRE_ROL,
			'ID_ROL' => $res->ID_ROL,
			'PERSONA_USUARIO' => $res->PERSONA_USUARIO,
			'NOMBRE_USUARIO' => $res->NOMBRE_USUARIO,
			'ESTADO_PERMISO' => $res->ESTADO_PERMISO,
			'is_logged' => true,
			'currently_logged_in' => 1);
		$this->session->set_userdata($data);
		//$this->session->set_flashdata('msg','Bienvenido al sistema '.$data['nombre_usuario']);
		echo json_encode( array('url' => base_url('dashboard')));
	}

	public function logout()
	{
		//load session library
		$vars = array(
			'PERSONA',
			'COORDINADOR',
			'DOCENTE',
			'ID_USUARIO',
			'ID_TIPO_USUARIO',
			'NOMBRE_ROL',
			'ESTADO_PERMISO',
			'PERSONA_USUARIO',
			'NOMBRE_USUARIO',
			'ESTADO_PERMISO',
			'is_logged');
		$this->session->unset_userdata($vars);
		$this->session->sess_destroy();
		redirect('Accesos/index');
	}

	public function home()
	{
		if($this->session->userdata('is_logged'))
		{
			//header
			$data = array('title' => 'Inicio' );
			$this->load->view('Layout/Header',$data);
			//Body
			$this->load->view('Layout/Sidebar');
			$this->load->view('Bienvenidos');
		 	//Footer
			$this->load->view('Layout/Footer');
		}
		else
		{
			$this->index();
		}
	}

	public function recuperar()
	{
		if($this->session->userdata('currently_logged_in') or false)
		{
			redirect('/Dashboard/');
		}
		else
		{
			if ($this->session->userdata('currently_logged_in') or true) 
			{
				//header
				$data = array('title' => 'Recuperar Contraseña' );
				$this->load->view('Layout/Header', $data);
		  	   //Body
				$this->load->view('Cuenta/RestablecerContrasenia');
		       //Footer
				$this->load->view('Layout/Footer');
			}
		}
	}

}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permisos extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PermisosModel', 'p', true);
	}

	public function index()
	{
		if ($this->session->userdata('is_logged'))
		{
			$data = array('title' => 'Registro de Permisos' );
			//header
			$this->load->view('Layout/Header', $data);
			//Body
			$this->load->view('Layout/Sidebar');
			$this->load->view('Permisos/MostrarPermisos');
			//Footer
			$this->load->view('Layout/Footer');
		}
		else{
			$this->session->set_flashdata('msjerror','Usted no se ha identificado.');
			redirect('/Accesos/');
			show_404();
		}
	}
	//VISTA INSERTAR PERMISOS
	public function permisos()
	{
		if ($this->session->userdata('is_logged'))
		{
			//header
			$data = array('title' => 'Nuevo Permiso' );
			$this->load->view('Layout/Header', $data);
			//Body
			$this->load->view('Layout/Sidebar');
			$this->load->view('Permisos/InsertarPermisos');
			//Footer
			$this->load->view('Layout/Footer');
		}
		else
		{
			$this->session->set_flashdata('msjerror', 'Usted no se ha identificado.');
			redirect('/Accesos/');
			show_404();
		}
	}

	//Mostrar
	public function MostrarPermisos()
	{
		$resultList = $this->p->mostrarPermisos('*','permisos',array());
		$result = array();
		$i = 1;
		foreach ($resultList as $key => $value)
		{
			$leer = ($value['LEER'] == 0) ? '<span class="fa fa-times"></span>' : '<span class="fa fa-check"></span>';
			$insertar = ($value['INSERTAR'] == 0) ? '<span class="fa fa-times"></span>' : '<span class="fa fa-check"></span>';
			$actualizar = ($value['ACTUALIZAR'] == 0) ? '<span class="fa fa-times"></span>' : '<span class="fa fa-check"></span>';
			$eliminar = ($value['ELIMINAR'] == 0) ? '<span class="fa fa-times"></span>' : '<span class="fa fa-check"></span>';
			$result['data'][] = array(
					$i++,
					$value['Rol'],
					$value['Modulo'],
					$leer,
					$insertar,
					$actualizar,
					$eliminar
				);
		}
		echo json_encode($result);
	}

	//Guardar Permisos
	public function Guardar()
	{
		//Datos de tabla  "Permisos"
		$insert = $this->p->insertPermisos($_POST);
		if ($insert == TRUE )
		{
			echo "true";
		}

	}

	//Obteniendo Mudulos
	public function obtModulos()
	{
		$datos = $this->p->obtMod();
		echo "<option selected disabled value=''>Seleccionar...</option>";
		foreach ($datos as $ti)
		{
			echo "<option value='".$ti['ID_MODULO']."'>".$ti['NOMBRE']."</option>";
		}
	}

	//Obteniendo roles
	public function obtRoles(){
		$datos = $this->p->obtRol();
		echo "<option selected disabled value=''>Seleccionar...</option>";
		foreach ($datos as $ti)
		{
			echo "<option value='".$ti['ID_ROL']."'>".$ti['NOMBRE_ROL']."</option>";
		}
	}

}
?>
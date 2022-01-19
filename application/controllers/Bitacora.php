<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bitacora extends CI_Controller {

		// CONSTRUCTOR PARA LLAMAR AL MODELO
	public function __construct()
	{
		parent::__construct();
		$this->load->model('BitacoraModel', 'modelBitacora', true);
	}

		// VISTA MOSTRAR BITACORA
	public function verBitacora()
	{
		if($this->session->userdata('is_logged') && $this->session->userdata('ID_TIPO_USUARIO') == 1){
			$data = array('title' => 'Bitacora' );
				//header
			$this->load->view('Layout/Header', $data);
				//Body
			$this->load->view('Layout/Sidebar');
			$this->load->view('Bitacora/MostrarBitacora');
				//Footer
			$this->load->view('Layout/Footer');
		}
		else{
			$this->session->set_flashdata('msjerror', 'Usted no se ha identificado.');
			redirect('/Accesos/');
			show_404();
		}
	}

        // MOSTRAR USUARIOS
	public function mostrarBitacora()
	{
		$resultList = $this->modelBitacora->mostrarBitacoraModel();
		$result = array();
		$i = 1;
		if (!empty($resultList)) {
			foreach ($resultList as $key => $value) {				
				
				$result['data'][] = array(
					/*$i++,
					$value['ID_REGISTRO'],*/
					$value['FECHA'],
					$value['USUARIO_EJECUTOR'],
					$value['ACTIVIDAD_REALIZADA'],					
					$value['TABLA'],
					$value['INFORMACION_ACTUAL'],
					$value['INFORMACION_ANTERIOR']
					
					);
				
			}
		}else{
			$result['data'] = array();
		}
		echo json_encode($result);
	}
}
?>
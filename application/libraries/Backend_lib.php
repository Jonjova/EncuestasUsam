<?php

class Backend_lib 
{
	private $CI;
	public function __construct()
	{
		$this->CI = & get_instance();
	}

	public function controles()
	{
		if (!$this->CI->session->userdata("is_logged")) {
			$this->session->set_flashdata('msjerror','Usted no se ha identificado.');
			redirect(base_url());
		}

		$url = $this->CI->uri->segment(1);
		if ($this->CI->uri->segment(2)) {
			$url = $this->CI->uri->segment(1)."/".$this->CI->uri->segment(2);
		}
		$infomod = $this->CI->BackendModel->getID($url);

		$permisos = $this->CI->BackendModel->getPermisos($infomod->ID_MODULO,$this->CI->session->userdata("ID_ROL"));

		if (isset($permisos->LEER) == 0) {
			//redirect(base_url()."Accesos");
		}else{

			return $permisos;
		}

	}
}
?>
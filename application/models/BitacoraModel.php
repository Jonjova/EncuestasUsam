<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BitacoraModel extends CI_Model 
{	
	
	// MOSTRAR BITACORA
	public function mostrarBitacoraModel()
	{
		$this->db->select('*');
		$this->db->from('VW_TBL_BITACORA');
		$datos = $this->db->get();
		return $datos->result_array();
	}

}
?>
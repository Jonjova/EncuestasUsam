<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ProyectoModel extends CI_Model
{

	//Insertar tbl_proyecto
	public function insertProyecto($data)
	{
		if ($this->db->insert('tbl_proyecto',$data)) {
			return true;
		}else{
			return false;
		}
	}
	
	public function mostrarProyect()
	{
		$this->db->select('*');
		$this->db->from('vw_proyecto');
		$datos = $this->db->get();
		return $datos->result_array();
	}

}
?>
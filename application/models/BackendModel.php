<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BackendModel extends CI_Model
{
	
	public function getID($link)
	{
		$this->db->like("LINK",$link);
		$resultado = $this->db->get("modulo");
		return $resultado->row();
	}
	public function getPermisos($mod,$rol)
	{	
		$this->db->where("MODULO_ID",$mod);
		$this->db->where("ROL_ID",$rol);
		$resultado = $this->db->get("permisos");
		return $resultado->row();
	}
}
?>
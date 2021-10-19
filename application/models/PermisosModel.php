<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermisosModel extends CI_Model
{
	public function mostrarPermisos()
	{
		$this->db->select("p.*, r.NOMBRE_ROL as Rol, m.NOMBRE as Modulo");
		$this->db->from("PERMISOS p");
		$this->db->join("cat_rol_usuario r","p.ROL_ID = r.ID_ROL");
		$this->db->join("modulo m","p.MODULO_ID = m.ID_MODULO");
		$datos = $this->db->get();
		return $datos->result_array();
	}

   //llenado Select Modulos
	public function obtMod()
	{
		$datos = $this->db->get('modulo');
		return $datos->result_array();
	}
	//llenado Select roles
	public function obtRol()
	{
		$datos = $this->db->get('cat_rol_usuario');
		return $datos->result_array();
	}

	//Insertar tbl_proyecto
	public function insertPermisos($data)
	{
		if ($this->db->insert('permisos',$data)) {
			return true;
		}else{
			return false;
		}
	}
}
?>
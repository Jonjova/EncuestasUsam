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

	  //-- check user role power
    function check_permiso($perm){
        $this->db->select('leer');
        $this->db->where("leer",$perm);
        $query = $this->db->get("permisos");
        $query = $query->row();  
        return $query;
    }

    public function check_permi($leer)
	{
		$this->db->select('leer');
		//Traemos los datos a la tabla correspondiente.
		$this->db->from('permisos');
		$this->db->where('leer=',$leer);
		$datos = $this->db->get();
		return $datos->result_array();

	}
}
?>
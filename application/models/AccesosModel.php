<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccesosModel extends CI_Model
{
	
	public function iniciarSession($user, $password)
	{
	$query = $this->db->get_where('tbl_usuario', array('nombre_usuario' =>$user ,'password' =>$password),1);
		if(!$query->result()){
			return false;
		}
		return $query->row();
	}

}

?>
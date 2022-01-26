<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccesosModel extends CI_Model
{
	
	public function iniciarSession($user, $password)
	{
		$query = $this->db->get_where('VW_USUARIO', array('NOMBRE_USUARIO' => $user ,'PASSWORD' => $password), 1);
		if (!$query->result())
		{
			return false;
		}
		return $query->row();
	}

}
?>
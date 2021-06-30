<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccesosModel extends CI_Model
{
	
	public function loginUser($user, $password)
	{
	$query = $this->db->get_where('tbl_usuario', array('nombre_usuario'=>$user, 'password'=>$password));
		return $query->row_array();
	}

}

?>
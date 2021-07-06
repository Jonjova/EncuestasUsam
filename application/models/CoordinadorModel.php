<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CoordinadorModel extends CI_Model 
{
	// INSERTAR PERSONA
	public function insertarPersona($persona)
	{
		if ($this->db->insert('tbl_persona', $persona)) {
			return true;
		} else {
			return false;
		}
	}

	// INSERTAR COORDINADOR
	public function insertarCoordinador($coordinador)
	{
		if ($this->db->insert('tbl_coordinador', $coordinador)) {
			return true;
		} else {
			return false;
		}
	}

	// INSERTAR USUARIO
	public function insertarUsuario($usuario)
	{
		if ($this->db->insert('tbl_usuario', $usuario)) {
			return true;
		} else {
			return false;
		}
	}
	
}
?>
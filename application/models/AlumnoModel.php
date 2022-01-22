<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AlumnoModel extends CI_Model
{

	//Insertar tbl_alumnos
	public function insertAlum($data)
	{
		if ($this->db->insert('tbl_alumnos',$data)) {
			return true;
		}else{
			return false;
		}
	}

	//Insertar tbl_persona
	public function insertPerson($data)
	{
		if ($this->db->insert('tbl_persona',$data)) {
			return true;
		}else{
			return false;
		}
	}

	//Actualizar
	public function actualizarPerson($tablename,$data,$where)
	{
		$query = $this->db->update($tablename,$data,$where);
		return $query;
	}

	//Actualizar
	public function actualizarAlum($tablename,$data,$where)
	{
		$query = $this->db->update($tablename,$data,$where);
		return $query;
	}

}

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AlumnoModel extends CI_Model
{

	// GUARDAR ALUMNO
	public function insertAlum($data)
	{
		if ($this->db->insert('TBL_ALUMNOS', $data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	// GUARDAR PERSONA
	public function insertPerson($data)
	{
		if ($this->db->insert('TBL_PERSONA', $data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	// ACTUALIZAR PERSONA
	public function actualizarPerson($tablename, $data, $where)
	{
		$query = $this->db->update($tablename, $data, $where);
		return $query;
	}

	// ACTUALIZAR ALUMNO
	public function actualizarAlum($tablename, $data, $where)
	{
		$query = $this->db->update($tablename, $data, $where);
		return $query;
	}

}
?>
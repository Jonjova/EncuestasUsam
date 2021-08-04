<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GrupoAlumnoModel extends CI_Model
{
	
	public function obtAlumno()
	{
		$this->db->select('a.ID_ALUMNO,a.CARNET, p.PRIMER_NOMBRE_PERSONA, p.SEGUNDO_NOMBRE_PERSONA, p.PRIMER_APELLIDO_PERSONA , p.SEGUNDO_APELLIDO_PERSONA');
		$this->db->from('tbl_alumnos a');
		$this->db->join('tbl_persona p', 'a.PERSONA = p.ID_PERSONA');
		$datos = $this->db->get();
		return $datos->result_array();
	}
	//Insertar tbl_grupo_alumno
	public function insertGrupoA($data)
	{
		if ($this->db->insert('tbl_grupo_alumno',$data)) {
			return true;
		}else{
			return false;
		}
	}
}

?>
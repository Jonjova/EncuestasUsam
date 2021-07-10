<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ProyectoModel extends CI_Model
{
	
	//llenado Select Tipo de investigación
	public function obtTI()
	{
		$datos = $this->db->get('cat_tipo_investigacion');
		return $datos->result_array();
	}

	//llenado Select Materia 
	public function obtM()
	{
		$datos = $this->db->get('tbl_materias');
		return $datos->result_array();
	}

	//Llenado Select Diseño de investigación
	public function obtDI()
	{
		$datos = $this->db->get('cat_disenio_investigacion');
		return $datos->result_array();
	}
	//Llenado Select Grupo Alumnos
	public function obtGA()
	{
		$datos = $this->db->get('tbl_grupo_alumno');
		return $datos->result_array();
	}

	//Llenado Select Grupo Alumnos
	public function obtC()
	{
		$datos = $this->db->get('tbl_ciclo');
		return $datos->result_array();
	}

	public function insertProyecto($data)
	{
		if ($this->db->insert('tbl_proyecto',$data)) {
			return true;
		}else{
			return false;
		}
	}
}
?>
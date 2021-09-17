<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AlumnoModel extends CI_Model
{
	
	//llenado Select Sexo
	public function obtSexo()
	{
		$datos = $this->db->get('cat_sexo');
		return $datos->result_array();
	}
	//llenado Select Departamento
	public function obtDepartamento()
	{
		$datos = $this->db->get('cat_departamento');
		return $datos->result_array();
	}
	//llenado Select Carrera
	public function obtCarrer()
	{
		$datos = $this->db->get('cat_carrera');
		return $datos->result_array();
	}
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

	//validar si existe correo institucional
	public function validarCI($ci)
	{
		$this->db->where('CORREO_INSTITUCIONAL',$ci);
		$resultado = $this->db->get('tbl_persona');
		if($resultado->num_rows()>0){
			return 1;
		}else{
			return 0;
		}
	}

	//validar si existe correo personal
	public function validarCP($ci)
	{
		$this->db->where('CORREO_PERSONAL',$ci);
		$resultado = $this->db->get('tbl_persona');
		if($resultado->num_rows()>0){
			return 1;
		}else{
			return 0;
		}
	}
	//validar si existe carnet 
	public function validarC($carntet)
	{
		$this->db->where('CARNET',$carntet);
		$resultado = $this->db->get('tbl_alumnos');
		if($resultado->num_rows()>0){
			return 1;
		}else{
			return 0;
		}
	}

	//validar si existe dui 
	public function validarD($dui)
	{
		$this->db->where('DUI',$dui);
		$resultado = $this->db->get('tbl_persona');
		if($resultado->num_rows()>0){
			return 1;
		}else{
			return 0;
		}
	}

	//validar si existe nit 
	public function validarN($nit)
	{
		$this->db->where('NIT',$nit);
		$resultado = $this->db->get('tbl_persona');
		if($resultado->num_rows()>0){
			return 1;
		}else{
			return 0;
		}
	}

	// MAX ID PERSONA
	public function maxIdPersonaModel()
	{
		$maxid = $this->db->query('SELECT MAX(ID_PERSONA + 1) as ID_PERSONA FROM `tbl_persona`');
		return $maxid->result_array();
	}

	// MAX ID PERSONA
	public function maxIdAlumnoModel()
	{
		$maxid = $this->db->query('SELECT MAX(ID_ALUMNO + 1) as ID_ALUMNO FROM `tbl_alumnos`');
		return $maxid->result_array();
	}
}

?>
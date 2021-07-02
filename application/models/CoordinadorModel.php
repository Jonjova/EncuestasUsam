<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CoordinadorModel extends CI_Model 
{

	// MAX ID PERSONA
	public function maxPersonaModel()
	{
		$maxid = $this->db->query('SELECT MAX(ID_PERSONA + 1) as ID_PERSONA FROM `tbl_persona`');
		return $maxid->result_array();
	}

	// MAX ID COORDINADOR
	public function maxCoordinadorModel()
	{
		$maxid = $this->db->query('SELECT MAX(ID_COORDINADOR + 1) as ID_COORDINADOR FROM `tbl_coordinador`');
		return $maxid->result_array();
	}

	// MAX ID USUARIO
	public function maxUsuarioModel()
	{
		$maxid = $this->db->query('SELECT MAX(ID_USUARIO + 1) as ID_USUARIO FROM `tbl_usuario`');
		return $maxid->result_array();
	}

	// LLENAR SELECT SEXO
	public function dropSexoModel()
	{
		$datos = $this->db->get('cat_sexo');
		return $datos->result_array();
	}

	// LLENAR SELECT Departamento
	public function dropDepartamentoModel()
	{
		$datos = $this->db->get('cat_departamento');
		return $datos->result_array();
	}

	// LLENAR SELECT Profesion
	public function dropProfesionModel()
	{
		$datos = $this->db->get('cat_profesion');
		return $datos->result_array();
	}

	// LLENAR SELECT Coordinacion
	public function dropCoordinacionModel()
	{
		$datos = $this->db->get('cat_coordinacion');
		return $datos->result_array();
	}

	// VALIDAR DUI
	function findDUI($valor) {
		$this->db->where('DUI',$valor);
		return $this->db->get('tbl_persona')->result();
	}

	// VALIDAR NIT
	function findNIT($valor) {
		$this->db->where('NIT',$valor);
		return $this->db->get('tbl_persona')->result();
	}

	// VALIDAR TELEFONO FIJO
	function findTelFijo($valor) {
		$this->db->where('TELEFONO_FIJO',$valor);
		return $this->db->get('tbl_persona')->result();
	}

	// VALIDAR TELEFONO MOVIL
	function findTelMovil($valor) {
		$this->db->where('TELEFONO_MOVIL',$valor);
		return $this->db->get('tbl_persona')->result();
	}

	// VALIDAR CORREO INSTITUCIONAL
	function findEmailUSAM($valor) {
		$this->db->where('CORREO_INSTITUCIONAL',$valor);
		return $this->db->get('tbl_persona')->result();
	}

	// VALIDAR CORREO PERSONAL
	function findEmail($valor) {
		$this->db->where('CORREO_PERSONAL',$valor);
		return $this->db->get('tbl_persona')->result();
	}

	// INSERTAR PERSONA
	public function insertarPersona($persona)
	{
		if ($this->db->insert('tbl_persona', $persona)) {
			return true;
		}else{
			return false;
		}
	}

	// INSERTAR DOCENTE
	public function insertarCoordinador($coordinador)
	{
		if ($this->db->insert('tbl_coordinador', $coordinador)) {
			return true;
		}else{
			return false;
		}
	}

	// INSERTAR USUARIO
	public function insertarUsuario($usuario)
	{
		if ($this->db->insert('tbl_usuario', $usuario)) {
			return true;
		}else{
			return false;
		}
	}
}
?>
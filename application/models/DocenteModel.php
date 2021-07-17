<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DocenteModel extends CI_Model 
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

	// INSERTAR DOCENTE
	public function insertarDocente($docente)
	{
		if ($this->db->insert('tbl_docente', $docente)) {
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

	// MOSTRAR DOCENTES
	public function mostrarDocentes()
	{
		$this->db->select('*');
		$this->db->from('vw_docentes');
		$datos = $this->db->get();
		return $datos->result_array();
	}

	// CAMBIAR ESTADO DOCENTES
	public function cambiarEstado($tablename, $data, $where)
	{
		$query = $this->db->update($tablename, $data, $where);
		return $query;
	}
	
	public function setEstado($where)
	{
		$estatus = $this->db->query('SELECT `ESTADO_PERMISO` FROM `tbl_usuario` WHERE `ID_USUARIO` = '.$where.'');
		return $estatus->result_array();
	}
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ValidarCamposModel extends CI_Model 
{
	// VALIDAR DUI
	function findDUI($valor)
	{
		$this->db->where('DUI', $valor);
		return $this->db->get('tbl_persona')->result();
	}

	// VALIDAR NIT
	function findNIT($valor)
	{
		$this->db->where('NIT', $valor);
		return $this->db->get('tbl_persona')->result();
	}

	// VALIDAR TELEFONO FIJO
	function findTelFijo($valor)
	{
		$this->db->where('TELEFONO_FIJO', $valor);
		return $this->db->get('tbl_persona')->result();
	}

	// VALIDAR TELEFONO MOVIL
	function findTelMovil($valor)
	{
		$this->db->where('TELEFONO_MOVIL', $valor);
		return $this->db->get('tbl_persona')->result();
	}

	// VALIDAR CORREO PERSONAL
	function findEmail($valor)
	{
		$this->db->where('CORREO_PERSONAL', $valor);
		return $this->db->get('tbl_persona')->result();
	}

    // VALIDAR CORREO INSTITUCIONAL
	function findEmailUSAM($valor)
	{
		$this->db->where('CORREO_INSTITUCIONAL', $valor);
		return $this->db->get('tbl_persona')->result();
	}

	// VALIDAR CODIGO ASIGNATURA
	function findCodAsignatura($valor)
	{
		$this->db->where('CODIGO_ASIGNATURA', $valor);
		return $this->db->get('tbl_asignatura')->result();
	}

	// VALIDAR CARNET
	public function findCarnet($valor)
	{
		$this->db->where('CARNET', $valor);
		return $this->db->get('tbl_alumnos')->result();
	}


	// VALIDAR CAMBIAR DUI
	function cambiarDUIModel($valor, $idPersona)
	{
		$query = $this->db->query("SELECT DUI FROM tbl_persona WHERE DUI = '".$valor."' "."AND ID_PERSONA != '".$idPersona."'");
		if(!$query->result())
        {
            return false;
        }
        return $query->row();
	}

	// VALIDAR CAMBIAR NIT
	function cambiarNITModel($valor, $idPersona)
	{
		$query = $this->db->query("SELECT NIT FROM tbl_persona WHERE NIT = '".$valor."' "."AND ID_PERSONA != '".$idPersona."'");
		if(!$query->result())
        {
            return false;
        }
        return $query->row();
	}

	// VALIDAR CAMBIAR TELEFONO FIJO
	function cambiarTelFijoModel($valor, $idPersona)
	{
		$query = $this->db->query("SELECT TELEFONO_FIJO FROM tbl_persona WHERE TELEFONO_FIJO = '".$valor."' "."AND ID_PERSONA != '".$idPersona."'");
		if(!$query->result())
        {
            return false;
        }
        return $query->row();
	}

	// VALIDAR CAMBIAR TELEFONO MOVIL
	function cambiarTelMovilModel($valor, $idPersona)
	{
		$query = $this->db->query("SELECT TELEFONO_MOVIL FROM tbl_persona WHERE TELEFONO_MOVIL = '".$valor."' "."AND ID_PERSONA != '".$idPersona."'");
		if(!$query->result())
        {
            return false;
        }
        return $query->row();
	}

	// VALIDAR CAMBIAR CORREO PERSONAL
	function cambiarEmailModel($valor, $idPersona)
	{
		$query = $this->db->query("SELECT CORREO_PERSONAL FROM tbl_persona WHERE CORREO_PERSONAL = '".$valor."' "."AND ID_PERSONA != '".$idPersona."'");
		if(!$query->result())
        {
            return false;
        }
        return $query->row();
	}

	// VALIDAR CAMBIAR CORREO INSTITUCIONAL
	function cambiarEmailUSAMModel($valor, $idPersona)
	{
		$query = $this->db->query("SELECT CORREO_INSTITUCIONAL FROM tbl_persona WHERE CORREO_INSTITUCIONAL = '".$valor."' "."AND ID_PERSONA != '".$idPersona."'");
		if(!$query->result())
        {
            return false;
        }
        return $query->row();
	}

}
?>
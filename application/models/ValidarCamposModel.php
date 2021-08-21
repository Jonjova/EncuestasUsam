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

	// VALIDAR CAMBIAR TELEFONO FIJO
	function cambiarTelFijoModel($telefono, $idPersona)
	{
		$query = $this->db->query("SELECT TELEFONO_FIJO FROM tbl_persona WHERE TELEFONO_FIJO = '".$telefono."' "."AND ID_PERSONA != '".$idPersona."'");
		if(!$query->result())
        {
            return false;
        }
        return $query->row();
	}

	// VALIDAR CAMBIAR TELEFONO MOVIL
	function cambiarTelMovilModel($telefono, $idPersona)
	{
		$query = $this->db->query("SELECT TELEFONO_MOVIL FROM tbl_persona WHERE TELEFONO_MOVIL = '".$telefono."' "."AND ID_PERSONA != '".$idPersona."'");
		if(!$query->result())
        {
            return false;
        }
        return $query->row();
	}

	// VALIDAR CAMBIAR CORREO PERSONAL
	function cambiarEmailModel($email, $idPersona)
	{
		$query = $this->db->query("SELECT CORREO_PERSONAL FROM tbl_persona WHERE CORREO_PERSONAL = '".$email."' "."AND ID_PERSONA != '".$idPersona."'");
		if(!$query->result())
        {
            return false;
        }
        return $query->row();
	}

}
?>
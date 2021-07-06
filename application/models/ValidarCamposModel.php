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

}
?>
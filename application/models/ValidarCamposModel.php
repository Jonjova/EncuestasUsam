<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ValidarCamposModel extends CI_Model 
{

	/****************************************************************************
                        	VALIDAR CAMPOS PARA INSERTAR
	****************************************************************************/
	
	// VALIDAR 	PROFESION
	function findProf($valor)
	{
		$this->db->where('NOMBRE_PROFESION', $valor);
		return $this->db->get('CAT_PROFESION')->result();
	}
	
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

	public function obtenerInfoAlumno($valor)
	{
		$this->db->select('a.carnet, b.primer_nombre_persona, b.segundo_nombre_persona, b.primer_apellido_persona, 
							b.segundo_apellido_persona, b.fecha_nacimiento, c.nombre_sexo, b.correo_personal, b.telefono_fijo, d.nombre_carrera, b.correo_institucional, b.telefono_movil, e.nombre_departamento, b.direccion,b.ID_PERSONA,a.ID_ALUMNO,b.SEXO,a.CARRERA,b.DEPARTAMENTO');

		$this->db->from('tbl_alumnos a');
		$this->db->join('tbl_persona b', 'a.persona = b.id_persona');
		$this->db->join('cat_sexo c', 'b.sexo = c.id_sexo');
		$this->db->join('cat_carrera d', 'a.carrera = d.id_carrera');
		$this->db->join('cat_departamento e', 'a.persona = b.id_persona');

		$this->db->like('CARNET', $valor); 
		
		return $this->db->get()->row_array();
	}

	// VALIDAR CICLO
	public function validarCicloModel($valor)
	{
		$this->db->where('COD_CICLO', $valor);
		return $this->db->get('tbl_ciclo')->result();
	}

	/****************************************************************************
                        	VALIDAR CAMPOS PARA ACTUALIZAR
	****************************************************************************/

	// VALIDAR CAMBIAR PROFESION
	function cambiarProfModel($valor, $id)
	{
		$query = $this->db->query("SELECT NOMBRE_PROFESION FROM CAT_PROFESION WHERE NOMBRE_PROFESION = '".$valor."' "."AND ID_PROFESION != '".$id."'");
		if(!$query->result())
        {
            return false;
        }
        return $query->row();
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
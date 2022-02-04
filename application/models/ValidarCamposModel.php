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
		return $this->db->get('TBL_PERSONA')->result();
	}

	// VALIDAR NIT
	function findNIT($valor)
	{
		$this->db->where('NIT', $valor);
		return $this->db->get('TBL_PERSONA')->result();
	}

	// VALIDAR TELEFONO FIJO
	function findTelFijo($valor)
	{
		$this->db->where('TELEFONO_FIJO', $valor);
		return $this->db->get('TBL_PERSONA')->result();
	}

	// VALIDAR TELEFONO MOVIL
	function findTelMovil($valor)
	{
		$this->db->where('TELEFONO_MOVIL', $valor);
		return $this->db->get('TBL_PERSONA')->result();
	}

	// VALIDAR CORREO PERSONAL
	function findEmail($valor)
	{
		$this->db->where('CORREO_PERSONAL', $valor);
		return $this->db->get('TBL_PERSONA')->result();
	}

    // VALIDAR CORREO INSTITUCIONAL
	function findEmailUSAM($valor)
	{
		$this->db->where('CORREO_INSTITUCIONAL', $valor);
		return $this->db->get('TBL_PERSONA')->result();
	}

	// VALIDAR CODIGO ASIGNATURA
	function findCodAsignatura($valor)
	{
		$this->db->where('CODIGO_ASIGNATURA', $valor);
		return $this->db->get('TBL_ASIGNATURA')->result();
	}

	// VALIDAR CARNET
	public function findCarnet($valor)
	{
		$this->db->where('CARNET', $valor);
		return $this->db->get('TBL_ALUMNOS')->result();
	}

	// CARGAR DATOS DE ALUMNO
	public function obtenerInfoAlumnoModel($valor)
	{
		$this->db->select(
							'a.CARNET, b.PRIMER_NOMBRE_PERSONA, b.SEGUNDO_NOMBRE_PERSONA, b.PRIMER_APELLIDO_PERSONA, 
							b.SEGUNDO_APELLIDO_PERSONA, b.FECHA_NACIMIENTO, c.NOMBRE_SEXO, b.CORREO_PERSONAL, b.TELEFONO_FIJO, 
							d.NOMBRE_CARRERA, b.CORREO_INSTITUCIONAL, b.TELEFONO_MOVIL, e.NOMBRE_DEPARTAMENTO, b.DIRECCION, 
							b.ID_PERSONA, a.ID_ALUMNO, b.SEXO, a.CARRERA, b.DEPARTAMENTO'
						);

		$this->db->from('TBL_ALUMNOS a');
		$this->db->join('TBL_PERSONA b', 'a.PERSONA = b.ID_PERSONA');
		$this->db->join('CAT_SEXO c', 'b.SEXO = c.ID_SEXO');
		$this->db->join('CAT_CARRERA d', 'a.CARRERA = d.ID_CARRERA');
		$this->db->join('CAT_DEPARTAMENTO e', 'a.PERSONA = b.ID_PERSONA');

		$this->db->like('CARNET', $valor); 
		
		return $this->db->get()->row_array();
	}

	// VALIDAR CICLO
	public function validarCicloModel($valor)
	{
		$this->db->where('COD_CICLO', $valor);
		return $this->db->get('TBL_CICLO')->result();
	}

	/****************************************************************************
                        	VALIDAR CAMPOS PARA ACTUALIZAR
	****************************************************************************/

	// VALIDAR CAMBIAR PROFESION
	function cambiarProfModel($valor, $id)
	{
		$query = $this->db->query("SELECT NOMBRE_PROFESION FROM CAT_PROFESION WHERE NOMBRE_PROFESION = '".$valor."' "."AND ID_PROFESION != '".$id."'");
		if (!$query->result())
        {
            return false;
        }
        return $query->row();
	}

	// VALIDAR CAMBIAR DUI
	function cambiarDUIModel($valor, $idPersona)
	{
		$query = $this->db->query("SELECT DUI FROM TBL_PERSONA WHERE DUI = '".$valor."' "."AND ID_PERSONA != '".$idPersona."'");
		if (!$query->result())
        {
            return false;
        }
        return $query->row();
	}

	// VALIDAR CAMBIAR NIT
	function cambiarNITModel($valor, $idPersona)
	{
		$query = $this->db->query("SELECT NIT FROM TBL_PERSONA WHERE NIT = '".$valor."' "."AND ID_PERSONA != '".$idPersona."'");
		if (!$query->result())
        {
            return false;
        }
        return $query->row();
	}

	// VALIDAR CAMBIAR TELEFONO FIJO
	function cambiarTelFijoModel($valor, $idPersona)
	{
		$query = $this->db->query("SELECT TELEFONO_FIJO FROM TBL_PERSONA WHERE TELEFONO_FIJO = '".$valor."' "."AND ID_PERSONA != '".$idPersona."'");
		if (!$query->result())
        {
            return false;
        }
        return $query->row();
	}

	// VALIDAR CAMBIAR TELEFONO MOVIL
	function cambiarTelMovilModel($valor, $idPersona)
	{
		$query = $this->db->query("SELECT TELEFONO_MOVIL FROM TBL_PERSONA WHERE TELEFONO_MOVIL = '".$valor."' "."AND ID_PERSONA != '".$idPersona."'");
		if (!$query->result())
        {
            return false;
        }
        return $query->row();
	}

	// VALIDAR CAMBIAR CORREO PERSONAL
	function cambiarEmailModel($valor, $idPersona)
	{
		$query = $this->db->query("SELECT CORREO_PERSONAL FROM TBL_PERSONA WHERE CORREO_PERSONAL = '".$valor."' "."AND ID_PERSONA != '".$idPersona."'");
		if (!$query->result())
        {
            return false;
        }
        return $query->row();
	}

	// VALIDAR CAMBIAR CORREO INSTITUCIONAL
	function cambiarEmailUSAMModel($valor, $idPersona)
	{
		$query = $this->db->query("SELECT CORREO_INSTITUCIONAL FROM TBL_PERSONA WHERE CORREO_INSTITUCIONAL = '".$valor."' "."AND ID_PERSONA != '".$idPersona."'");
		if (!$query->result())
        {
            return false;
        }
        return $query->row();
	}

	// VALIDAR CODIGO ASIGNATURA
	function cambiarCodAsignaturaModel($valor, $id)
	{
		$query = $this->db->query("SELECT CODIGO_ASIGNATURA FROM TBL_ASIGNATURA WHERE CODIGO_ASIGNATURA = '".$valor."' "."AND ID_ASIGNATURA != '".$id."'");
		if (!$query->result())
        {
            return false;
        }
        return $query->row();
	}

	// VALIDAR CARNET
	public function cambiarCarnetModel($valor, $id)
	{
		$query = $this->db->query("SELECT CARNET FROM TBL_ALUMNOS WHERE CARNET = '".$valor."' "."AND ID_ALUMNO != '".$id."'");
		if (!$query->result())
        {
            return false;
        }
        return $query->row();
	}

}
?>
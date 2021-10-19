<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DatosComunesModel extends CI_Model 
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

	// MAX ID DOCENTE
	public function maxDocenteModel()
	{
		$maxid = $this->db->query('SELECT MAX(ID_DOCENTE + 1) as ID_DOCENTE FROM `tbl_docente`');
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

	// LLENAR SELECT COORDINADOR
	public function dropCoordinadorModel()
	{
		$datos = $this->db->get('VW_DROP_COORDINADORES');
		return $datos->result_array();
	}

	// LLENAR SELECT ASIGNATURA
	public function dropAsignaturaModel($coordinador)
	{
		if ($coordinador >= 1)
		{
			$datos = $this->db->query('SELECT * FROM tbl_asignatura WHERE COORDINADOR = '.$coordinador.'');
		}
		else
		{
			$datos = $this->db->get('tbl_asignatura');
		}
		return $datos->result_array();
	}

	// LLENAR SELECT DOCENTE
	public function dropDocenteModel($coordinador)
	{
		if ($coordinador >= 1)
		{
			$datos = $this->db->query('SELECT * FROM VW_DROP_DOCENTES WHERE COORDINADOR = '.$coordinador.'');
		}
		else
		{
			$datos = $this->db->get('VW_DROP_DOCENTES');
		}
		return $datos->result_array();
	}

}
?>
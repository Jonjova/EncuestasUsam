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

	// MAX ID ALUMNO
	public function maxAlumnoModel()
	{
		$maxid = $this->db->query('SELECT MAX(ID_ALUMNO + 1) as ID_ALUMNO FROM `tbl_alumnos`');
		return $maxid->result_array();
	}

	// MAX ID CICLO
	public function maxCicloModel()
	{
		$maxid = $this->db->query('SELECT MAX(ID_CICLO + 1) as ID_CICLO FROM `tbl_ciclo`');
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

	// LLENAR SELECT ROL
	public function dropRolModel()
	{
		$datos = $this->db->query('SELECT * FROM cat_rol_usuario WHERE ID_ROL NOT IN (1, 3, 4)');
		return $datos->result_array();
	}

	// LLENAR SELECT ASIGNATURA
	public function dropAsignaturaModel($coordinador)
	{
		$datos = $this->db->query('SELECT * FROM tbl_asignatura WHERE COORDINADOR = '.$coordinador.'');
		return $datos->result_array();
	}

	// LLENAR SELECT ASIGNATURA ASIGNADA
	public function dropAsignaturaAsignadaModel($docente)
	{
		$datos = $this->db->query('SELECT * FROM VW_TBL_DOCENTES_ASIGNATURAS WHERE ID_DOCENTE = '.$docente.'');
		return $datos->result_array();
	}

	// LLENAR SELECT DOCENTE
	public function dropDocenteModel($coordinador, $asignatura)
	{
		// $datos = $this->db->query('SELECT * FROM VW_DROP_DOCENTES WHERE COORDINADOR = '.$coordinador.'');
		$datos = $this->db->query(
			'SELECT * FROM VW_DROP_DOCENTES
			WHERE COORDINADOR = '.$coordinador.' AND ID_DOCENTE NOT IN (SELECT ID_DOCENTE FROM tbl_docente_asignatura WHERE ID_ASIGNATURA = '.$asignatura.')');
		// $datos = $this->db->query(
		// 	'SELECT * FROM VW_DROP_DOCENTES
		// 	WHERE ID_DOCENTE NOT IN (
		// 	SELECT ID_DOCENTE FROM tbl_docente_asignatura
		// 	WHERE ID_ASIGNATURA = '.$coordinador.') AND COORDINADOR = 2');
		return $datos->result_array();
	}

	// LLENAR SELECT CARRERA
	public function obtCarrer()
	{
		$datos = $this->db->get('cat_carrera');
		return $datos->result_array();
	}

	// LLENAR SELECT TIPO INVESTIGACION
	public function obtTI()
	{
		$datos = $this->db->get('cat_tipo_investigacion');
		return $datos->result_array();
	}

	// LLENAR SELECT DISEÑO INVESTIGACION
	public function obtDI()
	{
		$datos = $this->db->get('cat_disenio_investigacion');
		return $datos->result_array();
	}

	// LLENAR SELECT GRUPO ALUMNOS
	public function obtGA()
	{
		$datos = $this->db->get('tbl_grupo');
		return $datos->result_array();
	}

	// LLENAR SELECT CICLO
	public function obtC()
	{
		$datos = $this->db->get('tbl_ciclo');
		return $datos->result_array();
	}

}
?>
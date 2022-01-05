<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GrupoAlumnoModel extends CI_Model
{
	
	public function obtAlumno($asignatura)
	{
		// $this->db->select('a.ID_ALUMNO,a.CARNET, p.PRIMER_NOMBRE_PERSONA, p.SEGUNDO_NOMBRE_PERSONA, p.PRIMER_APELLIDO_PERSONA , p.SEGUNDO_APELLIDO_PERSONA');
		// $this->db->from('tbl_alumnos a');
		// $this->db->join('tbl_persona p', 'a.PERSONA = p.ID_PERSONA');
		// $datos = $this->db->get();
		$datos = $this->db->query(
			"SELECT ta.ID_ALUMNO, ta.CARNET, tp.PRIMER_NOMBRE_PERSONA, tp.SEGUNDO_NOMBRE_PERSONA,
				tp.PRIMER_APELLIDO_PERSONA , tp.SEGUNDO_APELLIDO_PERSONA
			FROM tbl_alumnos AS ta
				INNER JOIN tbl_persona AS tp ON tp.ID_PERSONA = ta.PERSONA
			WHERE ta.ID_ALUMNO NOT IN
				(
					SELECT tga.ID_DET_ALUMNO
					FROM tbl_proyecto AS tbp
						INNER JOIN tbl_ciclo AS tc ON tc.ID_CICLO = tbp.CICLO
						INNER JOIN tbl_grupo AS tg ON tg.ID_GRUPO_ALUMNO = tbp.ID_GRUPO_ALUMNO
						INNER JOIN tbl_grupo_alumno AS tga ON tga.ID_DET_GRUPO = tbp.ID_GRUPO_ALUMNO
					WHERE (tga.ID_DET_ALUMNO IN (tga.ID_DET_ALUMNO)
						AND NOW() BETWEEN tc.FECHA_INICIO AND tc.FECHA_FIN)
						AND tbp.ID_ASIGNATURA = $asignatura
				)
			ORDER BY ta.ID_ALUMNO ASC");
		return $datos->result_array();
	}
	
   //llenado Select Modulos
	public function obtAdignatura()
	{
		$datos = $this->db->get('tbl_asignatura');
		return $datos->result_array();
	}

	// CREAR
	public function insertGrupoAlumno($grupo,$alumno){
		$this->db->trans_start();
			//Insertar grupo
		date_default_timezone_set("America/El_Salvador");
		$data  = array(
			//'ID_GRUPO_ALUMNO' => $this->maxIdGrupo(),
			'NOMBRE_GRUPO' => $grupo,
			'USUARIO_CREA' =>$this->session->userdata('ID_USUARIO'),
			'FECHA_CREA' => date('Y-m-d H:m:s')
			);
		$this->db->insert('tbl_grupo', $data);
			//Obtener id grupo
		$grupo_id = $this->db->insert_id();
		$result = array();
		$contador = $this->maxIdDGA();
		foreach($alumno AS $key => $val){
			$result[] = array(
				'ID_DET_GA' => $contador,
				'ID_DET_GRUPO' => $grupo_id,
				'ID_DET_ALUMNO' => $_POST['ID_ALUMNO_GA'][$key]
				);
			$contador++;
		}      
			//insercion multiple en la tabla detalle
		$this->db->insert_batch('tbl_grupo_alumno', $result);
		$this->db->trans_complete();
	}
	
	//validar si existe un alumno en un grupo 
	public function validarGrupo($grupo)
	{
		$this->db->where('ID_DET_ALUMNO',$grupo);
		$resultado = $this->db->get('tbl_grupo_alumno');
		if($resultado->row_array()>0){
			return 1;
		}else{
			return 0;
		}
	}

	//ID DETALLE GRUPO ALUMNO
	public function maxIdDGA()
	{
		$id = $this->maxIdDGAModel();
		foreach ($id as $i) {
			if ($i['ID_DET_GA'] == null) {
				return 1;
			} else {
				return $i['ID_DET_GA'];
			}
		}
	}

	// MAX ID DETALLE GRUPO ALUMNO
	public function maxIdDGAModel()
	{
		$maxid = $this->db->query('SELECT MAX(ID_DET_GA + 1) as ID_DET_GA FROM `tbl_grupo_alumno`');
		return $maxid->result_array();
	}

}

?>
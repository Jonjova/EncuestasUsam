<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GrupoAlumnoModel extends CI_Model
{

	// GUARDAR GRUPO ALUMNO
	public function insertGrupoAlumno($grupo, $asignatura, $ciclo, $alumno)
	{
		$this->db->trans_start();
			//Insertar grupo
		date_default_timezone_set("America/El_Salvador");
		$data = array(
			//'ID_GRUPO_ALUMNO' => $this->maxIdGrupo(),
			'NOMBRE_GRUPO' => $grupo,
			'ID_ASIGNATURA' => $asignatura,
			'CICLO' => $ciclo,
			'USUARIO_CREA' => $this->session->userdata('ID_USUARIO'),
			'FECHA_CREA' => date('Y-m-d H:m:s')
			);
		$this->db->insert('TBL_GRUPO', $data);
			//Obtener id grupo
		$grupo_id = $this->db->insert_id();
		$result = array();
		$contador = $this->maxIdDGA();
		foreach($alumno AS $key => $val)
		{
			$result[] = array(
				'ID_DET_GA' => $contador,
				'ID_DET_GRUPO' => $grupo_id,
				'ID_DET_ALUMNO' => $_POST['ID_ALUMNO_GA'][$key]
				);
			$contador++;
		}      
			//insercion multiple en la tabla detalle
		$this->db->insert_batch('TBL_GRUPO_ALUMNO', $result);
		$this->db->trans_complete();
	}

	// AGREGAR ALUMNO A UN GRUPO
	public function agregarGrupoAlumno($grupo, $alumno)
	{
		$this->db->trans_start();
			//Insertar grupo
		date_default_timezone_set("America/El_Salvador");
			//Obtener id grupo
		$grupo_id = $grupo;
		$result = array();
		$contador = $this->maxIdDGA();
		foreach($alumno AS $key => $val)
		{
			$result[] = array(
				'ID_DET_GA' => $contador,
				'ID_DET_GRUPO' => $grupo_id,
				'ID_DET_ALUMNO' => $_POST['ID_ALUMNO_GA'][$key]
				);
			$contador++;
		}      
			//insercion multiple en la tabla detalle
		$this->db->insert_batch('TBL_GRUPO_ALUMNO', $result);
		$this->db->trans_complete();
	}
	
	//validar si existe un alumno en un grupo 
	public function validarGrupo($grupo)
	{
		$this->db->where('ID_DET_ALUMNO',$grupo);
		$resultado = $this->db->get('TBL_GRUPO_ALUMNO');
		if($resultado->row_array()>0){
			return 1;
		}
		else
		{
			return 0;
		}
	}

	//ID DETALLE GRUPO ALUMNO
	public function maxIdDGA()
	{
		$id = $this->maxIdDGAModel();
		foreach ($id as $i)
		{
			if ($i['ID_DET_GA'] == null)
			{
				return 1;
			}
			else
			{
				return $i['ID_DET_GA'];
			}
		}
	}

	// MAX ID DETALLE GRUPO ALUMNO
	public function maxIdDGAModel()
	{
		$maxid = $this->db->query('SELECT MAX(ID_DET_GA + 1) as ID_DET_GA FROM `TBL_GRUPO_ALUMNO`');
		return $maxid->result_array();
	}

	public function eliminarGrupoAlumnoModel($id)
	{
		$this->db->where('ID_DET_GA', $id);	
		$this->db->delete('TBL_GRUPO_ALUMNO');
	}

	public function mostrarGruposModel($where)
    {
        $query = $this->db->select('*')->from('VW_TBL_GRUPOS')->where($where)->get();
        return $query->result_array();
    }

	public function integrantesGrupoModel($where)
    {
        $query = $this->db->select('*')->from('VW_INTEGRANTES')->where($where)->get();
        return $query->result_array();
    }

}
?>
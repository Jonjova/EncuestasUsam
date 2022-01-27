<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ProyectoModel extends CI_Model
{

	// INSERTAR PROYECTO
	public function insertProyecto($data)
	{
		if ($this->db->insert('TBL_PROYECTO',$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function mostrarProyect($asignatura, $ciclo, $coordinador, $docente, $tipoUser, $facultad)
	{
		if ($tipoUser == 3 || $tipoUser == 4)
		{
			if ($asignatura == 0 && $ciclo == 0)
			{
				if ($coordinador != null)
				{
					$query = $this->db->query(
						"SELECT * FROM VW_PROYECTO
						WHERE ID_ASIGNATURA IN 
							(
								SELECT ID_ASIGNATURA FROM TBL_ASIGNATURA WHERE COORDINADOR = $coordinador
							);"
						);
				}
				if ($docente != null)
				{
					$query = $this->db->query(
						"SELECT * FROM VW_PROYECTO
						WHERE ID_ASIGNATURA IN 
							(
								SELECT ID_ASIGNATURA FROM TBL_DOCENTE_ASIGNATURA WHERE ID_DOCENTE = $docente
							);"
						);
				}
			}
			if ($asignatura != 0 && $ciclo == 0)
			{
				$query = $this->db->query(
					"SELECT * FROM VW_PROYECTO
					WHERE ID_ASIGNATURA = $asignatura"
					);
			}
			if ($ciclo != 0 && $asignatura == 0)
			{
				if ($coordinador != null)
				{
					$query = $this->db->query(
						"SELECT * FROM VW_PROYECTO
						WHERE ID_ASIGNATURA IN 
							(
								SELECT ID_ASIGNATURA FROM TBL_ASIGNATURA WHERE COORDINADOR = $coordinador
							) AND CICLO = $ciclo;"
						);
				}
				if ($docente != null)
				{
					$query = $this->db->query(
						"SELECT * FROM VW_PROYECTO
						WHERE ID_ASIGNATURA IN 
							(
								SELECT ID_ASIGNATURA FROM TBL_DOCENTE_ASIGNATURA WHERE ID_DOCENTE = $docente
							) AND CICLO = $ciclo;"
						);
				}
			}
			if ($asignatura != 0 && $ciclo != 0)
			{
				$query = $this->db->query(
					"SELECT * FROM VW_PROYECTO
					WHERE ID_ASIGNATURA = $asignatura AND CICLO = $ciclo"
					);
			}
		}
		else
		{
			if ($asignatura == 0 && $ciclo == 0 && $coordinador == 0 && $facultad == 0)
			{
				$query = $this->db->get('VW_PROYECTO');
			}
			if ($asignatura != 0 && $ciclo == 0)
			{
				$query = $this->db->query(
					"SELECT * FROM VW_PROYECTO
					WHERE ID_ASIGNATURA = $asignatura"
					);
			}
			if ($ciclo != 0 && $asignatura == 0)
			{
				$query = $this->db->query(
					"SELECT * FROM VW_PROYECTO
					WHERE CICLO = $ciclo"
					);
			}
			if ($asignatura != 0 && $ciclo != 0)
			{
				$query = $this->db->query(
					"SELECT * FROM VW_PROYECTO
					WHERE ID_ASIGNATURA = $asignatura AND CICLO = $ciclo"
					);
			}
			if ($coordinador != 0)
			{
				$query = $this->db->query(
					"SELECT * FROM VW_PROYECTO
					WHERE ID_ASIGNATURA IN 
						(
							SELECT ID_ASIGNATURA FROM TBL_ASIGNATURA WHERE COORDINADOR = $coordinador
						);"
					);
			}
			if ($facultad != 0)
			{
				$query = $this->db->query(
					"SELECT * FROM VW_PROYECTO
					WHERE FACULTAD = $facultad"
					);
			}
		}
		return $query->result_array();
	}

	// INFORMACION grupo alumno
    public function datosGrupoAlumnoModel($where)
    {
        $query = $this->db->select('*')->from('VW_INFO_GRUPO')->where($where)->get();
        return $query->result_array();
    }

	// CAMBIAR ESTADO PROYECTO
	public function cambiarEstadoModel($tablename, $data, $where)
	{
		$query = $this->db->update($tablename, $data, $where);
		return $query;
	}

}
?>
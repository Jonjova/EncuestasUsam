<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AsignaturaModel extends CI_Model 
{

    // INSERTAR ASIGNATURA
    public function crearAsignaturaModel($datosAsignatura)
    {
        if ($this->db->insert('TBL_ASIGNATURA', $datosAsignatura))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // ASIGNAR ASIGNATURA
    public function asignarAsignaturaModel($datosAsignatura)
    {
        if ($this->db->insert('TBL_DOCENTE_ASIGNATURA', $datosAsignatura))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // MOSTRAR ASIGNATURAS
    public function mostrarAsignaturaModel($idCoodinador)
    {
        $this->db->where('ID_COORDINADOR', $idCoodinador);
        $this->db->from('VW_TBL_ASIGNATURAS');
        $datos = $this->db->get();
        return $datos->result_array();
    }

    // MOSTRAR ASIGNATURAS ASIGNADAS
    public function mostrarDocenteAsignaturaModel($idCoodinador)
    {
        $this->db->where('COORDINADOR', $idCoodinador);
        $this->db->from('VW_TBL_DOCENTES_ASIGNATURAS');
        $datos = $this->db->get();
        return $datos->result_array();
    }

    // OBTENER ASIGNATURAS
    public function obtenerAsignaturaModel($where)
    {
        $query = $this->db->select('*')->from('TBL_ASIGNATURA')->where($where)->get();                         
        return $query->row_array();
    }

    // ACTUALIZAR ASIGNATURAS ASIGNADAS
    public function updateAsignaturaModel($tablename, $data, $where)
    {
        $query = $this->db->update($tablename, $data, $where);
        return $query;
    }

    // OBTENER ASIGNATURAS ASIGNADAS
    public function obtenerDocenteAsignaturaModel($where)
    {
        $query = $this->db->select('*')->from('TBL_DOCENTE_ASIGNATURA')->where($where)->get();                         
        return $query->row_array();
    }

    // ACTUALIZAR ASIGNATURAS ASIGNADAS
    public function updateDocenteAsignaturaModel($tablename, $data, $where)
    {
        $query = $this->db->update($tablename, $data, $where);
        return $query;
    }

}
?>
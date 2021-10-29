<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AsignaturaModel extends CI_Model 
{

    // INSERTAR ASIGNATURA
    public function crearAsignaturaModel($datosAsignatura)
    {
        if ($this->db->insert('tbl_asignatura', $datosAsignatura))
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
        if ($this->db->insert('tbl_docente_asignatura', $datosAsignatura))
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

}
?>
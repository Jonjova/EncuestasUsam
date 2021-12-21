<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfesionModel extends CI_Model 
{

    public function crearProfesionModel($datos)
    {
        if ($this->db->insert('CAT_PROFESION', $datos))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function mostrarProfesionModel()
    {
        $this->db->select('*');
		$this->db->from('CAT_PROFESION');
		$datos = $this->db->get();
		return $datos->result_array();
    }

    public function obtenerProfesionModel($where)
    {
        $query = $this->db->select('*')->from('CAT_PROFESION')->where($where)->get();                         
        return $query->row_array();
    }

    public function updateProfesionModel($tablename, $data, $where)
    {
        $query = $this->db->update($tablename, $data, $where);
        return $query;
    }

}
?>
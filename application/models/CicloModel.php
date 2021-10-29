<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CicloModel extends CI_Model
{

    // INSERTAR CICLO
    public function crearCicloModel($datos)
    {
        if ($this->db->insert('tbl_ciclo', $datos))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}
?>
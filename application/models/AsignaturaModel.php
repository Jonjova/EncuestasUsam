<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class AsignaturaModel extends CI_Model 
    {	
        // INSERTAR ASIGNATURA
        public function crearAsignaturaModel($datosAsignatura)
        {
            if ($this->db->insert('tbl_asignatura', $datosAsignatura)) {
                return true;
            }else{
                return false;
            }
        }

    }
?>
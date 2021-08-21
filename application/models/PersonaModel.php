<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class PersonaModel extends CI_Model 
    {	
        // OBTENER PERSONA
        public function mostrarPersonaModel($where)
        {
            $query = $this->db->select('*')->from('tbl_persona')->where($where)->get();                         
            return $query->row_array();
        }

        // ACTUALIZAR PERSONA
        public function updatePersonaModel($tablename, $data, $where)
        {
            $query = $this->db->update($tablename, $data, $where);
            return $query;
        }

        // VALIDAR PASSWORD
        public function findPassword($iduser, $password)
        {
            $query = $this->db->get_where('tbl_usuario', array('ID_USUARIO' => $iduser ,'PASSWORD' => $password), 1);
            if(!$query->result())
            {
                return false;
            }
            return $query->row();
        }

        // CAMBIAR CONTRASEÑA
        public function updatePasswordModel($tablename, $data, $where)
        {
            $query = $this->db->update($tablename, $data, $where);
            return $query;
        }

    }
?>
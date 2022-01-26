<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CuentaModel extends CI_Model 
{

    // VALIDAR PASSWORD
    public function findPassword($iduser, $password)
    {
        $query = $this->db->get_where('TBL_USUARIO', array('ID_USUARIO' => $iduser ,'PASSWORD' => $password), 1);
        if (!$query->result())
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
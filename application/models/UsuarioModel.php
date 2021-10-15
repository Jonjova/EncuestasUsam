<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioModel extends CI_Model 
{	
        
    // MOSTRAR USUARIOS
	public function mostrarUsuariosModel()
	{
		$this->db->select('*');
		$this->db->from('VW_USUARIO');
		$datos = $this->db->get();
		return $datos->result_array();
	}

	// OBTENER USUARIO
    public function datosUsuarioModel($where)
    {
        $query = $this->db->select('*')->from('VW_INFO_USUARIO')->where($where)->get();                         
        return $query->row_array();
    }

	// RESTABLECER CONTRASEÑA
	function resetPassModel($personaUsuario)
	{
		try {
			$this->db->reconnect();
			$sql = "CALL `SP_RESET_PASSWORD`(".$personaUsuario.");";
			$result = $this->db->query($sql, $personaUsuario);
			$this->db->close();

		} catch (Exception $e) {
			echo $e->getMessage();
		}
		return $result;
	}

}
?>
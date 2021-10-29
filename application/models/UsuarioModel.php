<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioModel extends CI_Model 
{	
    
	// INSERTAR USUARIO
	function crearUsuarioModel($datosUsuario)
	{
        try
		{
            $this->db->reconnect();
            $sql = "CALL `SP_CREAR_USUARIO`(
				".$datosUsuario['ID_PERSONA'].", 
				'".$datosUsuario['PRIMER_NOMBRE_PERSONA']."', 
				'".$datosUsuario['SEGUNDO_NOMBRE_PERSONA']."', 
				'".$datosUsuario['PRIMER_APELLIDO_PERSONA']."', 
				'".$datosUsuario['SEGUNDO_APELLIDO_PERSONA']."', 
				'".$datosUsuario['FECHA_NACIMIENTO']."', 
				".$datosUsuario['SEXO'].", 
				'".$datosUsuario['CORREO_INSTITUCIONAL']."', 
				'".$datosUsuario['CORREO_PERSONAL']."',  
				'".$datosUsuario['DUI']."', 
				'".$datosUsuario['NIT']."', 
				'".$datosUsuario['DIRECCION']."', 
				".$datosUsuario['DEPARTAMENTO'].", 
				'".$datosUsuario['TELEFONO_FIJO']."', 
				'".$datosUsuario['TELEFONO_MOVIL']."', 
				".$datosUsuario['PROFESION'].", 
				".$datosUsuario['ID_USUARIO'].", 
				'".$datosUsuario['NOMBRE_USUARIO']."', 
				'".$datosUsuario['PASSWORD']."', 
				".$datosUsuario['ID_TIPO_USUARIO'].", 
				".$datosUsuario['USUARIO_CREA'].");";
            $result = $this->db->query($sql, $datosUsuario);
            $this->db->close();

        }
		catch (Exception $e)
		{
            echo $e->getMessage();
        }
        return $result;
    }

    // MOSTRAR USUARIOS
	public function mostrarUsuariosModel()
	{
		$this->db->select('*');
		$this->db->from('VW_TABLA_USUARIO');
		$datos = $this->db->get();
		return $datos->result_array();
	}

	// OBTENER USUARIO
    public function datosUsuarioModel($where)
    {
        $query = $this->db->select('*')->from('VW_INFO_USUARIO')->where($where)->get();                         
        return $query->row_array();
    }

	// OBTENER PERSONA
    public function mostrarPersonaModel($where)
    {
        $query = $this->db->select('*')->from('tbl_persona')->where($where)->get();                         
        return $query->row_array();
    }

	// OBTENER USUARIO
    public function mostrarUserioModel($where)
    {
        $query = $this->db->select('*')->from('VW_UPDATE_USUARIO')->where($where)->get();                         
        return $query->row_array();
    }

    // ACTUALIZAR PERSONA
    public function updatePersonaModel($tablename, $data, $where)
    {
        $query = $this->db->update($tablename, $data, $where);
        return $query;
    }

	// RESTABLECER CONTRASEÑA
	function resetPassModel($personaUsuario)
	{
		try
		{
			$this->db->reconnect();
			$sql = "CALL `SP_RESET_PASSWORD`(".$personaUsuario.");";
			$result = $this->db->query($sql, $personaUsuario);
			$this->db->close();

		}
		catch (Exception $e)
		{
			echo $e->getMessage();
		}
		return $result;
	}

}
?>
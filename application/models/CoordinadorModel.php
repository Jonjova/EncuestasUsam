<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CoordinadorModel extends CI_Model 
{

	// INSERTAR COORDINADOR
	function crearCoordinadorModel($datosCoordinador)
	{
        try
		{
            $this->db->reconnect();
            $sql = "CALL `SP_CREAR_COORDINADOR`(
				".$datosCoordinador['ID_PERSONA'].", 
				'".$datosCoordinador['PRIMER_NOMBRE_PERSONA']."', 
				'".$datosCoordinador['SEGUNDO_NOMBRE_PERSONA']."', 
				'".$datosCoordinador['PRIMER_APELLIDO_PERSONA']."', 
				'".$datosCoordinador['SEGUNDO_APELLIDO_PERSONA']."', 
				'".$datosCoordinador['FECHA_NACIMIENTO']."', 
				".$datosCoordinador['SEXO'].", 
				'".$datosCoordinador['CORREO_INSTITUCIONAL']."', 
				'".$datosCoordinador['CORREO_PERSONAL']."',  
				'".$datosCoordinador['DUI']."', 
				'".$datosCoordinador['NIT']."', 
				'".$datosCoordinador['DIRECCION']."', 
				".$datosCoordinador['DEPARTAMENTO'].", 
				'".$datosCoordinador['TELEFONO_FIJO']."', 
				'".$datosCoordinador['TELEFONO_MOVIL']."', 
				".$datosCoordinador['PROFESION'].", 
				".$datosCoordinador['ID_COORDINADOR'].", 
				".$datosCoordinador['COORDINACION'].", 
				".$datosCoordinador['ID_USUARIO'].", 
				'".$datosCoordinador['NOMBRE_USUARIO']."', 
				'".$datosCoordinador['PASSWORD']."', 
				".$datosCoordinador['USUARIO_CREA'].");";
            $result = $this->db->query($sql, $datosCoordinador);
            $this->db->close();

        }
		catch (Exception $e)
		{
            echo $e->getMessage();
        }
        return $result;
    }
	
	// MOSTRAR COORDINADORES
	public function mostrarCoordinadorModel()
	{
		$this->db->select('*');
		$this->db->from('VW_TBL_COORDINADORES');
		$datos = $this->db->get();
		return $datos->result_array();
	}

	// INFORMACION COORDINADOR
    public function datosCoordinadorModel($where)
    {
        $query = $this->db->select('*')->from('VW_INFO_COORDINADOR')->where($where)->get();                         
        return $query->row_array();
    }

	// OBTENER COORDINADOR PARA ACTUALIZAR
    public function obtenerCoordinadorModel($where)
    {
        $query = $this->db->select('*')->from('VW_UPDATE_COORDINADOR')->where($where)->get();                         
        return $query->row_array();
    }

	// ACTUALIZAR COORDINADOR
	function updateCoordinadorModel($datosCoordinador)
	{
        try
		{
            $this->db->reconnect();
            $sql = "CALL `SP_ACTUALIZAR_COORDINADOR`(
				".$datosCoordinador['COD_PERSONA'].", 
				'".$datosCoordinador['PRIMER_NOMBRE']."', 
				'".$datosCoordinador['SEGUNDO_NOMBRE']."', 
				'".$datosCoordinador['PRIMER_APELLIDO']."', 
				'".$datosCoordinador['SEGUNDO_APELLIDO']."', 
				'".$datosCoordinador['FECHA_NACIMIENTO_PERSONA']."', 
				".$datosCoordinador['SEXO_PERSONA'].", 
				'".$datosCoordinador['CORREO_INSTITUCIONAL_PERSONA']."', 
				'".$datosCoordinador['CORREO_PERSONAL_PERSONA']."',  
				'".$datosCoordinador['DUI_PERSONA']."', 
				'".$datosCoordinador['NIT_PERSONA']."', 
				'".$datosCoordinador['DIRECCION_PERSONA']."', 
				".$datosCoordinador['DEPARTAMENTO_PERSONA'].", 
				'".$datosCoordinador['TELEFONO_FIJO_PERSONA']."', 
				'".$datosCoordinador['TELEFONO_MOVIL_PERSONA']."', 
				".$datosCoordinador['PROFESION_PERSONA'].", 
				".$datosCoordinador['COORDINACION_PERSONA'].");";
            $result = $this->db->query($sql, $datosCoordinador);
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
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DocenteModel extends CI_Model 
{	
	
	// INSERTAR DOCENTE
	function crearDocenteModel($datosDocente)
	{
        try
		{
            $this->db->reconnect();
            $sql = "CALL `SP_CREAR_DOCENTE`(
				".$datosDocente['ID_PERSONA'].", 
				'".$datosDocente['PRIMER_NOMBRE_PERSONA']."', 
				'".$datosDocente['SEGUNDO_NOMBRE_PERSONA']."', 
				'".$datosDocente['PRIMER_APELLIDO_PERSONA']."', 
				'".$datosDocente['SEGUNDO_APELLIDO_PERSONA']."', 
				'".$datosDocente['FECHA_NACIMIENTO']."', 
				".$datosDocente['SEXO'].", 
				'".$datosDocente['CORREO_INSTITUCIONAL']."', 
				'".$datosDocente['CORREO_PERSONAL']."',  
				'".$datosDocente['DUI']."', 
				'".$datosDocente['NIT']."', 
				'".$datosDocente['DIRECCION']."', 
				".$datosDocente['DEPARTAMENTO'].", 
				'".$datosDocente['TELEFONO_FIJO']."', 
				'".$datosDocente['TELEFONO_MOVIL']."', 
				".$datosDocente['PROFESION'].", 
				".$datosDocente['ID_DOCENTE'].", 
				".$datosDocente['COORDINADOR'].", 
				".$datosDocente['ID_USUARIO'].", 
				'".$datosDocente['NOMBRE_USUARIO']."', 
				'".$datosDocente['PASSWORD']."', 
				".$datosDocente['USUARIO_CREA'].");";
            $result = $this->db->query($sql, $datosDocente);
            $this->db->close();
        }
		catch (Exception $e)
		{
            echo $e->getMessage();
        }
        return $result;
    }

	// MOSTRAR DOCENTES
	public function mostrarDocentesModel($idCoodinador)
	{
		if ($idCoodinador != 0)
		{
			$this->db->where('COORDINADOR', $idCoodinador);
			$this->db->from('VW_TBL_DOCENTES');
			$datos = $this->db->get();
		}
		else
		{
			$datos = $this->db->get('VW_TBL_DOCENTES');
		}
		return $datos->result_array();
	}

	// INFORMACION DOCENTE
    public function datosDocenteModel($where)
    {
        $query = $this->db->select('*')->from('VW_INFO_DOCENTE')->where($where)->get();                         
        return $query->row_array();
    }

	// OBTENER ESTADO DOCENTES
	public function getEstadoModel($where)
	{
		$estatus = $this->db->query('SELECT `ESTADO_PERMISO` FROM `tbl_usuario` WHERE `ID_USUARIO` = '.$where.'');
		return $estatus->result_array();
	}

	// CAMBIAR ESTADO DOCENTES
	public function cambiarEstadoModel($tablename, $data, $where)
	{
		$query = $this->db->update($tablename, $data, $where);
		return $query;
	}

	// OBTENER DOCENTE
    public function mostrarDocenteModel($where)
    {
        $query = $this->db->select('*')->from('VW_UPDATE_DOCENTE')->where($where)->get();                         
        return $query->row_array();
    }

	// ACTUALIZAR DOCENTE
	function updateDocenteModel($datosDocente)
	{
        try
		{
            $this->db->reconnect();
            $sql = "CALL `SP_ACTUALIZAR_DOCENTE`(
				".$datosDocente['COD_PERSONA'].", 
				'".$datosDocente['PRIMER_NOMBRE']."', 
				'".$datosDocente['SEGUNDO_NOMBRE']."', 
				'".$datosDocente['PRIMER_APELLIDO']."', 
				'".$datosDocente['SEGUNDO_APELLIDO']."', 
				'".$datosDocente['FECHA_NACIMIENTO_PERSONA']."', 
				".$datosDocente['SEXO_PERSONA'].", 
				'".$datosDocente['CORREO_INSTITUCIONAL_PERSONA']."', 
				'".$datosDocente['CORREO_PERSONAL_PERSONA']."',  
				'".$datosDocente['DUI_PERSONA']."', 
				'".$datosDocente['NIT_PERSONA']."', 
				'".$datosDocente['DIRECCION_PERSONA']."', 
				".$datosDocente['DEPARTAMENTO_PERSONA'].", 
				'".$datosDocente['TELEFONO_FIJO_PERSONA']."', 
				'".$datosDocente['TELEFONO_MOVIL_PERSONA']."', 
				".$datosDocente['PROFESION_PERSONA'].", 
				".$datosDocente['COORDINADOR_PERSONA'].", 
				'".$datosDocente['USUARIO_PERSONA']."', 
				'".$datosDocente['PASSWORD_PERSONA']."');";
            $result = $this->db->query($sql, $datosDocente);
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
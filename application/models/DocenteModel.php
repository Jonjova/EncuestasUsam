<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DocenteModel extends CI_Model 
{	
	// INSERTAR DOCENTE
	function crearDocenteModel($datosDocente)
	{
        try {
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
				".$datosDocente['ID_DOCENTE'].", 
				".$datosDocente['PROFESION'].", 
				".$datosDocente['COORDINADOR'].", 
				".$datosDocente['ID_USUARIO'].", 
				'".$datosDocente['NOMBRE_USUARIO']."', 
				'".$datosDocente['PASSWORD']."');";
            $result = $this->db->query($sql, $datosDocente);
            $this->db->close();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

	// MOSTRAR DOCENTES
	public function mostrarDocentesModel($idCoodinador)
	{
		if ($idCoodinador != 0)
		{
			$datos = $this->db->query('SELECT * FROM VW_DOCENTES WHERE COORDINADOR = '.$idCoodinador.'');
		}
		else
		{
			$this->db->select('*');
			$this->db->from('VW_DOCENTES');
			$datos = $this->db->get();
		}
		return $datos->result_array();
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

}
?>
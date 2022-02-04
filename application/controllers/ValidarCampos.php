<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ValidarCampos extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ValidarCamposModel', 'modelValidar', true);
	}

	/****************************************************************************
                        	VALIDAR CAMPOS PARA INSERTAR
	****************************************************************************/

	// VALIDAR PROFESION EXISTENTE
	public function validarProf()
	{ 
		$valor = $this->input->post('NOMBRE_PROFESION');
		$resultado = $this->modelValidar->findProf($valor);
		if ($resultado)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	// VALIDAR DUI EXISTENTE
	public function validarDUI()
	{ 
		$valor = $this->input->post('DUI');
		$resultado = $this->modelValidar->findDUI($valor);
		if ($resultado)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	// VALIDAR NIT EXISTENTE
	public function validarNIT()
	{ 
		$valor = $this->input->post('NIT');
		$resultado = $this->modelValidar->findNIT($valor);
		if ($resultado)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	// VALIDAR TELEFONO FIJO EXISTENTE
	public function validarTelFijo()
	{ 
		$valor = $this->input->post('TELEFONO_FIJO');
		$resultado = $this->modelValidar->findTelFijo($valor);
		if ($resultado)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	// VALIDAR TELEFONO MOVIL EXISTENTE
	public function validarTelMovil()
	{ 
		$valor = $this->input->post('TELEFONO_MOVIL');
		$resultado = $this->modelValidar->findTelMovil($valor);
		if ($resultado)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	// VALIDAR CORREO PERSONAL EXISTENTE
	public function validarEmail()
	{ 
		$valor = $this->input->post('CORREO_PERSONAL');
		$resultado = $this->modelValidar->findEmail($valor);
		if ($resultado)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	// VALIDAR CORREO INSTITUCIONAL EXISTENTE
	public function validarEmailUSAM()
	{ 
		$valor = $this->input->post('CORREO_INSTITUCIONAL');
		$resultado = $this->modelValidar->findEmailUSAM($valor);
		if ($resultado)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	// VALIDAR CODIGO ASIGNATURA EXISTENTE
	public function validarCodAsignatura()
	{ 
		$valor = $this->input->post('CODIGO_ASIGNATURA');
		$resultado = $this->modelValidar->findCodAsignatura($valor);
		if ($resultado)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	// VALIDAR CARNET EXISTENTE
	public function validarCarnet()
	{ 
		$valor = $this->input->post('CARNET');
		$resultado = $this->modelValidar->findCarnet($valor);
		if ($resultado)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	// CARGAR DATOS DE ALUMNO
	public function obtenerInfoAlumno()
	{
		$valor = $this->input->post('CARNET');
		$resultado = $this->modelValidar->obtenerInfoAlumnoModel($valor);
		echo json_encode($resultado);
	}

	// VALIDAR CICLO EXISTENTE
	public function validarCiclo()
	{
		$valor = $this->input->post('COD_CICLO');
		$resultado = $this->modelValidar->validarCicloModel($valor);
		if ($resultado)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	/****************************************************************************
                        	VALIDAR CAMPOS PARA ACTUALIZAR
	****************************************************************************/

	// VALIDAR CAMBIAR PROFESION EXISTENTE
	public function cambiarProf($id)
	{ 
		$valor = $this->input->post('NOMBRE_PROFESION_UPDATE');
		$resultado = $this->modelValidar->cambiarProfModel($valor, $id);
		if ($resultado)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	// VALIDAR CAMBIAR DUI EXISTENTE
	public function cambiarDUI($idPersona)
	{ 
		$valor = $this->input->post('DUI_UPDATE');
		$resultado = $this->modelValidar->cambiarDUIModel($valor, $idPersona);
		if ($resultado)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	// VALIDAR CAMBIAR NIT EXISTENTE
	public function cambiarNIT($idPersona)
	{ 
		$valor = $this->input->post('NIT_UPDATE');
		$resultado = $this->modelValidar->cambiarNITModel($valor, $idPersona);
		if ($resultado)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	// VALIDAR CAMBIAR TELEFONO FIJO EXISTENTE
	public function cambiarTelFijo($idPersona)
	{ 
		$valor = $this->input->post('TELEFONO_FIJO_UPDATE');
		$resultado = $this->modelValidar->cambiarTelFijoModel($valor, $idPersona);
		if ($resultado)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	// VALIDAR CAMBIAR TELEFONO MOVIL EXISTENTE
	public function cambiarTelMovil($idPersona)
	{ 
		$valor = $this->input->post('TELEFONO_MOVIL_UPDATE');
		$resultado = $this->modelValidar->cambiarTelMovilModel($valor, $idPersona);
		if ($resultado)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	// VALIDAR CAMBIAR CORREO PERSONAL EXISTENTE
	public function cambiarEmail($idPersona)
	{ 
		$valor = $this->input->post('CORREO_PERSONAL_UPDATE');
		$resultado = $this->modelValidar->cambiarEmailModel($valor, $idPersona);
		if ($resultado)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	// VALIDAR CAMBIAR CORREO INSTITUCIONAL EXISTENTE
	public function cambiarEmailUSAM($idPersona)
	{ 
		$valor = $this->input->post('CORREO_INSTITUCIONAL_UPDATE');
		$resultado = $this->modelValidar->cambiarEmailUSAMModel($valor, $idPersona);
		if ($resultado)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	// VALIDAR CODIGO ASIGNATURA EXISTENTE
	public function cambiarCodAsignatura($id)
	{ 
		$valor = $this->input->post('CODIGO_ASIGNATURA_UPDATE');
		$resultado = $this->modelValidar->cambiarCodAsignaturaModel($valor, $id);
		if ($resultado)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	// VALIDAR CARNET EXISTENTE
	public function cambiarCarnet($id)
	{ 
		$valor = $this->input->post('CARNET_UPDATE');
		$resultado = $this->modelValidar->cambiarCarnetModel($valor, $id);
		if ($resultado)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	
}
?>
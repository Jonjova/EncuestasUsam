<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ValidarCampos extends CI_Controller
{
	// CONSTRUCTOR PARA LLAMAR AL MODELO
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ValidarCamposModel', 'modelValidar', true);
	}

	// VALIDAR DUI
	public function validarDUI()
	{ 
		$valor = $this->input->post('DUI');
		$resultado = $this->modelValidar->findDUI($valor);
		if($resultado) {
		   echo 1;
		} else { 
		   echo 0;
		}
	}

	// VALIDAR NIT
	public function validarNIT()
	{ 
		$valor = $this->input->post('NIT');
		$resultado = $this->modelValidar->findNIT($valor);
		if($resultado) {
		   echo 1;
		} else { 
		   echo 0;
		}
	}

	// VALIDAR TELEFONO FIJO
	public function validarTelFijo()
	{ 
		$valor = $this->input->post('TELEFONO_FIJO');
		$resultado = $this->modelValidar->findTelFijo($valor);
		if($resultado) {
		   echo 1;
		} else { 
		   echo 0;
		}
	}

	// VALIDAR TELEFONO MOVIL
	public function validarTelMovil()
	{ 
		$valor = $this->input->post('TELEFONO_MOVIL');
		$resultado = $this->modelValidar->findTelMovil($valor);
		if($resultado) {
		   echo 1;
		} else { 
		   echo 0;
		}
	}

	// VALIDAR CORREO INSTITUCIONAL
	public function validarEmailUSAM()
	{ 
		$valor = $this->input->post('CORREO_INSTITUCIONAL');
		$resultado = $this->modelValidar->findEmailUSAM($valor);
		if($resultado) {
		   echo 1;
		} else { 
		   echo 0;
		}
	}

	// VALIDAR CORREO PERSONAL
	public function validarEmail()
	{ 
		$valor = $this->input->post('CORREO_PERSONAL');
		$resultado = $this->modelValidar->findEmail($valor);
		if($resultado) {
		   echo 1;
		} else { 
		   echo 0;
		}
	}
	
}
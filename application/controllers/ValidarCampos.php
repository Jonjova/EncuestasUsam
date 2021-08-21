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
			if($resultado)
			{
				echo 1;
			}
		}

		// VALIDAR NIT
		public function validarNIT()
		{ 
			$valor = $this->input->post('NIT');
			$resultado = $this->modelValidar->findNIT($valor);
			if($resultado)
			{
				echo 1;
			}
		}

		// VALIDAR TELEFONO FIJO
		public function validarTelFijo()
		{ 
			$valor = $this->input->post('TELEFONO_FIJO');
			$resultado = $this->modelValidar->findTelFijo($valor);
			if($resultado)
			{
				echo 1;
			}
		}

		// VALIDAR TELEFONO MOVIL
		public function validarTelMovil()
		{ 
			$valor = $this->input->post('TELEFONO_MOVIL');
			$resultado = $this->modelValidar->findTelMovil($valor);
			if($resultado)
			{
				echo 1;
			}
		}

		// VALIDAR CORREO PERSONAL
		public function validarEmail()
		{ 
			$valor = $this->input->post('CORREO_PERSONAL');
			$resultado = $this->modelValidar->findEmail($valor);
			if($resultado)
			{
				echo 1;
			}
		}

		// VALIDAR CORREO INSTITUCIONAL
		public function validarEmailUSAM()
		{ 
			$valor = $this->input->post('CORREO_INSTITUCIONAL');
			$resultado = $this->modelValidar->findEmailUSAM($valor);
			if($resultado)
			{
				echo 1;
			}
		}

		// VALIDAR CODIGO ASIGNATURA
		public function validarCodAsignatura()
		{ 
			$valor = $this->input->post('CODIGO_ASIGNATURA');
			$resultado = $this->modelValidar->findCodAsignatura($valor);
			if($resultado)
			{
				echo 1;
			}
		}

		// VALIDAR CAMBIAR TELEFONO FIJO
		public function cambiarTelFijo()
		{ 
			$telefono = $this->input->post('TELEFONO_FIJO');
			$idPersona = $_SESSION['PERSONA'];
			$resultado = $this->modelValidar->cambiarTelFijoModel($telefono, $idPersona);
			if(!$resultado)
			{
				echo 1;
			}
			else
			{
				echo 0;
			}
		}

		// VALIDAR CAMBIAR TELEFONO MOVIL
		public function cambiarTelMovil()
		{ 
			$telefono = $this->input->post('TELEFONO_MOVIL');
			$idPersona = $_SESSION['PERSONA'];
			$resultado = $this->modelValidar->cambiarTelMovilModel($telefono, $idPersona);
			if(!$resultado)
			{
				echo 1;
			}
			else
			{
				echo 0;
			}
		}

		// VALIDAR CAMBIAR CORREO PERSONAL
		public function cambiarEmail()
		{ 
			$email = $this->input->post('CORREO_PERSONAL');
			$idPersona = $_SESSION['PERSONA'];
			$resultado = $this->modelValidar->cambiarEmailModel($email, $idPersona);
			if(!$resultado)
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
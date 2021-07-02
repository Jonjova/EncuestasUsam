<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coordinador extends CI_Controller {

	// CONSTRUCTOR PARA LLAMAR AL MODELO
	public function __construct()
	{
		parent::__construct();
		// la "c" es un alias para poder hacer mas corto el nombre del modelo 
		$this->load->model('CoordinadorModel','modelCoordinador',true);
	}

	// CARGAR VISTA
	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('VistasCoordinador/insertar');
		$this->load->view('layout/footer');
	}

	// ID PERSONA
	public function maxPersona()
	{
		$id = $this->modelCoordinador->maxPersonaModel();
		foreach ($id as $i) {
			if ($i['ID_PERSONA'] == null){
				echo "<input type='hidden' name='ID_PERSONA' id='ID_PERSONA' value='1'>";
			} else {
				echo "<input type='hidden' name='ID_PERSONA' id='ID_PERSONA' value='".$i['ID_PERSONA']."'>";
			}
		}
	}

	// ID COORDINADOR
	public function maxCoordinador()
	{
		$datos = $this->modelCoordinador->maxCoordinadorModel();
		foreach ($datos as $i) {
			if ($i['ID_COORDINADOR'] == null){
				echo "<input type='hidden' name='ID_COORDINADOR' id='ID_COORDINADOR' value='1'>";
			} else {
				echo "<input type='hidden' name='ID_COORDINADOR' id='ID_COORDINADOR' value='".$i['ID_COORDINADOR']."'>";
			}
		}
	}

	// ID USUARIO
	public function maxUsuario()
	{
		$datos = $this->modelCoordinador->maxUsuarioModel();
		foreach ($datos as $i) {
			if ($i['ID_USUARIO'] == null){
				echo "<input type='hidden' name='ID_USUARIO' id='ID_USUARIO' value='1'>";
			} else {
				echo "<input type='hidden' name='ID_USUARIO' id='ID_USUARIO' value='".$i['ID_USUARIO']."'>";
			}
		}
	}

	// LLENAR SELECT SEXO
	public function dropSexo()
	{
		$datos = $this->modelCoordinador->dropSexoModel();
		echo "<option selected disabled value=''>Seleccione...</option>";
		foreach ($datos as $i) {
			echo "<option value='".$i['ID_SEXO']."'>".$i['NOMBRE_SEXO']."</option>";
		}
	}

	// LLENAR SELECT DEPARTAMENTO
	public function dropDepartamento()
	{
		$datos = $this->modelCoordinador->dropDepartamentoModel();
		echo "<option selected disabled value=''>Seleccione...</option>";
		foreach ($datos as $i) {
			echo "<option value='".$i['ID_DEPARTAMENTO']."'>".$i['NOMBRE_DEPARTAMENTO']."</option>";
		}
	}

	// LLENAR SELECT PROFESION
	public function dropProfesion()
	{
		$datos = $this->modelCoordinador->dropProfesionModel();
		echo "<option selected disabled value=''>Seleccione...</option>";
		foreach ($datos as $i) {
			echo "<option value='".$i['ID_PROFESION']."'>".$i['NOMBRE_PROFESION']."</option>";
		}
	}

	// LLENAR SELECT COORDINACION
	public function dropCoordinacion()
	{
		$datos = $this->modelCoordinador->dropCoordinacionModel();
		echo "<option selected disabled value=''>Seleccione...</option>";
		foreach ($datos as $i) {
			echo "<option value='".$i['ID_COORDINACION']."'>".$i['NOMBRE_COORDINACION']."</option>";
		}
	}

	// VALIDAR DUI
	public function validarDUI() { 
		$valor = $this->input->post('DUI');
		$resultado = $this->modelCoordinador->findDUI($valor);
		if($resultado) {
		   echo 1;
		} else { 
		   echo 0;
		}
	}

	// VALIDAR NIT
	public function validarNIT() { 
		$valor = $this->input->post('NIT');
		$resultado = $this->modelCoordinador->findNIT($valor);
		if($resultado) {
		   echo 1;
		} else { 
		   echo 0;
		}
	}

	// VALIDAR TELEFONO FIJO
	public function validarTelFijo() { 
		$valor = $this->input->post('TELEFONO_FIJO');
		$resultado = $this->modelCoordinador->findTelFijo($valor);
		if($resultado) {
		   echo 1;
		} else { 
		   echo 0;
		}
	}

	// VALIDAR TELEFONO MOVIL
	public function validarTelMovil() { 
		$valor = $this->input->post('TELEFONO_MOVIL');
		$resultado = $this->modelCoordinador->findTelMovil($valor);
		if($resultado) {
		   echo 1;
		} else { 
		   echo 0;
		}
	}

	// VALIDAR CORREO INSTITUCIONAL
	public function validarEmailUSAM() { 
		$valor = $this->input->post('CORREO_INSTITUCIONAL');
		$resultado = $this->modelCoordinador->findEmailUSAM($valor);
		if($resultado) {
		   echo 1;
		} else { 
		   echo 0;
		}
	}

	// VALIDAR CORREO PERSONAL
	public function validarEmail() { 
		$valor = $this->input->post('CORREO_PERSONAL');
		$resultado = $this->modelCoordinador->findEmail($valor);
		if($resultado) {
		   echo 1;
		} else { 
		   echo 0;
		}
	}

	// METODO GUARDAR
	public function Guardar()
	{
		$datosPersona = array(
			'ID_PERSONA' => $this->input->post('ID_PERSONA'),
			'PRIMER_NOMBRE_PERSONA' => $this->input->post('PRIMER_NOMBRE_PERSONA'),
			'SEGUNDO_NOMBRE_PERSONA' => $this->input->post('SEGUNDO_NOMBRE_PERSONA'),
			'PRIMER_APELLIDO_PERSONA' => $this->input->post('PRIMER_APELLIDO_PERSONA'),
			'SEGUNDO_APELLIDO_PERSONA' => $this->input->post('SEGUNDO_APELLIDO_PERSONA'),
			'SEXO' => $this->input->post('SEXO'),
			'CORREO_INSTITUCIONAL' => $this->input->post('CORREO_INSTITUCIONAL'),
			'CORREO_PERSONAL' => $this->input->post('CORREO_PERSONAL'),
			'DIRECCION' => $this->input->post('DIRECCION'),
			'DEPARTAMENTO' => $this->input->post('DEPARTAMENTO'),
			'DUI' => $this->input->post('DUI'),
			'NIT' => $this->input->post('NIT'),
			'TELEFONO_FIJO' => $this->input->post('TELEFONO_FIJO'),
			'TELEFONO_MOVIL' => $this->input->post('TELEFONO_MOVIL')
		);

		$datosCoordinador = array(
			'ID_COORDINADOR' => $this->input->post('ID_COORDINADOR'),
			'PERSONA' => $this->input->post('ID_PERSONA'),
			'PROFESION' => $this->input->post('PROFESION'),
			'COORDINACION' => $this->input->post('COORDINACION')
		);

		$datosUsuario = array(
			'ID_USUARIO' => $this->input->post('ID_USUARIO'),
			'NOMBRE_USUARIO' => $this->input->post('NOMBRE_USUARIO'),
			'PASSWORD' => sha1($this->input->post('PASSWORD')),
			'ESTADO_PERMISO' => false,
			'ID_TIPO_USUARIO' => 3,
			'ID_PERSONA_USUARIO' => $this->input->post('ID_PERSONA')
		);

		$insert_persona = $this->modelCoordinador->insertarPersona($datosPersona);
		$insert_coordinador = $this->modelCoordinador->insertarCoordinador($datosCoordinador);
		$insert_usuario = $this->modelCoordinador->insertarUsuario($datosUsuario);
		
		if ($insert_persona == TRUE && $insert_coordinador == TRUE && $insert_usuario == TRUE)
		{
			echo "true";
		}
	}
}
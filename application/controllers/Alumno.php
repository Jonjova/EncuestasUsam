<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumno extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AlumnoModel','am',true);
	}

	public function Guardar()
	{
		$datosPersona = array(
			'PRIMER_NOMBRE_PERSONA' => $this->input->post('PRIMER_NOMBRE_PERSONA_A'),
			'SEGUNDO_NOMBRE_PERSONA' => $this->input->post('SEGUNDO_NOMBRE_PERSONA_A'),
			'PRIMER_APELLIDO_PERSONA' => $this->input->post('PRIMER_APELLIDO_PERSONA_A'),
			'SEGUNDO_APELLIDO_PERSONA' => $this->input->post('SEGUNDO_APELLIDO_PERSONA_A'),
			'SEXO' => $this->input->post('SEXO_A'),
			'CORREO_INSTITUCIONAL' => $this->input->post('CORREO_INSTITUCIONAL_A'),
			'CORREO_PERSONAL' => $this->input->post('CORREO_PERSONAL_A'),
			'DIRECCION' => $this->input->post('DIRECCION_A'),
			'DEPARTAMENTO' => $this->input->post('DEPARTAMENTO_A'),
			'DUI' => $this->input->post('DUI_A'),
			'NIT' => $this->input->post('NIT_A'),
			'TELEFONO_FIJO' => $this->input->post('TELEFONO_FIJO_A'),
			'TELEFONO_MOVIL' => $this->input->post('TELEFONO_MOVIL_A')
			);

		$datosAlumno = array( 
			'CARNET' => $this->input->post('CARNET_A'),
			'PERSONA' => $this->input->post('ID_PERSONA'),
			'CARRERA' => $this->input->post('CARRERA_A')
			);
		//Datos de tabla  "Persona"
		$insertPersona = $this->am->insertPerson($datosPersona);
		//Datos de tabla  "Alumnos"
		$insertAlumno = $this->am->insertAlum($datosAlumno);
		if($insertPersona == TRUE && $insertAlumno == TRUE )
		{
			echo "true";
		}
	}

	//LLenar select de Sexo
	public function Sexo()
	{
		$datos = $this->am->obtSexo();
		echo "<option selected disabled value=''>Seleccionar...</option>";
		foreach ($datos as $ti) {
			echo "<option value='".$ti['ID_SEXO']."'>".$ti['NOMBRE_SEXO']."</option>";
		}
		echo json_encode($datos);
	}

	//LLenar select de departamento
	public function Departamento()
	{
		$datos = $this->am->obtDepartamento();
		echo "<option selected disabled value=''>Seleccionar...</option>";
		foreach ($datos as $ti) {
			echo "<option value='".$ti['ID_DEPARTAMENTO']."'>".$ti['NOMBRE_DEPARTAMENTO']."</option>";
		}
		echo json_encode($datos);
	}

	//LLenar select careera 
	public function Carrera()
	{
		$datos = $this->am->obtCarrer();
		echo "<option selected disabled value=''>Seleccionar...</option>";
		foreach ($datos as $ti) {
			echo "<option value='".$ti['ID_CARRERA']."'>".$ti['NOMBRE_CARRERA']."</option>";
		}
		echo json_encode($datos);
	}

	//Validar correo institucional
	public function validarCorreoInstitucional(){
		
		$ci = $this->input->post('CORREO_INSTITUCIONAL_A');
		echo $this->am->validarCI($ci);
	}
	//Validar correo personal
	public function validarCorreoPersonal(){
		
		$ci = $this->input->post('CORREO_PERSONAL_A');
		echo $this->am->validarCP($ci);
	}

	//Validar carnet
	public function validarCarnet(){
		
		$ci = $this->input->post('CARNET_A');
		echo $this->am->validarC($ci);
	}

	//Validar dui
	public function validarDUI(){
		
		$ci = $this->input->post('DUI_A');
		echo $this->am->validarD($ci);
	}

	//Validar nit
	public function validarNIT(){
		
		$ci = $this->input->post('NIT_A');
		echo $this->am->validarN($ci);
	}
}
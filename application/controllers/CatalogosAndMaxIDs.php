<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CatalogosAndMaxIDs extends CI_Controller
{
	// CONSTRUCTOR PARA LLAMAR AL MODELO
	public function __construct()
	{
		parent::__construct();
		$this->load->model('CatalogosAndMaxIDsModel', 'modelCatalogos',true);
	}

	// ID PERSONA
	public function maxPersona()
	{
		$id = $this->modelCatalogos->maxPersonaModel();
		foreach ($id as $i) {
			if ($i['ID_PERSONA'] == null) {
				echo "<input type='hidden' name='ID_PERSONA' id='ID_PERSONA' value='1'>";
			} else {
				echo "<input type='hidden' name='ID_PERSONA' id='ID_PERSONA' value='".$i['ID_PERSONA']."'>";
			}
		}
	}

	// ID COORDINADOR
	public function maxCoordinador()
	{
		$datos = $this->modelCatalogos->maxCoordinadorModel();
		foreach ($datos as $i) {
			if ($i['ID_COORDINADOR'] == null) {
				echo "<input type='hidden' name='ID_COORDINADOR' id='ID_COORDINADOR' value='1'>";
			} else {
				echo "<input type='hidden' name='ID_COORDINADOR' id='ID_COORDINADOR' value='".$i['ID_COORDINADOR']."'>";
			}
		}
	}

	// ID DOCENTE
	public function maxDocente()
	{
		$datos = $this->modelCatalogos->maxDocenteModel();
		foreach ($datos as $i) {
			if ($i['ID_DOCENTE'] == null) {
				echo "<input type='hidden' name='ID_DOCENTE' id='ID_DOCENTE' value='1'>";
			} else {
				echo "<input type='hidden' name='ID_DOCENTE' id='ID_DOCENTE' value='".$i['ID_DOCENTE']."'>";
			}
		}
	}

	// ID USUARIO
	public function maxUsuario()
	{
		$datos = $this->modelCatalogos->maxUsuarioModel();
		foreach ($datos as $i) {
			if ($i['ID_USUARIO'] == null) {
				echo "<input type='hidden' name='ID_USUARIO' id='ID_USUARIO' value='1'>";
			} else {
				echo "<input type='hidden' name='ID_USUARIO' id='ID_USUARIO' value='".$i['ID_USUARIO']."'>";
			}
		}
	}

	// LLENAR SELECT SEXO
	public function dropSexo()
	{
		$datos = $this->modelCatalogos->dropSexoModel();
		echo "<option selected disabled value=''>Seleccione...</option>";
		foreach ($datos as $i) {
			echo "<option value='".$i['ID_SEXO']."'>".$i['NOMBRE_SEXO']."</option>";
		}
	}

	// LLENAR SELECT DEPARTAMENTO
	public function dropDepartamento()
	{
		$datos = $this->modelCatalogos->dropDepartamentoModel();
		echo "<option selected disabled value=''>Seleccione...</option>";
		foreach ($datos as $i) {
			echo "<option value='".$i['ID_DEPARTAMENTO']."'>".$i['NOMBRE_DEPARTAMENTO']."</option>";
		}
	}

	// LLENAR SELECT PROFESION
	public function dropProfesion()
	{
		$datos = $this->modelCatalogos->dropProfesionModel();
		echo "<option selected disabled value=''>Seleccione...</option>";
		foreach ($datos as $i) {
			echo "<option value='".$i['ID_PROFESION']."'>".$i['NOMBRE_PROFESION']."</option>";
		}
	}

	// LLENAR SELECT COORDINACION
	public function dropCoordinacion()
	{
		$datos = $this->modelCatalogos->dropCoordinacionModel();
		echo "<option selected disabled value=''>Seleccione...</option>";
		foreach ($datos as $i) {
			echo "<option value='".$i['ID_COORDINACION']."'>".$i['NOMBRE_COORDINACION']."</option>";
		}
	}
	
}
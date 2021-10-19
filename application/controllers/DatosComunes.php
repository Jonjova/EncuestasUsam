<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class DatosComunes extends CI_Controller
	{
		// CONSTRUCTOR PARA LLAMAR AL MODELO
		public function __construct()
		{
			parent::__construct();
			$this->load->model('DatosComunesModel', 'modelDatos', true);
		}

		// LLENAR SELECT SEXO
		public function dropSexo()
		{
			$datos = $this->modelDatos->dropSexoModel();
			echo "<option selected disabled value=''>Seleccione...</option>";
			foreach ($datos as $i) {
				echo "<option value='".$i['ID_SEXO']."'>".$i['NOMBRE_SEXO']."</option>";
			}
		}

		// LLENAR SELECT DEPARTAMENTO
		public function dropDepartamento()
		{
			$datos = $this->modelDatos->dropDepartamentoModel();
			echo "<option selected disabled value=''>Seleccione...</option>";
			foreach ($datos as $i) {
				echo "<option value='".$i['ID_DEPARTAMENTO']."'>".$i['NOMBRE_DEPARTAMENTO']."</option>";
			}
		}

		// LLENAR SELECT PROFESION
		public function dropProfesion()
		{
			$datos = $this->modelDatos->dropProfesionModel();
			echo "<option selected disabled value=''>Seleccione...</option>";
			foreach ($datos as $i) {
				echo "<option value='".$i['ID_PROFESION']."'>".$i['NOMBRE_PROFESION']."</option>";
			}
		}

		// LLENAR SELECT COORDINACION
		public function dropCoordinacion()
		{
			$datos = $this->modelDatos->dropCoordinacionModel();
			echo "<option selected disabled value=''>Seleccione...</option>";
			foreach ($datos as $i) {
				echo "<option value='".$i['ID_COORDINACION']."'>".$i['NOMBRE_COORDINACION']."</option>";
			}
		}

		// LLENAR SELECT COORDINADOR
		public function dropCoordinador()
		{
			$datos = $this->modelDatos->dropCoordinadorModel();
			echo "<option selected disabled value=''>Seleccione...</option>";
			foreach ($datos as $i) {
				echo "<option value='".$i['ID_COORDINADOR']."'>".$i['COORDINADOR'].", ".$i['NOMBRE_COORDINACION']."</option>";
			}
		}

		// LLENAR SELECT ASIGNATURA
		public function dropAsignatura()
		{
			$datos = $this->modelDatos->dropAsignaturaModel($_SESSION['COORDINADOR']);
			echo "<option selected disabled value=''>Seleccione...</option>";
			foreach ($datos as $i) {
				echo "<option value='".$i['ID_ASIGNATURA']."'>".$i['CODIGO_ASIGNATURA'].", ".$i['NOMBRE_ASIGNATURA']."</option>";
			}
		}

		// LLENAR SELECT DOCENTE
		public function dropDocente()
		{
			$datos = $this->modelDatos->dropDocenteModel($_SESSION['COORDINADOR']);
			echo "<option selected disabled value=''>Seleccione...</option>";
			foreach ($datos as $i) {
				echo "<option value='".$i['ID_DOCENTE']."'>".$i['DOCENTE']."</option>";
			}
		}
		
	}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DatosComunes extends CI_Controller
{

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
		foreach ($datos as $i)
		{
			echo "<option value='".$i['ID_SEXO']."'>".$i['NOMBRE_SEXO']."</option>";
		}
	}

	// LLENAR SELECT DEPARTAMENTO
	public function dropDepartamento()
	{
		$datos = $this->modelDatos->dropDepartamentoModel();
		echo "<option selected disabled value=''>Seleccione...</option>";
		foreach ($datos as $i)
		{
			echo "<option value='".$i['ID_DEPARTAMENTO']."'>".$i['NOMBRE_DEPARTAMENTO']."</option>";
		}
	}

	// LLENAR SELECT PROFESION
	public function dropProfesion()
	{
		$datos = $this->modelDatos->dropProfesionModel();
		echo "<option selected disabled value=''>Seleccione...</option>";
		foreach ($datos as $i)
		{
			echo "<option value='".$i['ID_PROFESION']."'>".$i['NOMBRE_PROFESION']."</option>";
		}
	}

	// LLENAR SELECT ROL
	public function dropRol()
	{
		$datos = $this->modelDatos->dropRolModel();
		echo "<option selected disabled value=''>Seleccione...</option>";
		foreach ($datos as $i)
		{
			echo "<option value='".$i['ID_ROL']."'>".$i['NOMBRE_ROL']."</option>";
		}
	}

	// LLENAR SELECT COORDINADOR
	public function dropCoordinador()
	{
		$datos = $this->modelDatos->dropCoordinadorModel();
		echo "<option selected disabled value=''>Seleccione...</option>";
		foreach ($datos as $i)
		{
			echo "<option value='".$i['ID_COORDINADOR']."'>".$i['COORDINADOR'].", ".$i['NOMBRE_COORDINACION']."</option>";
		}
	}

	// LLENAR SELECT COORDINADOR
	public function dropCoordinadores()
	{
		$datos = $this->modelDatos->dropCoordinadorModel();
		echo "<option selected value='0'>Todos...</option>";
		foreach ($datos as $i)
		{
			echo "<option value='".$i['ID_COORDINADOR']."'>".$i['COORDINADOR'].", ".$i['NOMBRE_COORDINACION']."</option>";
		}
	}

	// LLENAR SELECT COORDINACION
	public function dropCoordinacion()
	{
		$datos = $this->modelDatos->dropCoordinacionModel();
		echo "<option selected disabled value=''>Seleccione...</option>";
		foreach ($datos as $i)
		{
			echo "<option value='".$i['ID_COORDINACION']."'>".$i['NOMBRE_COORDINACION']."</option>";
		}
	}

	// LLENAR SELECT ASIGNATURA
	public function dropAsignatura()
	{
		$datos = $this->modelDatos->dropAsignaturaModel($_SESSION['COORDINADOR']);
		echo "<option selected disabled value=''>Seleccione...</option>";
		foreach ($datos as $i)
		{
			echo "<option value='".$i['ID_ASIGNATURA']."'>".$i['CODIGO_ASIGNATURA'].", ".$i['NOMBRE_ASIGNATURA']."</option>";
		}
	}
	public function dropAsignaturaProy()
	{
		echo "<option selected value='0'>Todas...</option>";
		$datos = $this->modelDatos->dropAsignaturaModel($_SESSION['COORDINADOR']);
		foreach ($datos as $i)
		{
			echo "<option value='".$i['ID_ASIGNATURA']."'>".$i['CODIGO_ASIGNATURA'].", ".$i['NOMBRE_ASIGNATURA']."</option>";
		}
	}

	// LLENAR SELECT ASIGNATURA ASIGNADA
	public function dropAsignaturaAsignada()
	{
		$datos = $this->modelDatos->dropAsignaturaAsignadaModel($_SESSION['DOCENTE']);
		echo "<option selected disabled value=''>Seleccione...</option>";
		foreach ($datos as $i)
		{
			echo "<option value='".$i['ID_ASIGNATURA']."'>".$i['CODIGO_ASIGNATURA'].", ".$i['NOMBRE_ASIGNATURA']."</option>";
		}
	}
	public function dropAsignaturaAsignadaProy()
	{
		echo "<option selected value='0'>Todas...</option>";
		$datos = $this->modelDatos->dropAsignaturaAsignadaModel($_SESSION['DOCENTE']);
		foreach ($datos as $i)
		{
			echo "<option value='".$i['ID_ASIGNATURA']."'>".$i['CODIGO_ASIGNATURA'].", ".$i['NOMBRE_ASIGNATURA']."</option>";
		}
	}

	// LLENAR SELECT DOCENTE
	public function dropDocente($asignatura)
	{
		$datos = $this->modelDatos->dropDocenteModel($asignatura);
		echo "<option selected disabled value=''>Seleccione...</option>";
		foreach ($datos as $i)
		{
			echo "<option value='".$i['ID_DOCENTE']."'>".$i['DOCENTE']."</option>";
		}
	}

	// LLENAR SELECT CARRERA
	public function Carrera()
	{
		$datos = $this->modelDatos->obtCarrer();
		echo "<option selected disabled value=''>Seleccione...</option>";
		foreach ($datos as $ti)
		{
			echo "<option value='".$ti['ID_CARRERA']."'>".$ti['NOMBRE_CARRERA']."</option>";
		}
		echo json_encode($datos);
	}

	// LLENAR SELECT TIPO INVESTIGACION
	public function obtTipoInvestigacion()
	{
		$datos = $this->modelDatos->obtTI();
		echo "<option selected disabled value=''>Seleccionar...</option>";
		foreach ($datos as $ti)
		{
			echo "<option value='".$ti['ID_TIPO']."'>".$ti['NOMBRE_TIPO_INVESTIGACION']."</option>";
		}
	}

	// LLENAR SELECT DISEÑO INVESTIGACION
	public function obtDisenioInvestigacion()
	{
		$datos = $this->modelDatos->obtDI();
		echo "<option selected disabled value=''>Seleccionar...</option>";
		foreach ($datos as $di)
		{
			echo "<option value='".$di['ID_DISENIO']."'>".$di['NOMBRE_DISENIO']."</option>";
		}
	}

	// LLENAR SELECT GRUPO ALUMNOS
	public function obtGrupoAlumno($asignatura)
	{
		$datos = $this->modelDatos->obtGA($asignatura);
		echo json_encode($datos);
	}

	// LLENAR SELECT CICLO
	public function obtCiclo()
	{
		$datos = $this->modelDatos->obtC();
		foreach ($datos as $c)
		{
			echo "<option value='".$c['ID_CICLO']."'>".$c['COD_CICLO']."</option>";
		}
	}
	public function cicloProy()
	{
		$datos = $this->modelDatos->cicloProy();
		echo "<option selected value='0'>Todos...</option>";
		foreach ($datos as $c)
		{
			echo "<option value='".$c['ID_CICLO']."'>".$c['COD_CICLO']."</option>";
		}
	}
	
}
?>
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

	// LLENAR SELECT COORDINADORES (PARA LLENAR TABLA DE PROYECTOS)
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

	// LLENAR SELECT ASIGNATURA COORDINADOR (PARA LLENAR TABLA DE PROYECTOS)
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

	// LLENAR SELECT ASIGNATURA DOCENTE (PARA LLENAR TABLA DE PROYECTOS)
	public function dropAsignaturaAsignadaProy()
	{
		echo "<option selected value='0'>Todas...</option>";
		$datos = $this->modelDatos->dropAsignaturaAsignadaModel($_SESSION['DOCENTE']);
		foreach ($datos as $i)
		{
			echo "<option value='".$i['ID_ASIGNATURA']."'>".$i['CODIGO_ASIGNATURA'].", ".$i['NOMBRE_ASIGNATURA']."</option>";
		}
	}

	// LLENAR SELECT CICLO
	public function dropCiclo()
	{
		$datos = $this->modelDatos->dropCicloModel();
		foreach ($datos as $c)
		{
			echo "<option value='".$c['ID_CICLO']."'>".$c['COD_CICLO']."</option>";
		}
	}

	// LLENAR SELECT CICLO (PARA LLENAR TABLA DE PROYECTOS)
	public function cicloProy()
	{
		$datos = $this->modelDatos->cicloProy();
		echo "<option selected value='0'>Todos...</option>";
		foreach ($datos as $c)
		{
			echo "<option value='".$c['ID_CICLO']."'>".$c['COD_CICLO']."</option>";
		}
	}

	// LLENAR SELECT DOCENTE (PARA ASIGNAR ASIGNATURA)
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
	public function dropCarrera()
	{
		$datos = $this->modelDatos->dropCarreraModel();
		echo "<option selected disabled value=''>Seleccione...</option>";
		foreach ($datos as $ti)
		{
			echo "<option value='".$ti['ID_CARRERA']."'>".$ti['NOMBRE_CARRERA']."</option>";
		}
	}

	// LLENAR SELECT TIPO INVESTIGACION
	public function dropTipoInvestigacion()
	{
		$datos = $this->modelDatos->dropTipoInvestigacionModel();
		echo "<option selected disabled value=''>Seleccione...</option>";
		foreach ($datos as $ti)
		{
			echo "<option value='".$ti['ID_TIPO']."'>".$ti['NOMBRE_TIPO_INVESTIGACION']."</option>";
		}
	}

	// LLENAR SELECT DISEÑO INVESTIGACION
	public function dropDisenioInvestigacion()
	{
		$datos = $this->modelDatos->dropDisenioInvestigacionModel();
		echo "<option selected disabled value=''>Seleccione...</option>";
		foreach ($datos as $di)
		{
			echo "<option value='".$di['ID_DISENIO']."'>".$di['NOMBRE_DISENIO']."</option>";
		}
	}

	// LLENAR SELECT ALUMNOS
	public function dropAlumnos($asignatura)
	{
		$datos = $this->modelDatos->dropAlumnosModel($asignatura);
		echo json_encode($datos);
	}

	// LLENAR SELECT GRUPO ALUMNOS
	public function dropGrupoAlumno($asignatura)
	{
		$datos = $this->modelDatos->dropGrupoAlumnoModel($asignatura);
		echo json_encode($datos);
	}
	
}
?>
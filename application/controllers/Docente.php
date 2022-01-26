<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docente extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DocenteModel', 'modelDocente', true);
		$this->load->model('DatosComunesModel', 'modelDatos', true);
	}

	// VISTA INSERTAR DOCENTE
	public function docente()
	{
		if ($this->session->userdata('is_logged') && ($this->session->userdata('ID_TIPO_USUARIO') == 1 || $this->session->userdata('ID_TIPO_USUARIO') == 3))
		{
			//header
			$data = array('title' => 'Nuevo Docente' );
			$this->load->view('Layout/Header', $data);
			//Body
			$this->load->view('Layout/Sidebar');
			$this->load->view('Docente/InsertarDocente');
			//Footer
			$this->load->view('Layout/Footer');
		}
		else
		{
			$this->session->set_flashdata('msjerror', 'Usted no se ha identificado.');
			redirect('/Accesos/');
			show_404();
		}
	}

	// VISTA MOSTRAR DOCENTES
	public function docentes()
	{
		if ($this->session->userdata('is_logged') && ($this->session->userdata('ID_TIPO_USUARIO') == 1 || $this->session->userdata('ID_TIPO_USUARIO') == 3))
		{
			$data = array('title' => 'Docentes' );
			//header
			$this->load->view('Layout/Header', $data);
			//Body
			$this->load->view('Layout/Sidebar');
			$this->load->view('Docente/MostrarDocentes');
			//Footer
			$this->load->view('Layout/Footer');
		}
		else
		{
			$this->session->set_flashdata('msjerror', 'Usted no se ha identificado.');
			redirect('/Accesos/');
			show_404();
		}
	}

	// ID PERSONA
	public function maxPersona()
	{
		$id = $this->modelDatos->maxPersonaModel();
		foreach ($id as $i)
		{
			if ($i['ID_PERSONA'] == null)
			{
				return 1;
			}
			else
			{
				return $i['ID_PERSONA'];
			}
		}
	}

	// ID DOCENTE
	public function maxDocente()
	{
		$datos = $this->modelDatos->maxDocenteModel();
		foreach ($datos as $i)
		{
			if ($i['ID_DOCENTE'] == null)
			{
				return 1;
			}
			else
			{
				return $i['ID_DOCENTE'];
			}
		}
	}

	// ID USUARIO
	public function maxUsuario()
	{
		$datos = $this->modelDatos->maxUsuarioModel();
		foreach ($datos as $i)
		{
			if ($i['ID_USUARIO'] == null)
			{
				return 1;
			}
			else
			{
				return $i['ID_USUARIO'];
			}
		}
	}

	// GUARDAR DOCENTE
	public function crearDocente()
	{
		$datosDocente = array(
			'ID_PERSONA' => $this->maxPersona(),
			'PRIMER_NOMBRE_PERSONA' => $this->input->post('PRIMER_NOMBRE_PERSONA'),
			'SEGUNDO_NOMBRE_PERSONA' => $this->input->post('SEGUNDO_NOMBRE_PERSONA'),
			'PRIMER_APELLIDO_PERSONA' => $this->input->post('PRIMER_APELLIDO_PERSONA'),
			'SEGUNDO_APELLIDO_PERSONA' => $this->input->post('SEGUNDO_APELLIDO_PERSONA'),
			'FECHA_NACIMIENTO' => $this->input->post('FECHA_NACIMIENTO'),
			'SEXO' => $this->input->post('SEXO'),
			'CORREO_INSTITUCIONAL' => $this->input->post('CORREO_INSTITUCIONAL'),
			'CORREO_PERSONAL' => $this->input->post('CORREO_PERSONAL'),
			'DUI' => $this->input->post('DUI'),
			'NIT' => $this->input->post('NIT'),
			'DIRECCION' => $this->input->post('DIRECCION'),
			'DEPARTAMENTO' => $this->input->post('DEPARTAMENTO'),
			'TELEFONO_FIJO' => $this->input->post('TELEFONO_FIJO'),
			'TELEFONO_MOVIL' => $this->input->post('TELEFONO_MOVIL'),
			'PROFESION' => $this->input->post('PROFESION'),
			'ID_DOCENTE' => $this->maxDocente(),
			'COORDINADOR' => $this->input->post('COORDINADOR'),
			'ID_USUARIO' => $this->maxUsuario(),
			'NOMBRE_USUARIO' => explode("@", $this->input->post('CORREO_INSTITUCIONAL'))[0],
			'PASSWORD' => strtolower($this->input->post('PRIMER_APELLIDO_PERSONA')),
			'USUARIO_CREA' => $_SESSION['ID_USUARIO']
		);

		$insert = $this->modelDocente->crearDocenteModel($datosDocente);
		if ($insert == TRUE) 
		{
			echo json_encode('Datos guardados!');
        }
        else
        {
            echo json_encode('Error al guardar!');
		}
	}
	
	// MOSTRAR DOCENTES
	public function mostrarDocentes($coordinador)
	{
		$resultList = $this->modelDocente->mostrarDocentesModel($coordinador);
		$result = array();
		$i = 1;
		if (!empty($resultList)) {
			foreach ($resultList as $key => $value)
			{
				$btnPass = 
					'<a class="btn btn-warning" style="font-size: x-large;" onclick="resetPass('.$value['ID_PERSONA'].');">
						<i class="fas fa-sync-alt"></i>
						<i class="fas fa-lock"></i>
					</a>';
				$btnestado = ($value['ESTADO_PERMISO'] > 0) ? 
					'<a class="btn btn-success" title="Estado" style="font-size: x-large;" 
						onclick="cambiarEstado('.$value['ID_USUARIO'].');">
						<i class="far fa-check-circle"></i>
					</a>' : 
					'<a class="btn btn-danger" title="Estado" style="font-size: x-large;" 
						onclick="cambiarEstado('.$value['ID_USUARIO'].');">
						<i class="far fa-times-circle"></i>
					</a>';
				$btnInfo = 
					'<a class="btn btn-secondary" style="font-size: x-large;" onclick="infoDocente('.$value['ID_PERSONA'].');" 
						data-toggle="modal" data-target="#InfoDocente">
						<i class="fas fa-info-circle" title="Información"></i>
					</a>';
				$btnUpdate = 
					'<a class="btn btn-dark" style="font-size: x-large;" onclick="obtenerDocente('.$value['ID_PERSONA'].');" 
						data-toggle="modal" data-target="#modalDocente">
						<i class="fas fa-pen" title="Actualizar"></i>
					</a>';

				if ($_SESSION['ID_TIPO_USUARIO'] != 1)
				{
					$result['data'][] = array(
						$i++,
						$value['DOCENTE'],
						$value['NOMBRE_USUARIO'],
						$value['TELEFONO_MOVIL'],
						$value['CORREO_PERSONAL'],
						$btnestado."&ensp;&ensp;".
						$btnInfo."&ensp;&ensp;".
						$btnUpdate
					);
				}
				else
				{
					$result['data'][] = array(
						$i++,
						$value['DOCENTE'],
						$value['NOMBRE_USUARIO'],
						$value['TELEFONO_MOVIL'],
						$value['CORREO_PERSONAL'],
						$btnPass."&ensp;&ensp;".
						$btnestado."&ensp;&ensp;".
						$btnInfo."&ensp;&ensp;".
						$btnUpdate
					);
				}		
			}
		}
		else
		{
			$result['data'] = array();
		}
		echo json_encode($result);
	}

	// INFORMACION DOCENTE
	public function datosDocente($persona)
	{
		$resultData = $this->modelDocente->datosDocenteModel(array('ID_PERSONA' => $persona));
		echo json_encode($resultData);
	}

	// CAMBIAR ESTADO DOCENTES
	public function cambiarEstado($where)
	{
		$estado_permiso = $this->modelDocente->getEstadoModel($where);
		$estado = 0;
		foreach ($estado_permiso as $e)
		{
			if ($e['ESTADO_PERMISO'] == 0)
			{
				$estado = 1;
			}
		}
		
		$editar = $this->modelDocente->cambiarEstadoModel('tbl_usuario', array('ESTADO_PERMISO' => $estado), array('ID_USUARIO' => $where));
		if ($editar == TRUE) 
		{
			echo "true";
		}
		else
		{
			echo "false";
		}
	}

	// OBTENER DOCENTE
	public function mostrarDocente($docente)
	{
		$resultData = $this->modelDocente->mostrarDocenteModel(array('ID_PERSONA' => $docente));
		echo json_encode($resultData);
	}

	// ACTUALIZAR DOCENTE
	public function updateDocente()
	{
		if ($_SESSION['ID_TIPO_USUARIO'] == 1)
		{
			$coordinador = $this->input->post('COORDINADOR_UPDATE');
		}
		else
		{
			$coordinador = $_SESSION['COORDINADOR'];
		}
		$datosDocente = array(
			'COD_PERSONA' => $this->input->post('ID_PERSONA_UPDATE'),
			'PRIMER_NOMBRE' => $this->input->post('PRIMER_NOMBRE_PERSONA_UPDATE'),
			'SEGUNDO_NOMBRE' => $this->input->post('SEGUNDO_NOMBRE_PERSONA_UPDATE'),
			'PRIMER_APELLIDO' => $this->input->post('PRIMER_APELLIDO_PERSONA_UPDATE'),
			'SEGUNDO_APELLIDO' => $this->input->post('SEGUNDO_APELLIDO_PERSONA_UPDATE'),
			'FECHA_NACIMIENTO_PERSONA' => $this->input->post('FECHA_NACIMIENTO_UPDATE'),
			'SEXO_PERSONA' => $this->input->post('SEXO_UPDATE'),
			'CORREO_INSTITUCIONAL_PERSONA' => $this->input->post('CORREO_INSTITUCIONAL_UPDATE'),
			'CORREO_PERSONAL_PERSONA' => $this->input->post('CORREO_PERSONAL_UPDATE'),
			'DUI_PERSONA' => $this->input->post('DUI_UPDATE'),
			'NIT_PERSONA' => $this->input->post('NIT_UPDATE'),
			'DIRECCION_PERSONA' => $this->input->post('DIRECCION_UPDATE'),
			'DEPARTAMENTO_PERSONA' => $this->input->post('DEPARTAMENTO_UPDATE'),
			'TELEFONO_FIJO_PERSONA' => $this->input->post('TELEFONO_FIJO_UPDATE'),
			'TELEFONO_MOVIL_PERSONA' => $this->input->post('TELEFONO_MOVIL_UPDATE'),
			'PROFESION_PERSONA' => $this->input->post('PROFESION_UPDATE'),
			'COORDINADOR_PERSONA' => $coordinador,
			'USUARIO_PERSONA' => explode("@", $this->input->post('CORREO_INSTITUCIONAL_UPDATE'))[0],
			'PASSWORD_PERSONA' => strtolower($this->input->post('PRIMER_APELLIDO_PERSONA_UPDATE'))
		);

		$insert = $this->modelDocente->updateDocenteModel($datosDocente);
		if ($insert == TRUE) 
		{
			echo json_encode('Datos actualizados!');
        }
        else
        {
            echo json_encode('Error al actualizar!');
		}
	}

}
?>
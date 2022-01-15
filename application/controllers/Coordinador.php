<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coordinador extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('CoordinadorModel', 'modelCoordinador', true);
		$this->load->model('DatosComunesModel', 'modelDatos', true);
	}

	// VISTA INSERTAR COORDINADOR
	public function coordinador()
	{
		if($this->session->userdata('is_logged') && ($this->session->userdata('ID_TIPO_USUARIO') == 1 || $this->session->userdata('ID_TIPO_USUARIO') == 2))
		{
			//header
			$data = array('title' => 'Nuevo Coordinador' );
			$this->load->view('Layout/Header', $data);
			//Body
			$this->load->view('Layout/Sidebar');
			$this->load->view('Coordinador/InsertarCoordinador');
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

	// VISTA MOSTRAR COORDINADORES
	public function coordinadores()
	{
		if($this->session->userdata('is_logged') && ($this->session->userdata('ID_TIPO_USUARIO') == 1 || $this->session->userdata('ID_TIPO_USUARIO') == 2))
		{
			//header
			$data = array('title' => 'Coordinadores' );
			$this->load->view('Layout/Header', $data);
			//Body
			$this->load->view('Layout/Sidebar');
			$this->load->view('Coordinador/MostrarCoordinadores');
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

	// ID COORDINADOR
	public function maxCoordinador()
	{
		$datos = $this->modelDatos->maxCoordinadorModel();
		foreach ($datos as $i)
		{
			if ($i['ID_COORDINADOR'] == null)
			{
				return 1;
			}
			else
			{
				return $i['ID_COORDINADOR'];
			}
		}
	}

	// ID USUARIO
	public function maxUsuario()
	{
		$datos = $this->modelDatos->maxUsuarioModel();
		foreach ($datos as $i) {
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

	// GUARDAR COORDINADOR
	public function crearCoordinador()
	{
		$datosCoordinador = array(
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
			'ID_COORDINADOR' => $this->maxCoordinador(),
			'COORDINACION' => $this->input->post('COORDINACION'),
			'ID_USUARIO' => $this->maxUsuario(),
			'NOMBRE_USUARIO' => explode("@", $this->input->post('CORREO_INSTITUCIONAL'))[0],
			'PASSWORD' => strtolower($this->input->post('PRIMER_APELLIDO_PERSONA')),
			'USUARIO_CREA' => $_SESSION['ID_USUARIO']
		);

		$insert = $this->modelCoordinador->crearCoordinadorModel($datosCoordinador);
		if ($insert == TRUE) 
		{
			echo json_encode('Datos guardados!');
        }
        else
        {
            echo json_encode('Error al guardar!');
		}
	}

	// MOSTRAR COORDINADORES
	public function mostrarCoordinadores()
	{
		$resultList = $this->modelCoordinador->mostrarCoordinadorModel();
		$result = array();
		$i = 1;
		foreach ($resultList as $key => $value)
		{
			$btnPass = 
				'<a class="btn btn-warning" style="font-size: x-large;" onclick="resetPass('.$value['ID_PERSONA'].');">
					<i class="fas fa-sync-alt"></i>
					<i class="fas fa-lock"></i>
				</a>';
			$btnInfo = 
				'<a class="btn btn-secondary" style="font-size: x-large;" onclick="infoCoordinador('.$value['ID_PERSONA'].');" 
					data-toggle="modal" data-target="#InfoCoordinador">
					<i class="fas fa-info-circle"></i>
				</a>';
			$btnUpdate = 
				'<a class="btn btn-dark" style="font-size: x-large;" onclick="obtenerCoordinador('.$value['ID_PERSONA'].');" 
					data-toggle="modal" data-target="#modalCoordinador">
					<i class="fas fa-pen" title="Actualizar"></i>
				</a>';

			if ($_SESSION['ID_TIPO_USUARIO'] != 1)
			{
				$result['data'][] = array(
					$i++,
					$value['COORDINADOR'],
					$value['NOMBRE_USUARIO'],
					$value['TELEFONO_MOVIL'],
					$value['NOMBRE_COORDINACION'],
					$btnInfo."&ensp;&ensp;".
					$btnUpdate
				);
			}
			else
			{
				$result['data'][] = array(
					$i++,
					$value['COORDINADOR'],
					$value['NOMBRE_USUARIO'],
					$value['TELEFONO_MOVIL'],
					$value['NOMBRE_COORDINACION'],
					$btnPass."&ensp;&ensp;".
					$btnInfo."&ensp;&ensp;".
					$btnUpdate
				);
			}
			
		}
		echo json_encode($result);
	}

	// INFORMACION COORDINADOR
	public function datosCoordinador($persona)
	{
		$resultData = $this->modelCoordinador->datosCoordinadorModel(array('ID_PERSONA' => $persona));
		echo json_encode($resultData);
	}

	// OBTENER COORDINADOR PARA ACTUALIZAR
	public function obtenerCoordinador($persona)
	{
		$resultData = $this->modelCoordinador->obtenerCoordinadorModel(array('ID_PERSONA' => $persona));
		echo json_encode($resultData);
	}

	// ACTUALIZAR COORDINADOR
	public function updateCoordinador()
	{
		$datosCoordinador = array(
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
			'COORDINACION_PERSONA' => $this->input->post('COORDINACION_UPDATE'),
			'USUARIO_PERSONA' => explode("@", $this->input->post('CORREO_INSTITUCIONAL_UPDATE'))[0],
			'PASSWORD_PERSONA' => strtolower($this->input->post('PRIMER_APELLIDO_PERSONA_UPDATE'))
		);

		$insert = $this->modelCoordinador->updateCoordinadorModel($datosCoordinador);
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
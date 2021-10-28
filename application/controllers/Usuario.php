<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UsuarioModel', 'modelUsuario', true);
		$this->load->model('DatosComunesModel', 'modelDatos', true);
	}

	// VISTA INSERTAR USUARIOS
	public function usuario()
	{
		if($this->session->userdata('is_logged'))
		{
			$data = array('title' => 'Nuevo Usuario' );
			//header
			$this->load->view('Layout/Header', $data);
			//Body
			$this->load->view('Layout/Sidebar');
			$this->load->view('Usuario/InsertarUsuario');
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

	// VISTA MOSTRAR USUARIOS
	public function usuarios()
	{
		if($this->session->userdata('is_logged'))
		{
			$data = array('title' => 'Usuarios' );
			//header
			$this->load->view('Layout/Header', $data);
			//Body
			$this->load->view('Layout/Sidebar');
			$this->load->view('Usuario/MostrarUsuarios');
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

	// GUARDAR USUARIO
	public function crearUsuario()
	{
		$datosUsuario = array(
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
			'ID_USUARIO' => $this->maxUsuario(),
			'NOMBRE_USUARIO' => $this->input->post('NOMBRE_USUARIO'),
			'PASSWORD' => $this->input->post('PASSWORD'),
			'ID_TIPO_USUARIO' => $this->input->post('ID_TIPO_USUARIO'),
			'USUARIO_CREA' => $_SESSION['ID_USUARIO']
		);

		$insert = $this->modelUsuario->crearUsuarioModel($datosUsuario);
		if ($insert == TRUE) 
		{
			echo "true";
		}
		else
		{
			echo "false";
		}
	}
	
	// MOSTRAR USUARIOS
	public function mostrarUsuarios()
	{
		$resultList = $this->modelUsuario->mostrarUsuariosModel();
		$result = array();
		$i = 1;
		foreach ($resultList as $key => $value) {
			
			$btnInfo = 
				'<a class="btn btn-dark" style="font-size: x-large;" onclick="infoUsuario('.$value['PERSONA'].');" 
					data-toggle="modal" data-target="#InfoUsuario">
					<i class="fas fa-info-circle" title="Información"></i>
				</a>';
			$btnPass = 
				'<a class="btn btn-warning" style="font-size: x-large;" onclick="resetPass('.$value['PERSONA'].');">
					<i class="fas fa-sync-alt"></i>
					<i class="fas fa-lock"></i>
				</a>';
			$btnUpdate = 
				'<a class="btn btn-warning" style="font-size: x-large;" onclick="obtenerUsuario('.$value['PERSONA'].');" 
					data-toggle="modal" data-target="#modalPersona">
					<i class="fas fa-pen" title="Actualizar"></i>
				</a>';
			
			if ($value['ID_TIPO_USUARIO'] == 2 || $value['ID_TIPO_USUARIO'] == 5 || $value['ID_TIPO_USUARIO'] == 6)
			{
				$result['data'][] = array(
					$i++,
					$value['PERSONA_USUARIO'],
					$value['NOMBRE_USUARIO'],
					$value['TELEFONO_MOVIL'],
					$value['NOMBRE_ROL'],
					$btnPass."&ensp;&ensp;".
					$btnInfo."&ensp;&ensp;".
					$btnUpdate
				);
			}
			else
			{
				$result['data'][] = array(
					$i++,
					$value['PERSONA_USUARIO'],
					$value['NOMBRE_USUARIO'],
					$value['TELEFONO_MOVIL'],
					$value['NOMBRE_ROL'],
					$btnPass."&ensp;&ensp;".
					$btnInfo
				);
			}
		}
		echo json_encode($result);
	}

	// INFORMACION USUARIO
	public function datosUsuario($persona)
	{
		$resultData = $this->modelUsuario->datosUsuarioModel(array('ID_PERSONA' => $persona));
		echo json_encode($resultData);
	}

	// OBTENER PERSONA
	public function mostrarPersona($persona)
	{
		$resultData = $this->modelUsuario->mostrarPersonaModel(array('ID_PERSONA' => $persona));
		echo json_encode($resultData);
	}

	// OBTENER USUARIO
	public function mostrarUsuario($persona)
	{
		$resultData = $this->modelUsuario->mostrarUserioModel(array('ID_PERSONA' => $persona));
		echo json_encode($resultData);
	}

	// ACTUALIZAR PERSONA
	public function updatePersona()
	{
		$where = $this->input->post('ID_PERSONA');
		$editar = $this->modelUsuario->updatePersonaModel('tbl_persona', $_POST, array('ID_PERSONA' => $where));
		if ($editar == TRUE)
		{
			echo "true";
		}
		else
		{
			echo "false";
		}
	}

	// RESTABLECER CONTRASEÑA
	public function resetPass($personaUsuario)
	{
		// $personaUsuario = $this->input->post('ID_PERSONA');
		$insert = $this->modelUsuario->resetPassModel($personaUsuario);
		if ($insert == TRUE)
		{
			echo "true";
		}
		else
		{
			echo "false";
		}
	}

}
?>
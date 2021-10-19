<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Coordinador extends CI_Controller
	{
		// CONSTRUCTOR PARA LLAMAR AL MODELO
		public function __construct()
		{
			parent::__construct();
			$this->load->model('CoordinadorModel', 'modelCoordinador', true);
			$this->load->model('DatosComunesModel', 'modelDatos', true);
		}

		// VISTA INSERTAR COORDINADOR
		public function coordinador()
		{
			if($this->session->userdata('is_logged')){
				//header
				$data = array('title' => 'Nuevo Coordinador' );
				$this->load->view('Layout/Header', $data);
				//Body
				$this->load->view('Layout/Sidebar');
				$this->load->view('Coordinador/InsertarCoordinador');
				//Footer
				$this->load->view('Layout/Footer');
			}
			else{
				$this->session->set_flashdata('msjerror', 'Usted no se ha identificado.');
				redirect('/Accesos/');
				show_404();
			}
		}

		// VISTA MOSTRAR COORDINADORES
		public function coordinadores()
		{
			if($this->session->userdata('is_logged')){
				//header
				$data = array('title' => 'Coordinadores' );
				$this->load->view('Layout/Header', $data);
				//Body
				$this->load->view('Layout/Sidebar');
				$this->load->view('Coordinador/MostrarCoordinadores');
				//Footer
				$this->load->view('Layout/Footer');
			}
			else{
				$this->session->set_flashdata('msjerror', 'Usted no se ha identificado.');
				redirect('/Accesos/');
				show_404();
			}
		}

		// ID PERSONA
		public function maxPersona()
		{
			$id = $this->modelDatos->maxPersonaModel();
			foreach ($id as $i) {
				if ($i['ID_PERSONA'] == null)
				{
					return 1;
				} else {
					return $i['ID_PERSONA'];
				}
			}
		}

		// ID COORDINADOR
		public function maxCoordinador()
		{
			$datos = $this->modelDatos->maxCoordinadorModel();
			foreach ($datos as $i) {
				if ($i['ID_COORDINADOR'] == null)
				{
					return 1;
				} else {
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
				} else {
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
				'ID_COORDINADOR' => $this->maxCoordinador(),
				'PROFESION' => $this->input->post('PROFESION'),
				'COORDINACION' => $this->input->post('COORDINACION'),
				'ID_USUARIO' => $this->maxUsuario(),
				'NOMBRE_USUARIO' => $this->input->post('NOMBRE_USUARIO'),
				'PASSWORD' => $this->input->post('PASSWORD'),
				'USUARIO_CREA' => $_SESSION['ID_USUARIO']
			);

			$insert = $this->modelCoordinador->crearCoordinadorModel($datosCoordinador);
			if ($insert == TRUE) 
			{
				echo "true";
			} else {
				echo "false";
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
				$btnInfo = 
				'<a class="btn btn-dark" style="font-size: x-large;" onclick="infoCoordinador('.$value['ID_PERSONA'].');" data-toggle="modal" data-target="#InfoCoordinador"><i class="fas fa-info-circle"></i></a>';
				$result['data'][] = array(
					$i++,
					$value['COORDINADOR'],
					$value['NOMBRE_USUARIO'],
					$value['TELEFONO_MOVIL'],
					$btnInfo
				);
			}
			echo json_encode($result);
		}

		// OBTENER COORDINADOR
        public function datosCoordinador($persona)
        {
            $resultData = $this->modelCoordinador->datosCoordinadorModel(array('ID_PERSONA' => $persona));
            echo json_encode($resultData);
        }
		
	}
?>
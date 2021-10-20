<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Docente extends CI_Controller {

		// CONSTRUCTOR PARA LLAMAR AL MODELO
		public function __construct()
		{
			parent::__construct();
			$this->load->model('DocenteModel', 'modelDocente', true);
			$this->load->model('DatosComunesModel', 'modelDatos', true);
		}

		// VISTA INSERTAR DOCENTE
		public function docente()
		{
			if($this->session->userdata('is_logged')){
				//header
				$data = array('title' => 'Nuevo Docente' );
				$this->load->view('Layout/Header', $data);
				//Body
				$this->load->view('Layout/Sidebar');
				$this->load->view('Docente/InsertarDocente');
				//Footer
				$this->load->view('Layout/Footer');
			}
			else{
				$this->session->set_flashdata('msjerror', 'Usted no se ha identificado.');
				redirect('/Accesos/');
				show_404();
			}
		}

		// VISTA MOSTRAR DOCENTES
		public function docentes()
		{
			if($this->session->userdata('is_logged')){
				$data = array('title' => 'Docentes' );
				//header
				$this->load->view('Layout/Header', $data);
				//Body
				$this->load->view('Layout/Sidebar');
				$this->load->view('Docente/MostrarDocentes');
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
				if ($i['ID_PERSONA'] == null) {
					return 1;
				} else {
					return $i['ID_PERSONA'];
				}
			}
		}

		// ID DOCENTE
		public function maxDocente()
		{
			$datos = $this->modelDatos->maxDocenteModel();
			foreach ($datos as $i) {
				if ($i['ID_DOCENTE'] == null) {
					return 1;
				} else {
					return $i['ID_DOCENTE'];
				}
			}
		}

		// ID USUARIO
		public function maxUsuario()
		{
			$datos = $this->modelDatos->maxUsuarioModel();
			foreach ($datos as $i) {
				if ($i['ID_USUARIO'] == null) {
					return 1;
				} else {
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
				'NOMBRE_USUARIO' => $this->input->post('NOMBRE_USUARIO'),
				'PASSWORD' => $this->input->post('PASSWORD'),
				'USUARIO_CREA' => $_SESSION['ID_USUARIO']
			);

			$insert = $this->modelDocente->crearDocenteModel($datosDocente);
			if ($insert == TRUE) 
			{
				echo "true";
			} else {
				echo "false";
			}
		}
		
		// MOSTRAR DOCENTES
		public function mostrarDocentes()
		{
			$resultList = $this->modelDocente->mostrarDocentesModel($_SESSION['COORDINADOR']);
			$result = array();
			$i = 1;
			foreach ($resultList as $key => $value) {
				$btnInfo = 
					'<a class="btn btn-dark" style="font-size: x-large;" onclick="infoDocente('.$value['ID_PERSONA'].');" 
						data-toggle="modal" data-target="#InfoDocente">
						<i class="fas fa-info-circle" title="Información"></i>
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
				$btnUpdate = 
					'<a class="btn btn-warning" style="font-size: x-large;" onclick="obtenerDocente('.$value['ID_PERSONA'].');" 
						data-toggle="modal" data-target="#modalDocente">
						<i class="fas fa-pen" title="Actualizar"></i>
					</a>';

				$result['data'][] = array(
					$i++,
					$value['DOCENTE'],
					$value['NOMBRE_USUARIO'],
					$value['TELEFONO_MOVIL'],
					$value['CORREO_PERSONAL'],
					$btnInfo."&ensp;&ensp;".
					$btnestado."&ensp;&ensp;".
					$btnUpdate
				);
				
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
			foreach ($estado_permiso as $e) {
				if ($e['ESTADO_PERMISO'] == 0) {
					$estado = 1;
				}
			}
			
			$editar = $this->modelDocente->cambiarEstadoModel('tbl_usuario', array('ESTADO_PERMISO' => $estado), array('ID_USUARIO' => $where));
			if ($editar == TRUE) 
			{
				echo "true";
			}else{
				echo "false";
			}
		}

	}
?>
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Usuario extends CI_Controller {

		// CONSTRUCTOR PARA LLAMAR AL MODELO
		public function __construct()
		{
			parent::__construct();
			$this->load->model('UsuarioModel', 'modelUsuario', true);
		}

		// VISTA MOSTRAR DOCENTES
		public function usuarios()
		{
			if($this->session->userdata('is_logged')){
				$data = array('title' => 'Usuarios' );
				//header
				$this->load->view('Layout/Header', $data);
				//Body
				$this->load->view('Layout/Sidebar');
				$this->load->view('Usuario/MostrarUsuarios');
				//Footer
				$this->load->view('Layout/Footer');
			}
			else{
				$this->session->set_flashdata('msjerror', 'Usted no se ha identificado.');
				redirect('/Accesos/');
				show_404();
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
					'<a class="btn btn-dark" style="font-size: x-large;" onclick="resetPass('.$value['PERSONA'].');">
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

				$result['data'][] = array(
					$i++,
					$value['PERSONA_USUARIO'],
					$value['NOMBRE_USUARIO'],
					$value['NOMBRE_ROL'],
					// $btnestado."&ensp;&ensp;".
					$btnInfo."&ensp;&ensp;".
					$btnPass
				);
			}
			echo json_encode($result);
		}

		// OBTENER USUARIO
        public function datosUsuario($persona)
        {
            $resultData = $this->modelUsuario->datosUsuarioModel(array('ID_PERSONA' => $persona));
            echo json_encode($resultData);
        }

		// RESTABLECER CONTRASEÑA
		public function resetPass($personaUsuario)
		{
			// $personaUsuario = $this->input->post('ID_PERSONA');

			$insert = $this->modelUsuario->resetPassModel($personaUsuario);
			if ($insert == TRUE)
			{
				echo "true";
			} else {
				echo "false";
			}
		}

	}
?>
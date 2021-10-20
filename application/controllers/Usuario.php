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
					'<a class="btn btn-warning" style="font-size: x-large;" onclick="resetPass('.$value['PERSONA'].');">
						<i class="fas fa-sync-alt"></i>
						<i class="fas fa-lock"></i>
					</a>';
				$btnUpdate = 
					'<a class="btn btn-warning" style="font-size: x-large;" onclick="obtenerPersona('.$value['PERSONA'].');" 
						data-toggle="modal" data-target="#modalPersona">
						<i class="fas fa-pen" title="Actualizar"></i>
					</a>';
				
				$result['data'][] = array(
					$i++,
					$value['PERSONA_USUARIO'],
					$value['NOMBRE_USUARIO'],
					$value['TELEFONO_MOVIL'],
					$value['CORREO_PERSONAL'],
					$btnPass."&ensp;&ensp;".
					$btnInfo."&ensp;&ensp;".
					$btnUpdate
				);
				
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
			} else {
				echo "false";
			}
		}

	}
?>
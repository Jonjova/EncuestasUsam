<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Persona extends CI_Controller {

        // CONSTRUCTOR PARA LLAMAR AL MODELO
        public function __construct()
        {
            parent::__construct();
            $this->load->model('PersonaModel', 'modelPersona', true);
        }

        // VISTA ACTUALIZAR PERSONA
        public function persona()
        {
            if($this->session->userdata('is_logged')){
                //header
                $data = array('title' => 'Actualizar Mis Datos' );
                $this->load->view('Layout/Header', $data);
                //Body
                $this->load->view('Layout/Sidebar');
                $this->load->view('ActualizarDatosPersonales');
                //Footer
                $this->load->view('Layout/Footer');
            }
            else{
                $this->session->set_flashdata('msjerror', 'Usted no se ha identificado.');
                redirect('/Accesos/');
                show_404();
            }
        }

        // VISTA CAMBIAR CONTRASEÑA
        public function cambiar()
        {
            if($this->session->userdata('is_logged')){
                //header
                $data = array('title' => 'Contraseña' );
                $this->load->view('Layout/Header', $data);
                //Body
                $this->load->view('Layout/Sidebar');
                $this->load->view('CambiarContrasenia');
                //Footer
                $this->load->view('Layout/Footer');
            }
            else{
                $this->session->set_flashdata('msjerror', 'Usted no se ha identificado.');
                redirect('/Accesos/');
                show_404();
            }
        }

        // OBTENER PERSONA
        public function mostrarPersona($persona)
        {
            $resultData = $this->modelPersona->mostrarPersonaModel(array('ID_PERSONA' => $persona));
            echo json_encode($resultData);
        }

        // ACTUALIZAR PERSONA
        public function updatePersona()
        {
            $where = $this->input->post('ID_PERSONA');
		    $editar = $this->modelPersona->updatePersonaModel('tbl_persona', $_POST, array('ID_PERSONA' => $where));
            if ($editar == TRUE) 
            {
                echo "true";
            }
            else
            {
                echo "false";
            }
        }

        // VALIDAR PASSWORD
		public function validarPassword()
		{ 
            $iduser = $_SESSION['ID_USUARIO'];
			$pass = sha1($this->input->post('PASSWORD'));

            if (!$res = $this->modelPersona->findPassword($iduser, $pass))
            {
				echo 1;
			}
			else
			{ 
				echo 0;
			}
		}

        // CAMBIAR CONTRASEÑA
        public function updatePassword()
        {
            $where = $_SESSION['ID_USUARIO'];
            $pass = sha1($this->input->post('PASSWORD'));
		    $editar = $this->modelPersona->updatePasswordModel('tbl_usuario', array('PASSWORD' => $pass), array('ID_USUARIO' => $where));
            if ($editar == TRUE) 
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
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Cuenta extends CI_Controller {

        // CONSTRUCTOR PARA LLAMAR AL MODELO
        public function __construct()
        {
            parent::__construct();
            $this->load->model('CuentaModel', 'modelCuenta', true);
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
                $this->load->view('Cuenta/ActualizarDatosPersonales');
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
                $this->load->view('Cuenta/CambiarContrasenia');
                //Footer
                $this->load->view('Layout/Footer');
            }
            else{
                $this->session->set_flashdata('msjerror', 'Usted no se ha identificado.');
                redirect('/Accesos/');
                show_404();
            }
        }

        // VALIDAR PASSWORD
		public function validarPassword()
		{ 
            $iduser = $_SESSION['ID_USUARIO'];
			$pass = sha1($this->input->post('PASSWORD'));

            if (!$res = $this->modelCuenta->findPassword($iduser, $pass))
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
		    $editar = $this->modelCuenta->updatePasswordModel('tbl_usuario', array('PASSWORD' => $pass), array('ID_USUARIO' => $where));
            if ($editar == TRUE) 
            {
                echo "true";
            }
            else
            {
                echo "false";
            }
        }

        // // VALIDAR CORREO USUARIO
		// public function validarUser()
		// { 
		// 	$correoUsuario = $this->input->post('CORREO_INSTITUCIONAL');
        //     if (!$res = $this->modelCuenta->findUser($correoUsuario))
        //     {
		// 		echo 1;
		// 	}
		// 	else
		// 	{ 
		// 		echo 0;
		// 	}
		// }

        // // VALIDAR FECHA DE NACIMIENTO USUARIO
		// public function validarFechaUser()
		// { 
		// 	$correoUsuario = $this->input->post('CORREO_INSTITUCIONAL');
        //     $fechaUser = $this->input->post('FECHA_NACIMIENTO');
        //     if (!$res = $this->modelCuenta->findFechaUser($correoUsuario, $fechaUser))
        //     {
		// 		echo 1;
		// 	}
		// 	else
		// 	{ 
		// 		echo 0;
		// 	}
		// }

    }
?>
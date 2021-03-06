<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuenta extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('CuentaModel', 'modelCuenta', true);
    }

    // VISTA ACTUALIZAR PERSONA
    public function persona()
    {
        if ($this->session->userdata('is_logged') && $this->session->userdata('ID_TIPO_USUARIO') == 1)
        {
            //header
            $data = array('title' => 'USAM - Actualizar Mis Datos' );
            $this->load->view('Layout/Header', $data);
            //Body
            $this->load->view('Layout/Sidebar');
            $this->load->view('Cuenta/ActualizarDatosPersonales');
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

    // VISTA CAMBIAR CONTRASEÑA
    public function cambiar()
    {
        if ($this->session->userdata('is_logged'))
        {
            //header
            $data = array('title' => 'USAM - Contraseña' );
            $this->load->view('Layout/Header', $data);
            //Body
            $this->load->view('Layout/Sidebar');
            $this->load->view('Cuenta/CambiarContrasenia');
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
            echo json_encode('Contraseña cambiada!');
        }
        else
        {
            echo json_encode('Error al cambiar!');
        }
    }

}
?>
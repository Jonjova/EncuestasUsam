<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ciclo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('CicloModel', 'modelCiclo', true);
        $this->load->model('DatosComunesModel', 'modelDatos', true);
    }

    // VISTA INSERTAR CICLO
    public function ciclo()
    {
        if ($this->session->userdata('is_logged'))
        {
            //header
            $data = array('title' => 'Nueva Ciclo' );
            $this->load->view('Layout/Header', $data);
            //Body
            $this->load->view('Layout/Sidebar');
            $this->load->view('Ciclo/InsertarCiclo');
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

    // VISTA MOSTRAR CICLO
    public function ciclos()
    {
        if ($this->session->userdata('is_logged'))
        {
            //header
            $data = array('title' => 'Asignaturas' );
            $this->load->view('Layout/Header', $data);
            //Body
            $this->load->view('Layout/Sidebar');
            $this->load->view('Ciclo/MostrarCiclo');
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
    public function maxCiclo()
    {
        $id = $this->modelDatos->maxCicloModel();
        foreach ($id as $i)
        {
            if ($i['ID_CICLO'] == null)
            {
                return 1;
            } else {
                return $i['ID_CICLO'];
            }
        }
    }

    // INSERTAR CICLO
    public function crearCiclo()
    {
        $datos = array(
            'ID_CICLO' => $this->maxCiclo(),
            'COD_CICLO' => $this->input->post('COD_CICLO'),
            'FECHA_INICIO' => $this->input->post('FECHA_INICIO'),
            'FECHA_FIN' => $this->input->post('FECHA_FIN'),
            'USUARIO_CREA' => $_SESSION['ID_USUARIO'],
            'FECHA_CREA' => date('Y-m-d H:m:s')
        );
        $insert = $this->modelCiclo->crearCicloModel($datos);
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
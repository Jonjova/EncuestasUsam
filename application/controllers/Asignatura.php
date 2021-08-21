<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Asignatura extends CI_Controller {

        // CONSTRUCTOR PARA LLAMAR AL MODELO
        public function __construct()
        {
            parent::__construct();
            $this->load->model('AsignaturaModel', 'modelAsignatura', true);
        }

        // VISTA INSERTAR ASIGNATURA
        public function asignatura()
        {
            if($this->session->userdata('is_logged')){
                //header
                $data = array('title' => 'Nueva Materia' );
                $this->load->view('Layout/Header', $data);
                //Body
                $this->load->view('Layout/Sidebar');
                $this->load->view('VistasCoordinador/InsertarAsignatura');
                //Footer
                $this->load->view('Layout/Footer');
            }
            else{
                $this->session->set_flashdata('msjerror', 'Usted no se ha identificado.');
                redirect('/Accesos/');
                show_404();
            }
        }

        // VISTA ASIGNAR MATERIA
        public function asignar()
        {
            if($this->session->userdata('is_logged')){
                //header
                $data = array('title' => 'Nueva Asignación' );
                $this->load->view('Layout/Header', $data);
                //Body
                $this->load->view('Layout/Sidebar');
                $this->load->view('VistasCoordinador/AsignarMaterias');
                //Footer
                $this->load->view('Layout/Footer');
            }
            else{
                $this->session->set_flashdata('msjerror', 'Usted no se ha identificado.');
                redirect('/Accesos/');
                show_404();
            }
        }

        // GUARDAR ASIGNATURA
        public function crearAsignatura()
        {
            $datosAsignatura = array(
                'CODIGO_ASIGNATURA' => $this->input->post('CODIGO_ASIGNATURA'),
                'NOMBRE_ASIGNATURA' => $this->input->post('NOMBRE_ASIGNATURA'),
                'COORDINADOR' => $this->input->post('COORDINADOR')
            );

            $insert = $this->modelAsignatura->crearAsignaturaModel($datosAsignatura);
            if ($insert == TRUE) 
            {
                echo "true";
            } else {
                echo "false";
            }
            
        }

    }
?>
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
            if ($this->session->userdata('is_logged'))
            {
                //header
                $data = array('title' => 'Nueva Asignatura' );
                $this->load->view('Layout/Header', $data);
                //Body
                $this->load->view('Layout/Sidebar');
                $this->load->view('Asignatura/InsertarAsignatura');
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

        // VISTA ASIGNAR MATERIA
        public function asignar()
        {
            if ($this->session->userdata('is_logged'))
            {
                //header
                $data = array('title' => 'Nueva Asignación' );
                $this->load->view('Layout/Header', $data);
                //Body
                $this->load->view('Layout/Sidebar');
                $this->load->view('Asignatura/AsignarMaterias');
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

        // VISTA MOSTRAR ASIGNATURAS
        public function asignaturas()
        {
            if ($this->session->userdata('is_logged'))
            {
                //header
                $data = array('title' => 'Asignaturas' );
                $this->load->view('Layout/Header', $data);
                //Body
                $this->load->view('Layout/Sidebar');
                $this->load->view('Asignatura/MostrarAsignaturas');
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

        // VISTA MOSTRAR ASIGNATURAS ASIGNADAS
        public function asignadas()
        {
            if ($this->session->userdata('is_logged'))
            {
                //header
                $data = array('title' => 'Asignadas' );
                $this->load->view('Layout/Header', $data);
                //Body
                $this->load->view('Layout/Sidebar');
                $this->load->view('Asignatura/MostrarDocentesAsignaturas');
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

        // INSERTAR ASIGNATURA
        public function crearAsignatura()
        {
            $insert = $this->modelAsignatura->crearAsignaturaModel($_POST);
            if ($insert == TRUE)
            {
                echo "true";
            }
            else
            {
                echo "false";
            }
            
        }

        // ASIGNAR ASIGNATURA
        public function asignarAsignatura()
        {
            $insert = $this->modelAsignatura->asignarAsignaturaModel($_POST);
            if ($insert == TRUE)
            {
                echo "true";
            }
            else
            {
                echo "false";
            }
            
        }

        // MOSTRAR ASIGNATURAS
		public function mostrarAsignaturas()
		{
			$resultList = $this->modelAsignatura->mostrarAsignaturaModel($_SESSION['COORDINADOR']);
			$result = array();
			$i = 1;
			foreach ($resultList as $key => $value)
            {
                if ($_SESSION['ID_TIPO_USUARIO'] == 1) 
				{
                    $result['data'][] = array(
                        $i++,
                        $value['CODIGO_ASIGNATURA'],
                        $value['NOMBRE_ASIGNATURA'],
                        $value['COORDINADOR'],
                        $value['NOMBRE_COORDINACION']
                    );
                }
                else
                {
                    $result['data'][] = array(
                        $i++,
                        $value['CODIGO_ASIGNATURA'],
                        $value['NOMBRE_ASIGNATURA']
                    );
                }
                
			}
			echo json_encode($result);
		}

        // MOSTRAR ASIGNATURAS ASIGNADAS
		public function mostrarDocentesAsignaturas()
		{
			$resultList = $this->modelAsignatura->mostrarDocenteAsignaturaModel($_SESSION['COORDINADOR']);
			$result = array();
			$i = 1;
			foreach ($resultList as $key => $value)
            {
                $result['data'][] = array(
                    $i++,
                    $value['CODIGO_ASIGNATURA'],
                    $value['NOMBRE_ASIGNATURA'],
                    $value['DOCENTE']
                );
			}
			echo json_encode($result);
		}

    }
?>
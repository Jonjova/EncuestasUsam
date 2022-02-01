<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asignatura extends CI_Controller
{

    // CONSTRUCTOR PARA LLAMAR AL MODELO
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AsignaturaModel', 'modelAsignatura', true);
    }

    // VISTA INSERTAR ASIGNATURA
    public function asignatura()
    {
        if ($this->session->userdata('is_logged') && $this->session->userdata('ID_TIPO_USUARIO') == 3)
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
        if ($this->session->userdata('is_logged') && $this->session->userdata('ID_TIPO_USUARIO') == 3)
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
        if ($this->session->userdata('is_logged') && $this->session->userdata('ID_TIPO_USUARIO') == 3)
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
        if ($this->session->userdata('is_logged') && $this->session->userdata('ID_TIPO_USUARIO') == 3)
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
            echo json_encode('Datos guardados!');
        }
        else
        {
            echo json_encode('Error al guardar!');
        }
        
    }

    // ASIGNAR ASIGNATURA
    public function asignarAsignatura()
    {
        $insert = $this->modelAsignatura->asignarAsignaturaModel($_POST);
        if ($insert == TRUE)
        {
            echo json_encode('Datos guardados!');
        }
        else
        {
            echo json_encode('Error al asignar!');
        }
        
    }

    // MOSTRAR ASIGNATURAS
    public function mostrarAsignaturas()
    {
        $resultList = $this->modelAsignatura->mostrarAsignaturaModel($_SESSION['COORDINADOR']);
        $result = array();
        $i = 1;
        if (!empty($resultList))
        {
            foreach ($resultList as $key => $value)
            {
                $btnUpdate = 
                        '<a class="btn btn-dark" style="font-size: x-large;" onclick="obtenerAsignatura('.$value['ID_ASIGNATURA'].');" 
                            data-toggle="modal" data-target="#modalAsignatura">
                            <i class="fas fa-pen" title="Actualizar"></i>
                        </a>';
                $result['data'][] = array(
                        $i++,
                        $value['CODIGO_ASIGNATURA'],
                        $value['NOMBRE_ASIGNATURA'],
                        $btnUpdate
                    );
            }
        }
        else
        {
            $result['data']= array();
        }
        echo json_encode($result);
    }

    // MOSTRAR ASIGNATURAS ASIGNADAS
    public function mostrarDocentesAsignaturas()
    {
        $resultList = $this->modelAsignatura->mostrarDocenteAsignaturaModel($_SESSION['COORDINADOR']);
        $result = array();
        $i = 1;
        if (!empty($resultList))
        {
            foreach ($resultList as $key => $value)
            {
                $btnUpdate = 
                    '<a class="btn btn-dark" style="font-size: x-large;" onclick="obtenerDocenteAsignatura('.$value['ID_DOCENTE_ASIGNATURA'].');" 
                        data-toggle="modal" data-target="#modalDocenteAsignatura">
                        <i class="fas fa-pen" title="Actualizar"></i>
                    </a>';
                $result['data'][] = array(
                        $i++,
                        $value['CODIGO_ASIGNATURA'],
                        $value['NOMBRE_ASIGNATURA'],
                        $value['DOCENTE']
                    );
            }
        }
        else
        {
            $result['data']= array();
        }
        echo json_encode($result);
    }

    // OBTENER ASIGNATURAS
    public function obtenerAsignatura($id)
	{
		$resultData = $this->modelAsignatura->obtenerAsignaturaModel(array('ID_ASIGNATURA' => $id));
		echo json_encode($resultData);
	}

    // ACTUALIZAR ASIGNATURAS
    public function updateAsignatura()
    {
        $where = $this->input->post('ID_ASIGNATURA_UPDATE');
        $datos = array(
			'CODIGO_ASIGNATURA' => $this->input->post('CODIGO_ASIGNATURA_UPDATE'),
			'NOMBRE_ASIGNATURA' => $this->input->post('NOMBRE_ASIGNATURA_UPDATE')
		);
        $editar = $this->modelAsignatura->updateAsignaturaModel('TBL_ASIGNATURA', $datos, array('ID_ASIGNATURA' => $where));
        if ($editar == TRUE) 
        {
            echo json_encode('Datos actualizados!');
        }
        else
        {
            echo json_encode('Error al actualizar!');
        }
    }

    // OBTENER ASIGNATURAS ASIGNADAS
    public function obtenerDocenteAsignatura($id)
	{
		$resultData = $this->modelAsignatura->obtenerDocenteAsignaturaModel(array('ID_DOCENTE_ASIGNATURA' => $id));
		echo json_encode($resultData);
	}

    // ACTUALIZAR ASIGNATURAS ASIGNADAS
    public function updateDocenteAsignatura()
    {
        $where = $this->input->post('ID_DOCENTE_ASIGNATURA_UPDATE');
        $datos = array(
			'ID_ASIGNATURA' => $this->input->post('ID_ASIGNATURA'),
			'ID_DOCENTE' => $this->input->post('ID_DOCENTE')
		);
        $editar = $this->modelAsignatura->updateDocenteAsignaturaModel('TBL_DOCENTE_ASIGNATURA', $datos, array('ID_DOCENTE_ASIGNATURA' => $where));
        if ($editar == TRUE) 
        {
            echo json_encode('Datos actualizados!');
        }
        else
        {
            echo json_encode('Error al actualizar!');
        }
    }

}
?>
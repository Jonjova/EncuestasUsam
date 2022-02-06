<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesion extends CI_Controller
{
    
    // CONSTRUCTOR PARA LLAMAR AL MODELO
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProfesionModel', 'modelProf', true);
    }

    public function profesion()
    {
        if ($this->session->userdata('is_logged') && $this->session->userdata('ID_TIPO_USUARIO') == 1)
        {
            $data = array('title' => 'USAM - Nueva Profesión' );
            $this->load->view('Layout/Header', $data);
            $this->load->view('Layout/Sidebar');
            $this->load->view('Profesion/InsertarProfesion');
            $this->load->view('Layout/Footer');
        }
        else
        {
            $this->session->set_flashdata('msjerror', 'Usted no se ha identificado.');
            redirect('/Accesos/');
            show_404();
        }
    }

    public function profesiones()
    {
        if ($this->session->userdata('is_logged') && $this->session->userdata('ID_TIPO_USUARIO') == 1)
        {
            $data = array('title' => 'USAM - Profesiones' );
            $this->load->view('Layout/Header', $data);
            $this->load->view('Layout/Sidebar');
            $this->load->view('Profesion/MostrarProfesiones');
            $this->load->view('Layout/Footer');
        }
        else
        {
            $this->session->set_flashdata('msjerror', 'Usted no se ha identificado.');
            redirect('/Accesos/');
            show_404();
        }
    }

    public function crearProfesion()
    {
        $insert = $this->modelProf->crearProfesionModel($_POST);
        if ($insert == TRUE)
        {
            echo json_encode('Datos guardados!');
        }
        else
        {
            echo json_encode('Error al guardar!');
        }
        
    }

    public function mostrarProfesiones()
    {
        $resultList = $this->modelProf->mostrarProfesionModel();
        $result = array();
        $i = 1;
        if (!empty($resultList))
        {
            foreach ($resultList as $key => $value)
            {
                $btnUpdate = 
                    '<a class="btn btn-dark" style="font-size: x-large;" onclick="obtenerProfesion('.$value['ID_PROFESION'].');" 
                        data-toggle="modal" data-target="#modalProfesion">
                        <i class="fas fa-pen" title="Actualizar"></i>
                    </a>';
                $result['data'][] = array(
                    $i++,
                    $value['NOMBRE_PROFESION'],                    
                    $value['ABREVIATURA_M'],
                    $value['ABREVIATURA_F'],
                    $btnUpdate
                );
            }
        }
        else
        {
            $result['data'] = array();
        }
        echo json_encode($result);
    }

	public function obtenerProfesion($id)
	{
		$resultData = $this->modelProf->obtenerProfesionModel(array('ID_PROFESION' => $id));
		echo json_encode($resultData);
	}

    public function updateProfesion()
    {
        $where = $this->input->post('ID_PROFESION_UPDATE');
        $nombre = $this->input->post('NOMBRE_PROFESION_UPDATE');
        $abr_m = $this->input->post('ABREVIATURA_M_UPDATE');
        $abr_f = $this->input->post('ABREVIATURA_F_UPDATE');
        $editar = $this->modelProf->updateProfesionModel('CAT_PROFESION', array('NOMBRE_PROFESION' => $nombre, 'ABREVIATURA_M' => $abr_m, 'ABREVIATURA_F' => $abr_f), array('ID_PROFESION' => $where));
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
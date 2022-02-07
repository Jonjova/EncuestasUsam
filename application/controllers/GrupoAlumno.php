<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GrupoAlumno extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('GrupoAlumnoModel', 'gam', true);
	}

	public function grupos()
	{
		if ($this->session->userdata('is_logged') && $this->session->userdata('ID_TIPO_USUARIO') == 4)
		{

			$data = array('title' => 'USAM - Grupos' );
			//header
			$this->load->view('Layout/Header', $data);
			//Body
			$this->load->view('Layout/Sidebar');
			$this->load->view('GrupoAlumno/Mostrar');
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
	
	// GUARDAR GRUPO ALUMNO
	function Guardar()
	{
		$grupo = $this->input->post('NOMBRE_GRUPO', TRUE);
		$asignatura = $this->input->post('ID_ASIGNATURA_G', TRUE);
		$ciclo = $this->input->post('CICLO_G', TRUE);
		$alumno = $this->input->post('ID_ALUMNO_GA', TRUE);
		
		$insert = $this->gam->insertGrupoAlumno($grupo, $asignatura, $ciclo, $alumno);

		if ($insert == TRUE )
		{
			echo "true";
		}
	}

	// AGREGAR ALUMNO A UN GRUPO
	function agregar()
	{
		$grupo = $this->input->post('GRUPO_GA', TRUE);
		$alumno = $this->input->post('ID_ALUMNO_GA', TRUE);
		$insert = $this->gam->agregarGrupoAlumno($grupo, $alumno);
		if ($insert == TRUE )
		{
			echo "true";
		}
	}

	//Validar si ya existe en un Grupo el Alumno
	public function validarGrupoAlumno()
	{
		$ga = $this->input->post('ID_ALUMNO_GA');
		echo $this->gam->validarGrupo($ga);
	}

	// ELIMINAR ALUMNO DE UN GRUPO
	public function eliminarGrupoAlumno($id)
	{
		return $this->gam->eliminarGrupoAlumnoModel($id);
	}

	public function mostrarGrupos()
	{
		$resultList = $this->gam->mostrarGruposModel(array('ID_DOCENTE' => $_SESSION['DOCENTE']));
        $result = array();
        $i = 1;
        if (!empty($resultList))
        {
            foreach ($resultList as $key => $value)
            {
                $btnInfo = 
                    '<a class="btn btn-dark" style="font-size: x-large;" onclick="integrantesGrupo('.$value['ID_GRUPO_ALUMNO'].');" 
                        data-toggle="modal" data-target="#modalGrupos">
                        <i class="fas fa-info-circle"></i>
                    </a>';
                $result['data'][] = array(
                    $i++,
                    $value['NOMBRE_GRUPO'],                    
                    $value['NOMBRE_ASIGNATURA'],
                    $value['COD_CICLO'],
					$value['INTEGRANTES']
					.' Integrantes &nbsp;'.
					$btnInfo
                );
            }
        }
        else
        {
            $result['data'] = array();
        }
        echo json_encode($result);
	}

	public function integrantesGrupo($grupo)
	{
		$resultData = $this->gam->integrantesGrupoModel(array('ID_GRUPO_ALUMNO' => $grupo));
		echo json_encode($resultData);
	}
	
}
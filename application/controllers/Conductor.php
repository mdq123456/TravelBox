<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conductor extends CI_Controller {

    function __construct(){
		parent:: __construct();
		$this->load->model('Model_Conductor');
		$this->load->helper('form');
    }

	public function index()
	{
		if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
			redirect('Configuracion/');
		}

        $data['getAll'] = $this->Model_Conductor->getAll();
        $data['contenido'] = "Conductor/index";
		$this->load->view('plantillaConfiguracion',$data);
	}

	public function create()
	{
		if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
			redirect('Configuracion/');
		}
		$data['msj'] = null;
		$data['contenido'] = "Conductor/create";
		$this->load->view('plantillaConfiguracion',$data);
	}

		public function editar($codConductor)
	{
		if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
			redirect('Configuracion/');
		}
		$getOne = new Model_Conductor();
		$data['getOne'] = $this->Model_Conductor->getOne($codConductor);
		$data['contenido'] = "Conductor/editar";
		$this->load->view('plantillaConfiguracion',$data);
	}

	public function create_Post()
	{
		if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
			redirect('Configuracion/');
		}
        $datos = $this->input->post();
		
        if (isset($datos)){
			$ConductorObj = new Model_Conductor();
			$ConductorObj->settearInsert($datos['txtcodCarnet'],
									$datos['txtApellidos'],
									$datos['txtNombres'],				
									$datos['txtTelefono'],
									$datos['txtEmail'],
									$datos['txtDireccion'],
                                    $datos['txtEstadoCivil'],
                                    $datos['txtEstado'],
                                    $datos['txtDni']);
			$sql=$ConductorObj->insert();

			if ($sql[0]->Retorno != 'ok'){
				$data['msj'] = $sql[0]->Retorno;
				$data['contenido'] = "conductor/create";
				$this->load->view('plantillaConfiguracion',$data);
			}
			else{
				$data['msj'] = "Conductor creado con exito!";
				$data['getAll'] = $this->Model_Conductor-> getAll();
				$data['contenido'] = "conductor/index";
				$this->load->view('plantillaConfiguracion',$data);
			}
			
        }else
		{
			$data['msj'] = 'Complete los datos para agregar un Conductor.';
			$data['contenido'] = "conductor/create";
			$this->load->view('plantillaConfiguracion',$data);
		}
	}

	public function editar_Post()
		{
			if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
				redirect('Configuracion/');
			
			}
			$datos = $this->input->post();
			
			if (isset($datos)){
				$ConductorObj = new Model_Conductor();
				$ConductorObj->settearInsert($datos['txtcodCarnet'],
									$datos['txtApellidos'],
									$datos['txtNombres'],				
									$datos['txtTelefono'],
									$datos['txtEmail'],
									$datos['txtDireccion'],
                                    $datos['txtEstadoCivil'],
                                    $datos['txtEstado'],
                                    $datos['txtDni']);
				$sql=$ConductorObj->actualizarInfo($datos['codConductor']);

				if ($sql[0]->Retorno != 'ok'){
					$data['msj'] = $sql[0]->Retorno;
					$data['contenido'] = "Conductor/editar";
					$this->load->view('plantillaConfiguracion',$data);
				}
				else{
					$this->index();
				}
				
			}else
			{
				$data['msj'] = 'Complete los datos para agregar un Conductor.';
				$data['contenido'] = "Conductor/create";
				$this->load->view('plantillaConfiguracion',$data);
			}
		}

		Public function eliminar($codConductor){
			if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
				redirect('Configuracion/');
			}
			$data['eliminar'] = $this-> Model_Conductor->eliminar($codConductor);
			$data['contenido'] = "Conductor/eliminar";
			$this->load->view('plantillaConfiguracion',$data);
		}

		public function eliminar_Post()
		{
			if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
				redirect('Configuracion/');
			}
			$datos = $this->input->post();
			if (isset($datos)){
				$ConductorObj = new Model_Conductor();
				$sql=$ConductorObj->eliminar($datos['codConductor']);
			}
			else
			{
				$data['msj'] = 'El conductor no pudo ser eliminado.';
				$data['getAll'] = $this->Model_Conductor->getAll();
				$data['contenido'] = "Conductor/index";
				$this->load->view('plantillaConfiguracion',$data);
			}
		}

}

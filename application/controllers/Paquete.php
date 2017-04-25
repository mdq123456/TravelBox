<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paquete extends CI_Controller {

    function __construct(){
		parent:: __construct();
		$this->load->model('Model_Paquete');
		$this->load->helper('form');
    }

	public function index()
	{
        $data['getAll'] = $this->Model_Paquete->getAll();
        $data['contenido'] = "paquete/index";
		$this->load->view('plantilla',$data);
	}

	public function create()
	{
		$data['msj'] = null;
		$data['contenido'] = "paquete/create";
		$this->load->view('plantilla',$data);
	}

	public function create_Post()
	{
        $datos = $this->input->post();
		
        if (isset($datos)){
			$paqueteObj = new Model_Paquete();
			$paqueteObj->settearInsert($datos['txtDni'],
									$datos['txtCuil'],
									$datos['txtApellidos'],
									$datos['txtNombres'],				
									$datos['txtTelefono'],
									$datos['txtEmail'],
									$datos['txtDireccion']);
			$sql=$paqueteObj->insert();

			if ($sql[0]->Retorno != 'ok'){
				$data['msj'] = $sql[0]->Retorno;
				$data['contenido'] = "paquete/create";
				$this->load->view('plantilla',$data);
			}
			else{
				$data['msj'] = "Cliente creado con exito!";
				$data['contenido'] = "paquete/create";
				$this->load->view('plantilla',$data);
			}
			
        }else
		{
			$data['msj'] = 'Complete los datos para agregar un Cliente.';
			$data['contenido'] = "paquete/create";
			$this->load->view('plantilla',$data);
		}
	}

}

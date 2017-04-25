<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Envio extends CI_Controller {

    function __construct(){
		parent:: __construct();
		$this->load->model('Model_Envio');
    }


	public function index()
	{
        $data['getAll'] = $this->Model_Envio->getAll();
        $data['contenido'] = "envio/index";
		$this->load->view('plantilla',$data);
	}

    public function create()
	{
		$data['msj'] = null;
		$data['getRoles'] = $this->Model_Login->getRoles();
		$this->load->view('login/create',$data);
	}

	public function create_Post()
	{
        $datos = $this->input->post();
		
        if (isset($datos)){
			$loginObj = new Model_Login();
			$loginObj->settearInsert($datos['txtLogin'],
									$datos['txtPass'],
									$datos['txtRol'],
									$datos['txtEmail']);
			$sql=$loginObj->insert();
			

			if ($sql[0]->Retorno != 'ok'){
				$data['msj'] = $sql[0]->Retorno;
				$data['getRoles'] = $this->Model_Login->getRoles();
				$this->load->view('login/create',$data);
			}
			else{
				$data['msj'] = "Usuario creado con exito!";
				$data['strConfig'] = $this->Model_SisConfig->getValue('SuperAdmin');
				$this->load->view('login/index',$data);
			}
			
        }else
		{
			$data['msj'] = 'Complete los datos para crear el usuario.';
			$data['getRoles'] = $this->Model_Login->getRoles();
			$this->load->view('login/create',$data);
		}
	}

}

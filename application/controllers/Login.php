<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
    
	function __construct(){
		parent:: __construct();
		$this->load->helper('form');
		$this->load->model('Model_Login');
		$this->load->model('Model_SisConfig');
    }


	public function index()
	{
		$data['msj'] = null;
		$data['strConfig'] = $this->Model_SisConfig->getValue('SuperAdmin');
		$this->load->view('login/index',$data);
	}

	public function lista()
	{
		// Cargar librería Para crear tabla
		$this->load->library('table');
		$template = $this->table->templateStringGet();
		$this->table->set_template($template);

		$data['contenido'] = 'login/lista';
        $data['getAll'] = $this->Model_Login->getAll();
		
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

	public function iniciarSesion_Post()
	{
        $datos = $this->input->post();

        if (isset($datos)){
            $login = $datos['txtLogin'];
			$pass = $datos['txtPassword'];
			$sql = $this->Model_Login->iniciarSesion($login,$pass);

			if (!$sql){
				$data['strConfig'] = $this->Model_SisConfig->getValue('SuperAdmin');
				$data['msj'] = "Usuario o contraseña incorrecto !";
				$this->load->view('login/index',$data);
				
			}
			else{
				// print_r('Inicio de Sesion exitoso !');
				// print_r($sql[0]->Login);
				redirect('PaginaPrincipal/');
			}
			
        }else
		{
			$data['strConfig'] = $this->Model_SisConfig->getValue('SuperAdmin');
			$this->load->view('login/index',$data);
		}
	}

	public function insertG()//InsertGet()
	{
        //$data['contenido'] = "usuario/index";
		$this->load->view('login/insert');
	}

	public function insertP()//InsertPost()
	{
		$datos = $this->input->post();
        //$data['contenido'] = "usuario/index";
		redirect('');
	}

}

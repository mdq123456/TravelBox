<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct(){
		parent:: __construct();
		$this->load->model('Model_Login');
		$this->load->model('Model_SisConfig');
    }


	public function index()
	{
		$data['strConfig'] = $this->Model_SisConfig->getValue('SuperAdmin');
		$this->load->view('login/index',$data);
	}

	public function lista()
	{
		// Cargar librería Para crear tabla
		$this->load->library('table');
		$template = $this->table->templateStringGet();
		$this->table->set_template($template);


		$data['contenido'] = 'login/index';
        $data['getAll'] = $this->Model_Login->getAll();
		
		$this->load->view('plantilla',$data);
	}

	public function iniciarSesion_Post()
	{
        $datos = $this->input->post();

        if (isset($datos)){
            $login = $datos['txtLogin'];
			$pass = $datos['txtPassword'];
			$sql = $this->Model_Login->iniciarSesion($login,$pass);

			if (!$sql){
				print_r('Usuario o contraseña invalidos !');
				exit;
			}
			else{
				// print_r('Inicio de Sesion exitoso !');
				// print_r($sql[0]->Login);
				redirect('PaginaPrincipal/');
            	exit;
			}
			
        }
		print_r('Consulta sin Datos');
		//$this->load->view('login/index');
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

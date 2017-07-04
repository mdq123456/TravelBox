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
		$usuario_data = array(
			'logueado' => FALSE
		);
		$this->session->set_userdata($usuario_data);

		$data['msj'] = null;
		// $data['strConfig'] = $this->Model_SisConfig->getValue('SuperAdmin');
		
		$data['contenido'] = 'login/index';		
		$this->load->view('plantillaLogin',$data);
	}

	public function eliminar($codLogin)
	{
		redirect('Login/lista');
	}

	public function lista()
	{
		if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
			redirect('Configuracion/');
		}

		$data['contenido'] = 'login/lista';
        $data['getAll'] = $this->Model_Login->getAll();
		
		$this->load->view('plantillaConfiguracion',$data);
	}

	public function create()
	{
		if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
			redirect('Login/lista');
		}
		$data['msj'] = null;
		$data['getRoles'] = $this->Model_Login->getRoles();
		$data['contenido'] = 'login/create';
		$this->load->view('plantillaConfiguracion',$data);
	}

	public function create_Post()
	{
		if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
			redirect('Login/');
		}
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
				$data['contenido'] = 'login/lista';
				$data['getAll'] = $this->Model_Login->getAll();
				
				$this->load->view('plantillaConfiguracion',$data);
			}
			else{


				$data['msj'] = "Usuario creado con exito!";
				$data['contenido'] = 'login/lista';
				$data['getAll'] = $this->Model_Login->getAll();
				
				$this->load->view('plantillaConfiguracion',$data);
			}
			
        }else
		{
			$data['msj'] = 'Complete los datos para crear el usuario.';
			$data['getRoles'] = $this->Model_Login->getRoles();
			$data['contenido'] = 'login/lista';
				$data['getAll'] = $this->Model_Login->getAll();
				
				$this->load->view('plantillaConfiguracion',$data);
		}
	}

	public function editar($codLogin)
	{
		redirect('Login/lista');
		if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
			redirect('Login/lista');
		}
		$data['msj'] = null;

		$unLogin = new Model_Login();
		$data['getOne'] = $unLogin ->getOne($codLogin);

		$data['contenido'] = 'login/editar';
		$this->load->view('plantillaConfiguracion',$data);
	}

	public function editar_Post()
	{
		redirect('Login/lista');
		if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
			redirect('Configuracion/');
		}
        $datos = $this->input->post();
		
        if (isset($datos)){
			$loginObj = new Model_Login();
			
			$sql=$loginObj->editarLogin($datos['txtLogin'],
									$datos['txtPass'],
									$datos['txtEmail'],
									$datos['txtEstado']);
			

			if ($sql[0]->Retorno != 'ok'){
				$data['msj'] = $sql[0]->Retorno;
				$data['getRoles'] = $this->Model_Login->getRoles();
				$this->load->view('login/editar',$data);
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
				$data['contenido'] = 'login/index';		
				$this->load->view('plantillaLogin',$data);
				
			}
			else{
				$usuario_data = array(
					'codLogin' => $sql[0]->codLogin,
					'login' => $sql[0]->Login,
					'rol' => $sql[0]->Rol,
					'email' => $sql[0]->email,
					'logueado' => TRUE
				);
				$this->session->set_userdata($usuario_data);

				// print_r('Inicio de Sesion exitoso !');
				// print_r($sql[0]->Login);
				redirect('PaginaPrincipal/');
			}
			
        }else
		{
			$data['strConfig'] = $this->Model_SisConfig->getValue('SuperAdmin');
			$data['contenido'] = 'login/index';		
		$this->load->view('plantillaLogin',$data);
		}
	}


}

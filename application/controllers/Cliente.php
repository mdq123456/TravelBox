<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

    function __construct(){
		parent:: __construct();
		$this->load->model('Model_Cliente');
		$this->load->helper('form');
    }

	public function index()
	{
		if(!$this->session->userdata('logueado')){
			redirect('Login/');
		}
        $data['getAll'] = $this->Model_Cliente->getAll();
        $data['contenido'] = "cliente/index";
		$this->load->view('plantilla',$data);
	}

	public function create()
	{
		if(!$this->session->userdata('logueado')){
			redirect('Login/');
		}
		$data['msj'] = null;
		$data['contenido'] = "cliente/create";
		$this->load->view('plantilla',$data);
	}

		public function editar($codCliente)
	{
		if(!$this->session->userdata('logueado')){
			redirect('Login/');
		}
		$getOne = new Model_Cliente();
		$data['getOne'] = $getOne ->buscarDatosCliente($codCliente);
		$data['contenido'] = "cliente/editar";
		$this->load->view('plantilla',$data);
	}

	public function eliminar($codCliente)
	{
		if(!$this->session->userdata('logueado')){
			redirect('Login/');
		}
		$data['eliminar'] = $this->Model_Cliente->eliminar($codCliente);
        $data['contenido'] = "cliente/eliminar";
		$this->load->view('plantilla',$data);
	}

	public function eliminar_Post()
	{
		if(!$this->session->userdata('logueado')){
			redirect('Login/');
		}
        $datos = $this->input->post();
		
		if (isset($datos)){
			$clienteObj = new Model_Cliente();
			$sql=$clienteObj->eliminar($datos['codCliente']);
		}
		else
		{
			$data['msj'] = 'El cliente no se puede eliminar.';
			$data['contenido'] ="cliente/eliminar";
			$this->load->view('plantilla',$data);
		}
	}

	public function create_Post()
	{
		if(!$this->session->userdata('logueado')){
			redirect('Login/');
		}
        $datos = $this->input->post();
		
        if (isset($datos)){
			$clienteObj = new Model_Cliente();
			$clienteObj->settearInsert($datos['txtDni'],
									$datos['txtCuil'],
									$datos['txtApellidos'],
									$datos['txtNombres'],				
									$datos['txtTelefono'],
									$datos['txtEmail'],
									$datos['txtDireccion']);
			$sql=$clienteObj->insert();

			if ($sql[0]->Retorno != 'ok'){
				$data['msj'] = $sql[0]->Retorno;
				$data['contenido'] = "cliente/create";
				$this->load->view('plantilla',$data);
			}
			else{
				$data['msj'] = "Cliente creado con exito!";
				$data['getAll'] = $this->Model_Cliente->getAll();
        		$data['contenido'] = "cliente/index";
				$this->load->view('plantilla',$data);
			}
			
        }else
		{
			$data['msj'] = 'Complete los datos para agregar un Cliente.';
			$data['contenido'] = "cliente/create";
			$this->load->view('plantilla',$data);
		}
	}

	public function editar_Post()
	{
		if(!$this->session->userdata('logueado')){
			redirect('Login/');
		}
        $datos = $this->input->post();
		
        if (isset($datos)){
			$clienteObj = new Model_Cliente();
			$clienteObj->settearInsert($datos['txtDni'],
									$datos['txtCuil'],
									$datos['txtApellidos'],
									$datos['txtNombres'],				
									$datos['txtTelefono'],
									$datos['txtEmail'],
									$datos['txtDireccion']);
			$sql=$clienteObj->actualizarInfo($datos['codCliente']);
			
			if ($sql[0]->Retorno != 'ok'){
				$data['msj'] = $sql[0]->Retorno;
				$data['contenido'] = "cliente/editar";
				$this->load->view('plantilla',$data);
			}
			else{
				$this->index();
				// $data['msj'] = null;
                // $data['codEnvio'] = $sql[0]->codEnvio;
                // $data['codDetalleEnvio'] = $sql[0]->codDetalleEnvio;
				// $data['contenido'] = "cliente/index";
				// $this->load->view('plantillaMapa',$data);
			}
			
			//header('Location: index.php');
        }else
		{
			$data['msj'] = 'Complete los datos para que el cliente sea modificado.';
			$data['contenido'] = "cliente/editar";
			$this->load->view('plantilla',$data);
		}
	}

}

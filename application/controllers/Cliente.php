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
        $data['getAll'] = $this->Model_Cliente->getAll();
        $data['contenido'] = "cliente/index";
		$this->load->view('plantilla',$data);
	}

	public function create()
	{
		$data['msj'] = null;
		$data['contenido'] = "cliente/create";
		$this->load->view('plantilla',$data);
	}

		public function editar($codCliente)
	{
		$getOne = new Model_Cliente();
		$data['getOne'] = $getOne ->buscarDatosCliente($codCliente);
		$data['contenido'] = "cliente/editar";
		$this->load->view('plantilla',$data);
	}

	public function create_Post()
	{
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

}

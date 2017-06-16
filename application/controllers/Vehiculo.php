<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehiculo extends CI_Controller {

    function __construct(){
		parent:: __construct();
		$this->load->model('Model_Vehiculo');
		$this->load->helper('form');
    }

	public function index()
	{
        $data['getAll'] = $this->Model_Vehiculo->getAll();
        $data['contenido'] = "vehiculo/index";
		$this->load->view('plantilla',$data);
	}

	public function create()
	{
		$data['msj'] = null;
		$data['contenido'] = "vehiculo/create";
		$this->load->view('plantilla',$data);
	}

	public function create_Post()
	{
        $datos = $this->input->post();
		
        if (isset($datos)){
			$vehiculoObj = new Model_Vehiculo();
			$vehiculoObj->settearInsert($datos['txtPatente'],
									$datos['txtModelo'],
									$datos['txtMarca'],
									$datos['txtCapacidad'],				
									$datos['txtTipoVehiculo']);
			$sql=$clienteObj->insert();

			if ($sql[0]->Retorno != 'ok'){
				$data['msj'] = $sql[0]->Retorno;
				$data['contenido'] = "vehiculo/create";
				$this->load->view('plantilla',$data);
			}
			else{
				$data['msj'] = "Vehiculo dado de alta satisfactoriamente!";
				$data['contenido'] = "vehiculo/index";
				$this->load->view('plantilla',$data);
			}
			
        }else
		{
			$data['msj'] = 'Completar los datos correctamente.';
			$data['contenido'] = "cliente/create";
			$this->load->view('plantilla',$data);
		}
	}

}

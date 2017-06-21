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
	public function editar($codVehiculo)
	{
		$data['getOne'] = $this->Model_Vehiculo->getOne($codVehiculo);
        $data['contenido'] = "vehiculo/editar";
		$this->load->view('plantilla',$data);
	}

	public function eliminar($codVehiculo)
	{
		$data['eliminar'] = $this->Model_Vehiculo->eliminar($codVehiculo);
        $data['contenido'] = "vehiculo/eliminar";
		$this->load->view('plantilla',$data);
	}
public function eliminar_Post()
		{
        $datos = $this->input->post();
		 if (isset($datos)){
		$vehiculoObj = new Model_Vehiculo();
		$sql=$vehiculoObj->eliminar($datos['codVehiculo']);
		 }
		 else
		 {
			 $data['msj'] = 'El vehiculo no se puede eliminar.';
			 $data['contenido'] ="vehiculo/eliminar";
			 $this->load->view('plantilla',$data);
		 }
		}





	public function editar_Post()
		{
        $datos = $this->input->post();

        if (isset($datos)){
			$vehiculoObj = new Model_Vehiculo();
			$vehiculoObj->settearInsert($datos['txtPatente'],
									$datos['txtModelo'],
									$datos['txtMarca'],
									$datos['txtCapacidad'],				
									$datos['txtTipoVehiculo']);
			$sql=$vehiculoObj->actualizarInfo($datos['codVehiculo']);
			
			if ($sql[0]->Retorno != 'ok'){
				$data['msj'] = $sql[0]->Retorno;
				$data['contenido'] = "vehiculo/editar";

				$this->load->view('plantilla',$data);
			}
		else
		{
			$this->index();
		}
			}else
		{
			$data['msj'] = 'Complete los datos para que el Vehiculo sea modificado.';
			$data['contenido'] = "vehiculo/editar";
			$this->load->view('plantilla',$data);
		}
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
			$sql=$vehiculoObj->insert();

			if ($sql[0]->Retorno != 'ok'){
				$data['msj'] = $sql[0]->Retorno;
				$data['contenido'] = "vehiculo/create";

				$this->load->view('plantilla',$data);
			}
			else{
				$data['msj'] = "Vehiculo dado de alta satisfactoriamente!";
				$data['getAll'] = $this->Model_Vehiculo->getAll();
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

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
		if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
			redirect('Configuracion/');
		}
        $data['getAll'] = $this->Model_Vehiculo->getAll();
        $data['contenido'] = "vehiculo/index";
		$this->load->view('plantillaConfiguracion',$data);
	}

	public function create()
	{
		if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
			redirect('Configuracion/');
		}
		$data['msj'] = null;
		$data['contenido'] = "vehiculo/create";
		$this->load->view('plantillaConfiguracion',$data);
	}
	public function editar($codVehiculo)
	{
		if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
			redirect('Configuracion/');
		}
		$data['getOne'] = $this->Model_Vehiculo->getOne($codVehiculo);
        $data['contenido'] = "vehiculo/editar";
		$this->load->view('plantillaConfiguracion',$data);
	}

	public function eliminar($codVehiculo)
	{
		if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
			redirect('Configuracion/');
		}
		$data['eliminar'] = $this->Model_Vehiculo->eliminar($codVehiculo);
        $data['contenido'] = "vehiculo/eliminar";
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
		$vehiculoObj = new Model_Vehiculo();
		$sql=$vehiculoObj->eliminar($datos['codVehiculo']);
		 }
		 else
		 {
			 $data['msj'] = 'El vehiculo no se puede eliminar.';
			 $data['getAll'] = $this->Model_Vehiculo->getAll();
			 $data['contenido'] ="vehiculo/index";
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

				$this->load->view('plantillaConfiguracion',$data);
			}
		else
		{
			$this->index();
		}
			}else
		{
			$data['msj'] = 'Complete los datos para que el Vehiculo sea modificado.';
			$data['contenido'] = "vehiculo/editar";
			$this->load->view('plantillaConfiguracion',$data);
		}
	}
	public function create_Post()
	{
		if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
			redirect('Configuracion/');
		}
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

				$this->load->view('plantillaConfiguracion',$data);
			}
			else{
				$data['msj'] = "Vehiculo dado de alta satisfactoriamente!";
				$data['getAll'] = $this->Model_Vehiculo->getAll();
				$data['contenido'] = "vehiculo/index";
				$this->load->view('plantillaConfiguracion',$data);
			}
			
        }else

		{
			$data['msj'] = 'Completar los datos correctamente.';
			$data['contenido'] = "cliente/create";
			$this->load->view('plantilla',$data);
		}
	}

}

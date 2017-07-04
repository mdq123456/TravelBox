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
		if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
			redirect('Configuracion/');
		}
        $data['getAll'] = $this->Model_Paquete->getAll();
        $data['contenido'] = "paquete/index";
		$this->load->view('plantillaConfiguracion',$data);
	}

	public function modification($codPaquete)
	{
		if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
			redirect('Configuracion/');
		}
		$data['getOne'] = $this->Model_Paquete->getOne($codPaquete);
        $data['contenido'] = "paquete/modification";
		$this->load->view('plantillaConfiguracion',$data);
	}
	
	public function modification_Post()
	{
		if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
			redirect('Configuracion/');
		}
        $datos = $this->input->post();

        if (isset($datos)){
			$paqueteObj = new Model_Paquete();
			$paqueteObj->settearInsert($datos['txtAncho'],
									$datos['txtLargo'],
									$datos['txtAlto'],
									$datos['txtNivelFragilidad'],				
									$datos['txtPeso'],
									$datos['txtObservaciones']);
			$sql=$paqueteObj->actualizarinfo($datos['codPaquete']);

			if ($sql[0]->Retorno != 'ok'){
				$data['msj'] = $sql[0]->Retorno;
				$data['contenido'] = "paquete/modification";
				$this->load->view('plantilla',$data);
			}
			else{
				$this->index();
				
			}
			
			//header('Location: index.php');
        }else
		{
			$data['msj'] = 'Complete los datos para que el Paquete sea modificado.';
			$data['contenido'] = "paquete/modification";
			$this->load->view('plantilla',$data);
		}
	}

	public function create($codCliente)
	{
		if(!$this->session->userdata('logueado')){
			redirect('Login/');
		}
		$data['msj'] = null;
		$data['contenido'] = "paquete/create";
        $data['codCliente'] = $codCliente;
		$this->load->view('plantilla',$data);
	}

	public function create_Post()
	{
		if(!$this->session->userdata('logueado')){
			redirect('Login/');
		}
        $post = $this->input->post();
		
        if (isset($post)){
			$paqueteObj = new Model_Paquete();
			$paqueteObj->settearInsert($post['txtAncho'],
									$post['txtLargo'],
									$post['txtAlto'],
									$post['txtNivelFragilidad'],				
									$post['txtPeso'],
									$post['txtObservaciones']);
			

			$sql=$paqueteObj->insert($post['codCliente']);
			// print_r($post['codCliente']);
			// exit();
			//si finaliza de base trae ok, aunque el form este en blanco
			if ($sql[0]->Retorno != 'ok'){
				
				$data['msj'] = $sql[0]->Retorno;
				$data['contenido'] = "paquete/create";
				$data['codCliente'] = $post['codCliente'];
				$this->load->view('plantilla',$data);
				
			}else{
				
				if ($post['boton'] != "Finalizar") {
					$this->create($post['codCliente']);
				}else{
					// redirect('Envio/destino/null/'.$sql[0]->codEnvio.'/'.$sql[0]->codDetalleEnvio);

					$data['msj'] = null;
					$data['codEnvio'] = $sql[0]->codEnvio;
					$data['codDetalleEnvio'] = $sql[0]->codDetalleEnvio;
					$data['contenido'] = "envio/destino";
					$this->load->view('plantillaMapa',$data);
					
				}
			}
			
        }else{
			$data['msj'] = 'Complete los datos para agregar un Paquete.';
			$data['contenido'] = "paquete/create/".$post['codCliente'];
			$this->load->view('plantilla',$data);
		}
	}

	public function delete($codPaquete)
	{
		if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
			redirect('Configuracion/');
		}
		$data['delete'] = $this->Model_Paquete->delete($codPaquete);
        $data['contenido'] = "paquete/delete";
		$this->load->view('plantillaConfiguracion',$data);
	}


	public function delete_Post()
	{
		if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
			redirect('Configuracion/');
		}
        $datos = $this->input->post();

        if (isset($datos)){
			$paqueteObj = new Model_Paquete();
			$sql=$paqueteObj->delete($datos['codPaquete']);

		}else
		{
			$data['msj'] = 'El paquete no puede eliminarse.';
			$data['getAll'] = $this->Model_Paquete->getAll();
			$data['contenido'] = "paquete/index";
			$this->load->view('plantillaConfiguracion',$data);
		}
	}

}

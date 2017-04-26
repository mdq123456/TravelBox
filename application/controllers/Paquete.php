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
        $data['getAll'] = $this->Model_Paquete->getAll();
        $data['contenido'] = "paquete/index";
		$this->load->view('plantilla',$data);
	}

	public function create($codCliente)
	{
		$data['msj'] = null;
		$data['contenido'] = "paquete/create";
        $data['codCliente'] = $codCliente;
		$this->load->view('plantilla',$data);
	}

	public function create_Post()
	{
        $datos = $this->input->post();

        if (isset($datos)){
			$paqueteObj = new Model_Paquete();
			$paqueteObj->settearInsert($datos['txtAncho'],
									$datos['txtLargo'],
									$datos['txtAlto'],
									$datos['txtNivelFragilidad'],				
									$datos['txtPeso'],
									$datos['txtObservaciones']);
			$sql=$paqueteObj->insert($datos['codCliente']);

			if ($sql[0]->Retorno != 'ok'){
				$data['msj'] = $sql[0]->Retorno;
				$data['contenido'] = "paquete/create";
				$this->load->view('plantilla',$data);
			}
			else{
				$data['msj'] = null;
                $data['codEnvio'] = $sql[0]->codEnvio;
                $data['codDetalleEnvio'] = $sql[0]->codDetalleEnvio;
				$data['contenido'] = "envio/destino";
				$this->load->view('plantillaMapa',$data);
			}
			
        }else
		{
			$data['msj'] = 'Complete los datos para agregar un Cliente.';
			$data['contenido'] = "paquete/create";
			$this->load->view('plantilla',$data);
		}
	}

}

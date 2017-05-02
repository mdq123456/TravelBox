<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Envio extends CI_Controller {

    function __construct(){
		parent:: __construct();
		$this->load->model('Model_Envio');
    }


	public function index()
	{
        $data['getAll'] = $this->Model_Envio->getAll();
        $data['contenido'] = "envio/index";
		$this->load->view('plantilla',$data);
	}

    public function destino()
	{
		$data['msj'] = null;
		$data['contenido'] = "envio/destino";
		$this->load->view('plantillaMapa',$data);
	}

	public function destino_Post()
	{
        $datos = $this->input->post();

        if (isset($datos)){
			$envioObj = new Model_Envio();
			$envioObj->settearInsert($datos['codEnvio'],
									$datos['codDetalleEnvio'],
									$datos['txtFechaEntrega'],
									$datos['txtdirDestino'],
									$datos['txtLatLon']);
			$sql=$envioObj->insert();
			

			if ($sql[0]->Retorno != 'ok'){
				$data['msj'] = $sql[0]->Retorno;
				$data['contenido'] = "envio/destino";
				$this->load->view('plantillaMapa',$data);
			}
			else{
				redirect('Envio/');
			}
			
        }else
		{
			$data['msj'] = 'Complete los datos para crear el usuario.';
			$data['contenido'] = "envio/destino";
			$this->load->view('plantillaMapa',$data);;
		}
	}

}

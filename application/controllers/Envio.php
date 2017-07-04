<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Envio extends CI_Controller {

    function __construct(){
		parent:: __construct();
		$this->load->model('Model_Envio');
		$this->load->helper('form');
    }


	public function index()
	{
		if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
			redirect('paginaPrincipal/');
		}
		$data['msj'] = null;
        $data['getAll'] = $this->Model_Envio->getAll();
        $data['contenido'] = "envio/index";
		$this->load->view('plantillaMapaRuta',$data);
	}

    public function destino()
	{
		if(!$this->session->userdata('logueado')){
			redirect('Login/');
		}
		$data['msj'] = null;
		$data['contenido'] = "envio/destino";
		$this->load->view('plantillaMapa',$data);
	}

	public function destino_Post()
	{
		if(!$this->session->userdata('logueado')){
			redirect('Login/');
		}
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
			$data['codEnvio'] = $datos['codEnvio'];
			$data['codDetalleEnvio'] = $datos['codDetalleEnvio'];
			$data['contenido'] = "envio/destino";
			$this->load->view('plantillaMapa',$data);
		}
	}

	public function rutas_Post()
	{
		if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
			redirect('Login/');
		}
        $datos = $this->input->post();

        if (isset($datos)){
			$envioObj = new Model_Envio();
			$array = $datos['destinos'];

			for ($i=0;$i<count($array);$i++) 
			{ 
				$sql=$envioObj->cargarDestino($array[$i]);

				if ($sql[0]->Retorno != 'ok'){
					$data['msj'] = $sql[0]->Retorno;
					$data['contenido'] = "envio/index";
					$this->load->view('plantillaMapaRuta',$data);
				}
			}
				redirect('Envio/');
        }else
		{
			$data['msj'] = 'Complete los datos para crear el usuario.';
			$data['getAll'] = $this->Model_Envio->getAll();
			$data['contenido'] = "envio/index";
			$this->load->view('plantillaMapaRuta',$data);
		}
	}

	public function enTransito()
	{
		// debe ser conductor para ver esta vista
		if(!$this->session->userdata('logueado')
			|| ($this->session->userdata('rol') != 4 && $this->session->userdata('rol') != 1)){
			redirect('paginaPrincipal/');
		}
		$data['msj'] = null;
        $data['getAll'] = $this->Model_Envio->getAllEnTransito();
        $data['contenido'] = "envio/enTransito";
		$this->load->view('plantillaMapaRuta',$data);
	}

	public function completados_Post()
	{
		if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 4){
			redirect('Envio/enTransito');
		}
        $datos = $this->input->post();

        if (isset($datos)){
			$envioObj = new Model_Envio();
			$array = $datos['destinos'];

			for ($i=0;$i<count($array);$i++) 
			{
				if ($datos['boton'] == 'Entregado') {
					$sql=$envioObj->setearEnvio($array[$i],$datos['boton']);
				}else {
					$sql=$envioObj->setearEnvio($array[$i],'Registrado');
				}
				

				if ($sql[0]->Retorno != 'ok'){
					$data['msj'] = $sql[0]->Retorno;
					$data['contenido'] = "envio/enTransito";
					$this->load->view('plantillaMapaRuta',$data);
				}
			}

			redirect('Envio/enTransito');

        }else
		{
			$data['msj'] = 'Complete los datos para crear el usuario.';
			$data['getAll'] = $this->Model_Envio->getAll();
			$data['contenido'] = "envio/index";
			$this->load->view('plantillaMapaRuta',$data);
		}
	}

}

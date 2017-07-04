<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracion extends CI_Controller {
	
    
	function __construct(){
		parent:: __construct();
		$this->load->helper('form');
		$this->load->model('Model_Login');
		$this->load->model('Model_SisConfig');
    }

	public function index()
	{
		if(!$this->session->userdata('logueado')
			|| $this->session->userdata('rol') != 1){
			redirect('paginaPrincipal/');
		}
		$data['msj'] = null;
		// $data['strConfig'] = $this->Model_SisConfig->getValue('SuperAdmin');
        $data['contenido'] = "paginaPrincipal/configuracion";
		$this->load->view('plantillaConfiguracion',$data);
	}


}

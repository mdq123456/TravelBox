<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    function __construct(){
		parent:: __construct();
    }


	public function index()
	{
        $data['contenido'] = "usuario/index";
		$this->load->view('plantilla',$data);
	}
}

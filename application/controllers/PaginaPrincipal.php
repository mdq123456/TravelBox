<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class PaginaPrincipal extends CI_Controller {

    function __construct(){
		parent:: __construct();
    }


	public function index()
	{
        $data['contenido'] = "paginaPrincipal/index";
		$this->load->view('plantilla',$data);
	}
}

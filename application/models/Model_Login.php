<?php

class Model_Login extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getAll(){
        
        $query = $this->db->query("SP_LOGIN_GETALL");

        return $query;

    }

    public function iniciarSesion($login,$pass){
        
        $query = $this->db->query("SP_LOGIN_INICIO_SESION '".$login."','".$pass."'");
        return $query->result();

    }

    

}

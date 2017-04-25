<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_SisConfig extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getValue($strConfig){
        
        $query = $this->db->query("SP_SISCONFIG_GETVALUE '".$strConfig."'");

        return $query->result();

    }

    

}
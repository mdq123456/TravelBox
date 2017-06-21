<?php

class Model_Vehiculo extends CI_Model{

    //private $codVehiculo;
    private $Patente;
    private $Modelo;
    private $Marca;
    private $Capacidad;
    private $TipoVehiculo;

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    private function SETcodVehiculo($codVehiculo) {$this->codVehiculo = $codVehiculo;}
    public function GETcodVehiculo() {return $this->codVehiculo;}
    private function SETPatente($Patente) {$this->Patente = $Patente;}
    public function GETPatente() {return $this->Patente;}
    private function SETModelo($Modelo) {$this->Modelo = $Modelo;}
    public function GETMdelo() {return $this->Modelo;}
    private function SETMarca($Marca) {$this->Marca = $Marca;}
    public function GETMarca() {return $this->Marca;}
    private function SETCapacidad($Capacidad) {$this->Capacidad = $Capacidad;}
    public function GETCapacidad() {return $this->Capacidad;}
    private function SETTipoVehiculo($TipoVehiculo) {$this->TipoVehiculo = $TipoVehiculo;}
    public function GETTipoVehiculo() {return $this->TipoVehiculo;}


    public function getAll(){
        $query = $this->db->query("SP_VEHICULO_GETALL");
        return $query->result();

    }
    public function getOne($codVehiculo){
        $query = $this->db->query("SP_VEHICULO_GETONE ".$codVehiculo);
        return $query->result();
    }

    
    public function actualizarInfo($codVehiculo){
        // print_r("SP_VEHICULO_EDITAR ".      $this->codVehiculo.",".
        //                                     $this->Patente.",".
        //                                     $this->Modelo.",".
        //                                     $this->Marca.",".
        //                                     $this->Capacidad.",".
        //                                     $this->TipoVehiculo.",'");

        //                                     exit();
         $query = $this->db->query("SP_VEHICULO_EDITAR ".
                                            $codVehiculo.",'".
                                            $this->Patente."','".
                                            $this->Modelo."','".
                                            $this->Marca."','".
                                            $this->Capacidad."','".
                                            $this->TipoVehiculo."'");
            
        return $query->result();
    }
//$codVehiculo,
    public function settearInsert($Patente,
                                 $Modelo,
                                 $Marca,
                                 $Capacidad,
                                 $TipoVehiculo){
      //  $this->SETcodVehiculo($codVehiculo);
        $this->SETPatente($Patente);
        $this->SETModelo($Modelo);
        $this->SETMarca($Marca);
        $this->SETCapacidad($Capacidad);
        $this->SETTipoVehiculo($TipoVehiculo);
    }

    public function insert(){
        $query = $this->db->query("SP_VEHICULO_AGREGAR_VEHICULO '".
                                            //$this->codVehiculo."','".
                                            $this->Patente."','".
                                            $this->Modelo."','".
                                            $this->Marca."','".
                                            $this->Capacidad."','".
                                            $this->TipoVehiculo."'");
            
        return $query->result();
    }
    public function eliminar($codVehiculo){
 $query = $this->db->query("SP_VEHICULO_ELIMINAR ". $codVehiculo);
         return $query->result();
     }

    

}
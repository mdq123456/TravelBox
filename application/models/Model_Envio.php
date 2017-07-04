<?php

class Model_Envio extends CI_Model{

    private $codEnvio;
    private $codDetalleEnvio;
    private $FechaEnvio;
    private $Destino;
    private $LatLon;

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    private function SETcodEnvio($codEnvio) {$this->codEnvio = $codEnvio;}
    public function GETcodEnvio() {return $this->codEnvio;}
    private function SETcodDetalleEnvio($codDetalleEnvio) {$this->codDetalleEnvio = $codDetalleEnvio;}
    public function GETcodDetalleEnvio() {return $this->codDetalleEnvio;}
    private function SETFechaEnvio($FechaEnvio) {$this->FechaEnvio = $FechaEnvio;}
    public function GETFechaEnvio() {return $this->FechaEnvio;}
    private function SETDestino($Destino) {$this->Destino = $Destino;}
    public function GETDestino() {return $this->Destino;}
    private function SETLatLon($LatLon) {$this->LatLon = $LatLon;}
    public function GETLatLon() {return $this->LatLon;}

    public function getAll(){
        $query = $this->db->query("SP_ENVIO_GETALL");
        return $query->result();
    }

    public function getAllEnTransito(){
        $query = $this->db->query("SP_ENVIO_GETALL_ENTRANSITO");
        return $query->result();
    }

    public function settearInsert($codEnvio,
                                 $codDetalleEnvio,
                                 $FechaEnvio,
                                 $Destino,
                                 $LatLon){
        $this->SETcodEnvio($codEnvio);
        $this->SETcodDetalleEnvio($codDetalleEnvio);
        $this->SETFechaEnvio($FechaEnvio);
        $this->SETDestino($Destino);
        $this->SETLatLon($LatLon);
    }

    public function insert(){
        $query = $this->db->query("SP_ENVIO_CONFIRMAR_ENVIO '".
                                            $this->codEnvio."','".
                                            $this->codDetalleEnvio."','".
                                            $this->FechaEnvio."','".
                                            $this->Destino."','".
                                            $this->LatLon."'");
            
        return $query->result();
    }

    public function cargarDestino($codDetalleEnvio){
        $query = $this->db->query("SP_ENVIO_ASIGNAR_ENVIOS '".$codDetalleEnvio."'");
            
        return $query->result();
    }

    public function setearEnvio($codDetalleEnvio,$estado){
        $query = $this->db->query("SP_ENVIO_CAMBIO_ESTADO '".$codDetalleEnvio."','".
                                                             $estado."'");
            
        return $query->result();
    }

}
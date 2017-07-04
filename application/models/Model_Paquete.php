<?php

class Model_Paquete extends CI_Model{

    private $codPaquete;
    private $codDetalleEnvio;
    private $TipoPaquete;
    private $Ancho;
    private $Largo;
    private $Alto;
    private $NivelFragilidad;
    private $Peso;
    private $Observaciones;
    private $Estado;

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    private function SETcodPaquete($codPaquete) {$this->codPaquete = $codPaquete;}
    public function GETcodPaquete() {return $this->codPaquete;}
    private function SETcodDetalleEnvio($codDetalleEnvio) {$this->codDetalleEnvio = $codDetalleEnvio;}
    public function GETcodDetalleEnvio() {return $this->codDetalleEnvio;}
    private function SETTipoPaquete($TipoPaquete) {$this->TipoPaquete = $TipoPaquete;}
    public function GETTipoPaquete() {return $this->TipoPaquete;}
    private function SETAncho($Ancho) {$this->Ancho = $Ancho;}
    public function GETAncho() {return $this->Ancho;}
    private function SETLargo($Largo) {$this->Largo = $Largo;}
    public function GETLargo() {return $this->Largo;}
    private function SETAlto($Alto) {$this->Alto = $Alto;}
    public function GETAlto() {return $this->Alto;}
    private function SETNivelFragilidad($NivelFragilidad) {$this->NivelFragilidad = $NivelFragilidad;}
    public function GETNivelFragilidad() {return $this->NivelFragilidad;}
    private function SETPeso($Peso) {$this->Peso = $Peso;}
    public function GETPeso() {return $this->Peso;}
    private function SETObservaciones($Observaciones) {$this->Observaciones = $Observaciones;}
    public function GETObservaciones() {return $this->Observaciones;}
    private function SETEstado($Estado) {$this->Estado = $Estado;}
    public function GETEstado() {return $this->Estado;}

    public function getAll(){
        $query = $this->db->query("SP_PAQUETE_GETALL");
        return $query->result();
    }

    public function settearInsert($Ancho,
                                $Largo,
                                $Alto,
                                $NivelFragilidad,
                                $Peso,
                                $Observaciones){
        $this->SETAncho($Ancho);
        $this->SETLargo($Largo);
        $this->SETAlto($Alto);
        $this->SETNivelFragilidad($NivelFragilidad);
        $this->SETPeso($Peso);
        $this->SETObservaciones($Observaciones);
    }

    public function insert($codCliente){
        
        
        $query = $this->db->query("SP_PAQUETE_AGREGAR_PAQUETE '".
                                            ($this->Ancho == ''? null : $this->Ancho)."','".
                                            ($this->Largo == ''? null : $this->Largo)."','".
                                            ($this->Alto == ''? null : $this->Alto)."','".
                                            ($this->NivelFragilidad == ''? null : $this->NivelFragilidad)."','".
                                            ($this->Peso == ''? null : $this->Peso)."','".
                                            ($this->Observaciones == ''? null : $this->Observaciones)."','".
                                            $codCliente."'");
            
        return $query->result();
    }

    public function Delete($codPaquete){
        $query = $this->db->query("SP_PAQUETE_ELIMINAR ".$codPaquete);
        return $query->result();
    }

    public function getOne($codPaquete){
        $query = $this->db->query("SP_PAQUETE_GETONE ".$codPaquete);
        return $query->result();
    }

    public function actualizarInfo($codPaquete){
        $query = $this->db->query("SP_PAQUETE_MODIFICAR '".
                                            $codPaquete."','".
                                            ($this->Ancho == ''? null : $this->Ancho)."','".
                                            ($this->Largo == ''? null : $this->Largo)."','".
                                            ($this->Alto == ''? null : $this->Alto)."','".
                                            ($this->NivelFragilidad == ''? null : $this->NivelFragilidad)."','".
                                            ($this->Peso == ''? null : $this->Peso)."','".
                                            ($this->Observaciones == ''? null : $this->Observaciones)."'");
        return $query->result();
    
    }


}
<?php

class Model_Cliente extends CI_Model{

    private $codPaquete;
    private $codDetalleEnvio;
    private $TipoPaquete;
    private $Ancho;
    private $Largo;
    private $Alto;
    private $NivelFragilidad;
    private $Peso;
    private $Obsevaciones;
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
    private function SETObsevaciones($Obsevaciones) {$this->Obsevaciones = $Obsevaciones;}
    public function GETObsevaciones() {return $this->Obsevaciones;}
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
                                $Obsevaciones,
                                $Estado){
        $this->SETAncho($Ancho);
        $this->SETLargo($Largo);
        $this->SETAlto($Alto);
        $this->SETNivelFragilidad($NivelFragilidad);
        $this->SETPeso($Peso);
        $this->SETObsevaciones($Obsevaciones);
        $this->SETEstado($Estado);
    }

    public function insert(){
        $query = $this->db->query("SP_PAQUETE_AGREGAR_CLIENTE '".
                                            $this->dni."','".
                                            $this->cuilt."','".
                                            $this->apelidos."','".
                                            $this->nombres."','".
                                            $this->telefono."','".
                                            $this->email."','".
                                            $this->direccion."'");
            
        return $query->result();
    }

    

}
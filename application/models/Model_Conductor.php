<?php

class Model_Conductor extends CI_Model{

    private $codConductor;
    private $codCarnet;
    private $apellidos;
    private $nombres;
    private $telefono;
    private $email;
    private $direccion;
    private $EstadoCivil;
    private $Estado;
    private $dni;

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    private function SETcodConductor($codConductor) {$this->codConductor = $codConductor;}
    public function GETcodConductor() {return $this->codConductor;}
    private function SETcodCarnet($codCarnet) {$this->codCarnet = $codCarnet;}
    public function GETcodCarnet() {return $this->codCarnet;}
    private function SETapellidos($apellidos) {$this->apellidos = $apellidos;}
    public function GETapellidos() {return $this->apellidos;}
    private function SETnombres($nombres) {$this->nombres = $nombres;}
    public function GETnombres() {return $this->nombres;}
    private function SETtelefono($telefono) {$this->telefono = $telefono;}
    public function GETtelefono() {return $this->telefono;}
    private function SETemail($email) {$this->email = $email;}
    public function GETemail() {return $this->email;}
    private function SETdireccion($direccion) {$this->direccion = $direccion;}
    public function GETdireccion() {return $this->direccion;}
    private function SETestadoCivil($EstadoCivil) {$this->EstadoCivil = $EstadoCivil;}
    public function GETestadoCivil() {return $this->EstadoCivil;}
    private function SETestado($Estado) {$this->Estado = $Estado;}
    public function GETestado() {return $this->estado;}
    private function SETdni($dni) {$this->dni = $dni;}
    public function GETdni() {return $this->dni;}

    public function getAll(){
        $query = $this->db->query("SP_CONDUCTOR_GETALL ");
        return $query->result();
    }

    public function getONE($codConductor){
        $query = $this->db->query("SP_CONDUCTOR_GETONE ".$codConductor);
        return $query->result();
    }

    public function settearInsert(
                                $codCarnet,
                                $apellidos,
                                $nombres,
                                $telefono,
                                $email,
                                $direccion,
                                $EstadoCivil,
                                $Estado,
                                $dni){
      
        $this->SETcodCarnet($codCarnet);
        $this->SETapellidos($apellidos);
        $this->SETnombres($nombres);
        $this->SETtelefono($telefono);
        $this->SETemail($email);
        $this->SETdireccion($direccion);
        $this->SETestadoCivil($EstadoCivil);
        $this->SETestado($Estado);
        $this->SETdni($dni);
    }
         public function eliminar($codConductor){
             $query = $this->db->query("SP_CONDUCTOR_ELIMINAR ". $codConductor);
            return $query->result();
     }

    public function insert(){
        $query = $this->db->query("SP_CONDUCTOR_AGREGAR_CONDUCTOR '".
                                           
                                            $this->codCarnet."','".
                                            $this->apellidos."','".
                                            $this->nombres."','".
                                            $this->telefono."','".
                                            $this->email."','".
                                            $this->direccion."','".
                                            $this->EstadoCivil."','".
                                            $this->Estado."','".
                                            $this->dni."'");
            
        return $query->result();
    }

    public function buscarDatosConductor($codConductor){
        $query = $this->db->query("SP_CONDUCTOR_BUSCARCONDUCTOR ".$codConductor);
        return $query->result();
        }
    public function actualizarInfo($codConductor){
            $query = $this->db->query("SP_CONDUCTOR_MODIFICAR ".
                                            $codConductor.",'".
                                            $this->codCarnet."','".
                                            $this->apellidos."','".
                                            $this->nombres."','".
                                            $this->telefono."','".
                                            $this->email."','".
                                            $this->direccion."','".
                                            $this->EstadoCivil."','".
                                            $this->Estado."','".
                                            $this->dni."'");

            return $query->result();
    }
    

}
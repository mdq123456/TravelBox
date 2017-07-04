<?php

class Model_Cliente extends CI_Model{

    private $codCliente;
    private $dni;
    private $cuilt;
    private $apellidos;
    private $nombres;
    private $telefono;
    private $email;
    private $direccion;

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    private function SETcodCliente($codCliente) {$this->codCliente = $codCliente;}
    public function GETcodCliente() {return $this->codCliente;}
    private function SETdni($dni) {$this->dni = $dni;}
    public function GETdni() {return $this->dni;}
    private function SETcuilt($cuilt) {$this->cuilt = $cuilt;}
    public function GETcuilt() {return $this->cuilt;}
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

    public function getAll(){
        $query = $this->db->query("SP_CLIENTE_GETALL");
        return $query->result();
    }

    public function settearInsert($dni,
                                $cuilt,
                                $apellidos,
                                $nombres,
                                $telefono,
                                $email,
                                $direccion){
        $this->SETdni($dni);
        $this->SETcuilt($cuilt);
        $this->SETapellidos($apellidos);
        $this->SETnombres($nombres);
        $this->SETtelefono($telefono);
        $this->SETemail($email);
        $this->SETdireccion($direccion);
    }

    public function insert(){
        $query = $this->db->query("SP_CLIENTE_AGREGAR_CLIENTE '".
                                            $this->dni."','".
                                            $this->cuilt."','".
                                            $this->apellidos."','".
                                            $this->nombres."','".
                                            $this->telefono."','".
                                            $this->email."','".
                                            $this->direccion."'");
            
        return $query->result();
    }

    public function getOne($codCliente){
        $query = $this->db->query("SP_CLIENTE_BUSCARCLIENTE ".$codCliente);
        return $query->result();
    }

    public function actualizarInfo($codCliente){
        
        $query = $this->db->query("SP_CLIENTE_MODIFICAR '".
                                            $codCliente."','".
                                            $this->dni."','".
                                            $this->cuilt."','".
                                            $this->apellidos."','".
                                            $this->nombres."','".
                                            $this->telefono."','".
                                            $this->email."','".
                                            $this->direccion."'");
        return $query->result();
    }


    public function buscarDatosCliente($codCliente){
        $query = $this->db->query("SP_CLIENTE_BUSCARCLIENTE ".$codCliente);
        return $query->result();
        }

    public function eliminar($codCliente){
            $query = $this->db->query("SP_CLIENTE_ELIMINAR ". $codCliente);
         return $query->result();
     }

}
<?php

class Model_Login extends CI_Model{

    private $codLogin;
    private $login;
    private $password;
    private $rol;
    private $email;

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    private function SETcodLogin($codLogin) {$this->codLogin = $codLogin;}
    public function GETcodLogin() {return $this->codLogin;}
    private function SETLogin($Login) {$this->login = $Login;}
    public function GETLogin() {return $this->login;}
    private function SETPassword($Password) {$this->password = $Password;}
    public function GETPassword() {return $this->password;}
    private function SETRol($Rol) {$this->rol = $Rol;}
    public function GETRol() {return $this->rol;}
    private function SETEmail($Email) {$this->email = $Email;}
    public function GETEmail() {return $this->email;}

    public function getAll(){
        $query = $this->db->query("SP_LOGIN_GETALL");
        return $query->result();
    }

    public function getRoles(){
        $query = $this->db->query("SP_LOGIN_GET_ROLES");
        return $query->result();
    }

    public function getOne($codLogin){
        $query = $this->db->query("SP_LOGIN_GETONE '".$codLogin."'");
        return $query->result();
    }

    public function iniciarSesion($login,$pass){
        $query = $this->db->query("SP_LOGIN_INICIO_SESION '".$login."','".$pass."'");
        return $query->result();
    }

    public function settearInsert($login,$pass,$rol,$email){
        $this->SETLogin($login);
        $this->SETPassword($pass);
        $this->SETRol($rol);
        $this->SETEmail($email);
    }

    public function insert(){
        $query = $this->db->query("SP_LOGIN_AGREGAR_LOGIN '".
                                            $this->login."','".
                                            $this->password."','".
                                            $this->rol."','".
                                            $this->email."'");
            
        return $query->result();
    }

    public function editarLogin($txtLogin,
									$txtPass,
									$txtEmail,
									$txtEstado){
        $query = $this->db->query("SP_LOGIN_EDITAR_LOGIN '".
                                            $txtLogin."','".
                                            $txtPass."','".
                                            $txtEmail."','".
                                            $txtEstado."'");
            
        return $query->result();
    }

}

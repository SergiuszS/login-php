<?php

class Login{
    private $db, $tab, $source;
    private $login, $password;
    public $error = false;
    public function __construct($db, $tab, $source){
        $this->db = $db;
        $this->tab = $tab;
        $this->source = $source;
    }
    public function setData($login, $password){
        $this->login = $login;
        $this->password = $password;
    }
    public function login(){
        $login = clear($this->source[$this->login]);
        $password = clear($this->source[$this->password]);
        
        $log = $this->db->get($this->tab, $this->login, $login);
        if($log){
            if(Password::verifyHash($password, $log[$this->password])){
                return $log;
            }else return false;
        }else return false;
    }
}
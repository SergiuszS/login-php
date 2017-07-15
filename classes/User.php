<?php
require_once __DIR__ . '/../init.php';
//przygotowanie danych do rejestracji
class User{
    private $data = array();
    private $pdo;
    public function __construct($pdo, $array){
        $this->pdo = $pdo;
        foreach($array as $name){
            $this->data[$name] = clear($_POST[$name]);
        }
        $this->data['password'] = Password::generateHash($this->data['password']);
        $this->data['info'] = "Informacje o profilu";
        $this->data['image'] = "false";
        $this->data['color'] = "false";
        $this->data['rank'] = 0;
    }
    public function getData(){
        return $this->data;
    }

}
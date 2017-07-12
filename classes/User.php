<?php

class User{
    private $data = array();
    public function __construct($array){
        foreach($array as $name){
            $this->data[$name] = $_POST[$name];
        }
    }
}
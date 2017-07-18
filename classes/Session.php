<?php

class Session{
    public static function isLogged() {
        if(isset($_SESSION['logged'])) return $_SESSION['logged'];
        return false;
    }
    public static function setLogged($value){
        $_SESSION['logged'] = $value;
    }
    public static function setValue($name, $value){
        $_SESSION[$name] = $value;
    }
    public static function get($name){
        return $_SESSION[$name];
    }
    public static function unset(){
         session_unset();
    }
}
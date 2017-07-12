<?php

class Session {
    private static $logged = false;
    public static function isLogged() {
        return self::$logged;
    }
    public function setLogged($value){
        self::$logged = $value;
    }
}
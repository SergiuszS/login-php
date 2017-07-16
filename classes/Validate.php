<?php

class Validate {
    private $errors = null; //do zbierania błędów (błędnych danych podanych przez użytkownika)
    private $data = array(); //dane z tablicy POST
    private $connection;
    public function __construct($array, $connection){
        $this->data = $array;
        $this->connection = $connection;
    }
    public function checkData($array){
        foreach($array as $field => $rules){
            foreach($rules as $rule_name => $rule_value){
                $this->check($rule_name, $rule_value, $field);
            }
        }
        return $this->errors;
    }

    private function check($rule_name, $rule_value, $field){
        $clearField = clear($this->data[$field]);
            switch ($rule_name) {
        case "required":
            if(($clearField == null) && $rule_value){
                $this->errors[$field][] = "To pole jest wymagane";
            }
            break;
        case "min":
            if(strlen($clearField) < $rule_value){
                $this->errors[$field][]  = "Minimalna ilość znaków to $rule_value";
            }
            break;
        case "max":
            if(strlen($clearField) > $rule_value){
                $this->errors[$field][]  = "Maksymalna ilość znaków to $rule_value";
            }
            break;
        case "contain":
            if(strpos($clearField, $rule_value) === false) {
                $this->errors[$field][]  = "To pole musi zawierać znak $rule_value";
            }
            break;
        case "unique":
            $test = $this->connection->get("users", $field, $clearField);
            if($test) $this->errors[$field][]  = "Taki $field już istnieje";
        break;
        case "identical":
            if($clearField !== clear($this->data[$rule_value])) {
                $this->errors[$field][]  = "Pola niezgodne";
            }
        break;
    }
    }
}
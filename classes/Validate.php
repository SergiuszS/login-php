<?php

class Validate {
    private $errors = null; //do zbierania błędów (błędnych danych podanych przez użytkownika)
    private $data = array(); //dane z tablicy POST
    public function __construct($array){
        $this->data = $array;
    }
    public function checkData($array){
        foreach($array as $field => $rules){
            //echo "Field: $field rules: ";
            foreach($rules as $rule_name => $rule_value){
                //echo $rule_name." = ".$rule_value."   ";
                $this->check($rule_name, $rule_value, $field);
            }
                echo "<br>";
        }
        return $this->errors;
    }

    private function check($rule_name, $rule_value, $field){
            switch ($rule_name) {
        case "required":
            if(($this->data[$field] == null) && $rule_value){
                $this->errors[] = "Należy wypełnić pole $field";
            }
            break;
        case "min":
            if(strlen($this->data[$field]) < $rule_value){
                $this->errors[] = "$field musi mieć minimalnie $rule_value znaków!";
            }
            break;
        case "max":
            if(strlen($this->data[$field]) > $rule_value){
                $this->errors[] = "$field musi mieć maksymalnie $rule_value znaków!";
            }
            break;
        case "contain":
            if(strpos($this->data[$field], $rule_value) === false) {
                $this->errors[] = "$field musi zawierać znak $rule_value";
            }
            break;
        case "unique":
            echo "";
        break;
        case "identical":
            if($this->data[$field] !== $this->data[$rule_value]) {
                $this->errors[] = "$field musi być zgodne z $rule_value";
            }
        break;
    }
    }
}
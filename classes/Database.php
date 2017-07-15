<?php

class Database{
    private $pdo, $query, $results, $count;
    public $error;
    private $DATABASE = array();
    public function __construct($DATABASE){
        $this->DATABASE = $DATABASE;
        //nawiązuje nowe połączenie
        try{
            $this->pdo = new PDO("mysql:host={$DATABASE["host"]};dbname={$DATABASE["dbname"]}", $DATABASE["username"], $DATABASE["password"]);
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }
    //wykonywanie poleceń sql
     private function query($sql) {
                $this->count = null;
                $this->results = null;
                $this->query = $this->pdo->prepare($sql);
                if($this->query->execute()){
                    $this->results = $this->query->fetchAll(PDO::FETCH_OBJ);
                    $this->count = $this->query->rowCount();
                } else{
                    $this->error = true;
                }
        }

    public function add($tableName, $userData){
        $names = null;
        $values = null;
        //przygotowanie danych
        foreach($userData as $name => $value){
            $names .= $name.", ";
            $values .= "'".$value."', ";
        }
        $names = substr($names, 0, -2);
        $values = substr($values, 0, -2);
        
        $table = $this->DATABASE[$tableName]; //nazwa tabeli, do której zapisujemy dane
        //gotowe zapytanie SQL
        $sql = "INSERT INTO $table ($names) VALUES ($values)";
        $this->query($sql);
    }
    //czy wewnątrz danej tabeli znajduje się już jakaś wartość
    public function is_inside($tableName, $fieldName, $value){
        $table = $this->DATABASE[$tableName];
        $sql = "SELECT * FROM $table WHERE $fieldName = '$value'";
        $this->query($sql);
        if($this->count) return true;
        return false;
    }

}
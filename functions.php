<?php

function errors($name, $validateResult){
        if(isset($validateResult)){
            if(isset($validateResult[$name])){
                    $errors = $validateResult[$name];
                    foreach($errors as $error){
                        echo "<br> $error";
                    }
            }
        }
}

function clear($item){
        return htmlentities($item, ENT_QUOTES, 'UTF-8');
    }
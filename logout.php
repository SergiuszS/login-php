<?php

require_once('init.php');

if(!Session::isLogged()){
    header('Location: index.php');
}
else{
    Session::unset();
    header('Location: index.php');
}
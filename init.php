<?php
require_once 'functions.php';
require_once 'config.php';

spl_autoload_register(function($class) {
    require_once "classes/{$class}.php";
});
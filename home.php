<!DOCTYPE html>
<html>
<?php
require_once 'init.php';

if(!Session::isLogged()){
    header("Location: index.php");
}else{
    echo "<strong>Login: </strong>".Session::get('login');
    echo "<br><strong>Email: </strong>".Session::get('email');
    echo "<br><strong>Informacje: </strong>".Session::get('info');
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    
</body>
</html>
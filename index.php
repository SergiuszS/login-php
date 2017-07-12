<!DOCTYPE html>
<html>
<?php
require_once 'init.php';

if(Session::isLogged()){
    echo 'zalogowany';
}else{
    
}



?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h1>Logowanie</h1>
    <form action="" method="POST">
        Login: <input type="text" name="login" autocomplete="off"><br>
        Hasło: <input type="password" name="password"><br>
  <input type="submit" value="Zaloguj">
</form>
</body>
</html>
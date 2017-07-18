<!DOCTYPE html>
<html>
<?php
require_once 'init.php';

if(!Session::isLogged()){
    header("Location: index.php");
}else{
    if(!isset($_GET['login'])){//jeśli nie wybrano profilu, wyświetl zalogowany
        $_GET['login'] = Session::get('login');
    }
    $con = new Database($DATABASE);
    $user = $con->get('users', 'login', clear($_GET['login']), array('login', 'email', 'info', 'time'));
    if($user){
    echo "<strong>Login: </strong>".$user['login'];
    echo "<br><strong>Email: </strong>".$user['email'];
    echo "<br><strong>Informacje: </strong>".$user['info'];
    echo "<br><strong>Data rejestracji: </strong>".$user['time'];
    }else{
        echo "Brak użytkownika o takim loginie";
    }
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil - <?= $user['login'] ?></title>
</head>
<body>

    <hr>
    <a href="home.php">Mój profil</a>
</body>
</html>
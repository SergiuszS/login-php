<!DOCTYPE html>
<html>
<?php
require_once 'init.php';

if(Session::isLogged()){
    echo 'zalogowany';
}else{
    if(isset($_POST['login'])){
        echo 'passed';
        $user = new User(array('login', 'email', 'password', 'password_again'));
        $validate = new Validate();
        $validate->checkData(array(
            'login' =>array(
                'unique' => true,
                'min' => 5,
                'max' => 30
            ),
            'email' =>array(
                'unique' => true,
                'min' => 5,
                'max' => 40,
                'contain' => '@'
            ),
            'password' =>array(
                'min' => 8,
                'max' => 40
            ),
            'password_again' =>array(
                'min' => 8,
                'max' => 40,
                'identical' => 'password'
            )
        ));
    }
}



?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <h1>Rejestracja</h1>
    <form action="" method="POST">
        Login: <input type="text" name="login" autocomplete="off"><br>
        E-mail: <input type="text" name="email" autocomplete="off"><br>
        Hasło: <input type="password" name="password"><br>
        Powtórz hasło: <input type="password" name="password_again"><br>
  <input type="submit" value="Zarejestruj">
</form>
</body>
</html>
<!DOCTYPE html>
<html>
<?php
require_once 'init.php';

if(Session::isLogged()){
    header("Location: home.php");
}else{
        if(isset($_POST['login'])){
        $database = new Database($DATABASE); //utworzenie połączenia z bazą danych (przekazanie danych logowania w parametrze)
        $validate = new Validate($_POST, $database);
        $validateResult = $validate->checkData(array(
            'login' =>array(
                'required' => true
            ),
            'password' =>array(
                'required' => true
            )
        ));
        if(isset($validateResult)) echo "Należy wypełnić oba pola";
        else{ //oba pola wypełnione
            $login = new Login($database, "users", $_POST); //dane bazy i POST
            $login->setData("login", "password"); //jakie pola sprawdzamy
            $loginResult = $login->login(); //proces logowania

            if($loginResult){ //jeśli logowanie się powiodło
                Session::setLogged(true);

                Session::setValue('login', $loginResult['login']);
                Session::setValue('id', $loginResult['id']);
                Session::setValue('email', $loginResult['email']);
                Session::setValue('info', $loginResult['info']);

                header("Location: home.php");
            }else echo "Błędny login lub hasło";

        }
        }
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
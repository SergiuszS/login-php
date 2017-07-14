<!DOCTYPE html>
<html>
<?php
require_once 'init.php';
$validateResult = null;
if(Session::isLogged()){
    echo 'zalogowany';
}else{
    if(isset($_POST['login'])){
        $user = new User(array('login', 'email', 'password', 'password_again')); //przekazanie informacji, jakie pola z POST bierzemy pod uwagę
        $validate = new Validate($_POST);
        //sprawdzamy dane według kryteriów
        $validateResult = $validate->checkData(array(
            'login' =>array(
                'required' => true,
                'unique' => true,
                'min' => 4,
                'max' => 30
            ),
            'email' =>array(
                'required' => true,
                'unique' => true,
                'min' => 6,
                'max' => 40,
                'contain' => '@'
            ),
            'password' =>array(
                'required' => true,
                'min' => 8,
                'max' => 40
            ),
            'password_again' =>array(
                'required' => true,
                'min' => 8,
                'max' => 40,
                'identical' => 'password'
            )
        ));
        if(!isset($validateResult)){
            echo "Rejestracja udana!";
        }
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
        Login: <input type="text" name="login" autocomplete="off" value="<?php if(isset($_POST['login'])) echo $_POST['login']; ?>">
        <?php echo errors("login", $validateResult);?><br>
        E-mail: <input type="text" name="email" autocomplete="off">
        <?php echo errors("email", $validateResult);?><br>
        Hasło: <input type="password" name="password">
        <?php echo errors("password", $validateResult);?><br>
        Powtórz hasło: <input type="password" name="password_again">
        <?php echo errors("password_again", $validateResult);?><br>
  <input type="submit" value="Zarejestruj">
</form>
</body>
</html>
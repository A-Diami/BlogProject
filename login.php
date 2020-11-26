<?php
  include 'config/db.php';

if (isset($_POST['envoyer'])){
    if (!empty($_POST['email']) AND !empty($_POST['password'])){

        $email = htmlspecialchars($_POST['email']);
        $password = sha1($_POST['password']);

        $veridierUser =  $bd->prepare('SELECT * FROM users WHERE email=? AND password=?');
        $veridierUser->execute(array($email,$password));

        if ($veridierUser->rowCount() > 0){
            $info_user = $veridierUser->fetch();

            $_SESSION['password'] = $info_user['password'];
            $_SESSION['id'] = $info_user['id'];
            $_SESSION['email'] = $info_user['email'];

            header('Location:index.php');
        }else{
            echo 'EMAIL OU MOT DE PASSE INVALIDE';
        }
    }else{
        echo 'VEUILLEZ RENSEIGNEZ VOS IDENTIFIANTS';
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="css/Style.css ">

</head>
<body>

<form method="post" action="" class="box">
    <h1>Login</h1>
    <input type="text" placeholder="Username"  name="email">
    <input type="password" placeholder="Password"  name="password">
    <input type="submit" value="Envoyer"  name="envoyer">
    <p><a href="inscription.php">Inscrivez vous ici</a></p>

</form>


</body>
</html>

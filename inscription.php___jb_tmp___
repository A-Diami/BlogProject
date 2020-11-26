<?php
    include 'config/db.php';

if (isset($_POST['envoyer'])){
    if (!empty($_POST['email']) AND !empty($_POST['password'])){

        $email = htmlspecialchars($_POST['email']);
        $password = sha1($_POST['password']);
        $inserer = $bd->prepare('insert into users(email,password) values (?,?)');
        $inserer->execute(array($email,$password));

        $verif = $bd->prepare('select * from users where email=? AND password=?');
        $verif->execute(array($email,$password));
        $info_user = $verif->fetch();

        $_SESSION['password'] = $info_user['password'];
        $_SESSION['id'] = $info_user['id'];
        $_SESSION['email'] = $info_user['email'];
        header('Location:index.php');

    }else{
        echo 'VEUILLEZ RENSEIGNEZ VOS DONNEES';
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page d'inscription</title>
    <link rel="stylesheet" href="css/Style.css ">

</head>
<body>

        <form method="post" action="" class="box">
            <h1>Login</h1>
            <input type="text" placeholder="Username"  name="email">
            <input type="password" placeholder="Password"  name="password">
            <input type="submit" value="Envoyer"  name="envoyer">
           <p><a href="login.php">se connecter</a></p>
        </form>


</body>
</html>
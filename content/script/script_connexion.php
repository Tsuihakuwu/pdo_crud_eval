<?php

if(session_status() !== PHP_SESSION_ACTIVE) session_start();

require "../../db.php";
$db = connexionBase();

$requete = $db->prepare("SELECT * FROM user WHERE usr_log=?");
$requete->execute(array($_POST['log']));
$user = $requete->fetch(PDO::FETCH_OBJ);
$requete->closeCursor();

if(!password_verify($_POST['pwd'],$user->usr_pwd))
{
    header("Location:/index.php");
    $_SESSION['error_login']=true;
}
else
{
    $_SESSION['login'] = $_POST['log'];
    $_SESSION['auth_lvl'] = $user->auth_level;

    echo $_SESSION['auth_lvl'];

    header("Location:/index.php");
}
?>
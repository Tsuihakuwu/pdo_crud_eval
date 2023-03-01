<?php

if(session_status() !== PHP_SESSION_ACTIVE) session_start();

require "../../db.php";
$db = connexionBase();

$requete = $db->prepare("SELECT * FROM user WHERE usr_log=? AND usr_pwd=?");
$requete->execute(array($_POST['log'],$_POST['pwd']));
$user = $requete->fetch(PDO::FETCH_OBJ);
$requete->closeCursor();

if($user==false)
{
    header("Location:/index.php");
    $_SESSION['error_login']=true;
}
else
{
    header("Location:/index.php");
    $_SESSION['login'] = $_POST['log'];
    $_SESSION['password'] = $_POST['pwd'];
}
?>
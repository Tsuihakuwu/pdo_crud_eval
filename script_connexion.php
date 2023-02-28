<?php

session_start();

$_SESSION["login"] = $_POST['id'];
$_SESSION["password"] = $_POST['pwd'];

echo $_SESSION["login"];
echo $_SESSION["password"];

?>


<!-- INSERT INTO `user` (`id_user`, `login`, `password`, `auth_level`) VALUES
(0,'adm','adm',3),
(1,'usr','usr',0); -->
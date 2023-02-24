<?php

$db="record";
$dbhost="localhost";
$dbport=3306;
$dbuser="admin";
$dbpasswd="mdpbdd1";
$charset="utf8";

try 
{
    $pdo = new PDO('mysql:host='.$dbhost.';port='.$dbport.';dbname='.$db.';charset=utf8'.'', $dbuser, $dbpasswd);
} 
catch (Exception $e) 
{
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die('Fin du script');
}
 
include('header.php');

?>
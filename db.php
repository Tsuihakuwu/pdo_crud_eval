<?php

function connexionBase(){
    
    $db="record";
    $dbhost="localhost";
    $dbport=3306;
    $dbuser="root";
    $dbpasswd="";
    $charset="utf8";
    
    try 
    {
        $pdo = new PDO('mysql:host='.$dbhost.';port='.$dbport.';dbname='.$db.';charset=utf8'.'', $dbuser, $dbpasswd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    catch (Exception $e)
    {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        die('Fin du script');
    }
}
?>
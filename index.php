<?php

    session_start();

    if ( ! isset($_SESSION["login"]) ) 
    {
        include("header.php");
        include("connexion.php");
        include("footer.php");
    } 
    else 
    {
        include('header.php');

        include('db.php');
        
        $db = connexionBase();
        
        $query = $db->query('SELECT * FROM artist');
        $tab = $query->fetchAll(PDO::FETCH_OBJ);
        $query->closeCursor();
        
        if(!isset($_GET['p']) || isset($_GET['p']) && $_GET['p']==0){
            include('tab_affichage.php');
        }
        elseif(isset($_GET['p']) && $_GET['p']=='add'){
            include('artist_new.php');
        }
        
        include('footer.php');

        echo $_SESSION["password"];
        
    }
?>
<?php

    if(session_status() !== PHP_SESSION_ACTIVE) session_start();

    if (!isset($_SESSION["login"])) 
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
            include('menu.php');
        }
        elseif(isset($_GET['p']) && $_GET['p']=='artist'){
            include('content/artist/artist_affichage.php');
        }
        elseif(isset($_GET['p']) && $_GET['p']=='add'){
            include('content/artist/artist_new.php');
        }
        elseif(isset($_GET['p']) && $_GET['p']=='a_detail'){
            include('content/artist/artist_detail.php');
        }
        elseif(isset($_GET['p']) && $_GET['p']=='a_form'){
            include('content/artist/artist_form.php');
        }
        elseif(isset($_GET['p']) && $_GET['p']=='a_cdel'){
            include('content/artist/artist_cdel.php');
        }
        
        include('footer.php');

    }
?>
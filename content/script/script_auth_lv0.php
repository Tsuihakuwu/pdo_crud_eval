<?php 
//Redirection si niveau Utilisateur
    include("../../header.php");
    include("../../error_auth.php");
    include("../../footer.php");
    header ("Refresh: 5;URL=/index.php");
    die();
?>
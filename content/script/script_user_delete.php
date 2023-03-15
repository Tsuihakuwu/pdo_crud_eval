<?php
    if (!(isset($_REQUEST['id'])) || intval($_REQUEST['id']) <= 0);
    
    require "../../db.php";
    $db = connexionBase();

    try {
        $requete = $db->prepare("DELETE FROM user WHERE id_user = ?");
        $requete->execute(array($_REQUEST["id"]));
        $requete->execute();
        $requete->closeCursor();
    }
    catch (Exception $e) {
        echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
        die("Fin du script (script_artist_modif.php)");
    }

    header("Location:/?p=user");
    exit;
?>
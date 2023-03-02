<?php
    // On se connecte à la BDD via notre fichier db.php :
    require "db.php";
    $db = connexionBase();

    // On récupère l'ID passé en paramètre :
    $id = $_GET["id"];

    // On crée une requête préparée avec condition de recherche :
    $requete = $db->prepare("SELECT * FROM artist WHERE artist_id=?");
    // on ajoute l'ID du disque passé dans l'URL en paramètre et on exécute :
    $requete->execute(array($id));

    // on récupère le 1e (et seul) résultat :
    $myArtist = $requete->fetch(PDO::FETCH_OBJ);

    // on clôt la requête en BDD
    $requete->closeCursor();
    
    ?>

        <h1> Détail artiste</h1>
        
        <?php
        if ($myArtist == false){
            echo 'Erreur : L\'artiste n\'existe pas<div>';
        }
        else{
            echo 'Artiste N°'.$myArtist->artist_id.
            '<br>Nom de l\'artiste : '.$myArtist->artist_name.
            '<br>Site Internet : '.$myArtist->artist_url.'<br class="mb-3">
            <div id="modif" class="d-flex justify-content-left">
                <a href="?p=a_form&id='.$myArtist->artist_id.'">
                    <input type="button" class="btn btn-light" value="Modifier"></input>
                </a>
                <a href="?p=a_cdel&id='.$myArtist->artist_id.'" class="mx-1">
                    <input type="button" class="btn btn-light" value="Supprimer"></input>
                </a>
            <br></div>';
        }
        ?>
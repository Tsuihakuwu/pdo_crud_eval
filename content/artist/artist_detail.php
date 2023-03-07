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
        
        <?php
        if ($myArtist == false){
            echo '  <span class="text-danger d-flex w-100 mx-3 mb-3 mt-3">Erreur : L\'artiste n\'existe pas</span>
                    <a class="mx-3" href="?p=artist"><input type ="button" class="btn btn-light" value="Retour"></input></a></span>';
        }
        else{
            echo 'Artiste N°'.$myArtist->artist_id.
            '<br>Nom de l\'artiste : '.$myArtist->artist_name.
            '<br>Site Internet : '.$myArtist->artist_url.'<br class="mb-3">
            <div id="modif" class="d-flex justify-content-left">
                <a href="?p=a_mod&id='.$myArtist->artist_id.'">
                    <input type="button" class="btn btn-light" value="Modifier"></input>
                </a>
                <a href="?p=a_cdel&id='.$myArtist->artist_id.'" class="mx-1">
                    <input type="button" class="btn btn-light" value="Supprimer"></input>
                </a>
            <br></div>';
        }
        ?>
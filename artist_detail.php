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

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='asset/css/styles.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <title>PDO - Détail</title>
    </head>
    <body>
    <div class='mt-3 mb-3 mx-auto pt-3 pb-3 px-3 w-75 container-flex rounded bg-dark text-white' id="wraper">
        <h1> Détail artiste</h1>
        <?php
        if ($myArtist == false){
            echo 'Erreur : L\'artiste n\'existe pas<div>';
        }
        else{
            echo 'Artiste N°'.$myArtist->artist_id.
            '<br>Nom de l\'artiste : '.$myArtist->artist_name.
            '<br>Site Internet : '.$myArtist->artist_url.'<br class="mb-3">
            <div id="modif" class="d-flex justify-content-left"><a href="artist_form.php?id='.$myArtist->artist_id.'"><button class="rounded">Modifier</button></a>';
        }
        ?>
        <a href="script_artist_delete.php?id=<?= $myArtist->artist_id ?>" class="mr-3"><button class="rounded">Supprimer</button></a>
        <br></div>
        <div class="d-flex justify-content-end">
    <a href="index.php"><button class="rounded">Retour à la liste des artistes</button></a>
    </div>
    </div>
    </body>
</html>
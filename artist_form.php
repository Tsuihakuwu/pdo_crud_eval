<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href='asset/css/styles.css' rel='stylesheet'>
</head>
<body>
<div class='mt-3 mb-3 mx-auto pt-3 pb-3 px-3 w-75 container-flex rounded bg-dark text-white' id="wraper">

    <?php
        // On charge l'enregistrement correspondant à l'ID passé en paramètre :
        require "db.php";
        $db = connexionBase();
        $requete = $db->prepare("SELECT * FROM artist WHERE artist_id=?");
        $requete->execute(array($_GET["id"]));
        $myArtist = $requete->fetch(PDO::FETCH_OBJ);
        $requete->closeCursor();
    ?>

    <h1>Artiste n°<?= $myArtist->artist_id; ?> - <?= $myArtist->artist_name; ?></h1>

    <form action ="script_artist_modif.php" method="post">

        <input type="hidden" name="id" value="<?= $myArtist->artist_id ?>">

        <label for="nom_for_label">Nom de l'artiste :</label><br>
        <input type="text" name="nom" id="nom_for_label" value="<?= $myArtist->artist_name ?>">
        <br><br>

        <label for="url_for_label">Adresse site internet :</label><br>
        <input type="text" name="url" id="url_for_label" value="<?= $myArtist->artist_url ?>">
        <br><br>

        <input type="reset" value="Annuler">
        <input type="submit" value="Modifier">
        
    </form>

    <div class="d-flex justify-content-end">
    <a href="index.php"><button class="rounded">Retour à la liste des artistes</button></a>
    </div>
</div>
</body>
</html>
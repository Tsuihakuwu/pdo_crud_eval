<?php
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
    <input type="submit" value="Modifier">
</form>

<div class="d-flex justify-content-start">
    <a href="index.php?p=a_detail&id=<?php echo $myArtist->artist_id ?>"><button class="rounded">Annuler</button></a>
</div>
<?php if(!isset($_SESSION["login"])||$_SESSION["auth_lvl"]<=0){include('../script/script_auth_lv0.php');} ?>

<?php
    require "db.php";
    $db = connexionBase();

    $requete = $db->prepare("SELECT * FROM artist WHERE artist_id=?");
    $requete->execute(array($_GET["id"]));
    $myArtist = $requete->fetch(PDO::FETCH_OBJ);
    $requete->closeCursor();
?>

<h1>Artiste n°<?= $myArtist->artist_id; ?> - <?= $myArtist->artist_name; ?></h1>

<form action ="content/script/script_artist_modif.php" method="post">

    <input type="hidden" name="id" value="<?= $myArtist->artist_id ?>">

    <label for="nom_for_label">Nom de l'artiste :</label><br>
    <input type="text" name="nom" id="nom_for_label" value="<?= $myArtist->artist_name ?>">
    <br><br>

    <label for="url_for_label">Adresse site internet :</label><br>
    <input type="text" name="url" id="url_for_label" value="<?= $myArtist->artist_url ?>">
    <br><br>
    <div class="d-flex justify-content-start">
        <input type="submit" value="Modifier" class="btn btn-light">
        <a class="mx-2" href="?p=a_detail&id=<?php echo $myArtist->artist_id ?>"><input type="button" value="Annuler" class="btn btn-light"></a>
    </div>
</form>
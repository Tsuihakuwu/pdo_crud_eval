<?php
    
    include('db.php');
        
    $db = connexionBase();
    $id = $_GET["id"];


    $requete_va = $db->prepare("SELECT COUNT(*) AS nbr_disc FROM disc JOIN artist ON disc.artist_id = artist.artist_id WHERE disc.artist_id=?");
    $requete_va->execute(array($id));
    $ArtistHasDisc = $requete_va->fetch(PDO::FETCH_OBJ);
    $requete_va->closeCursor();

    //var_dump($ArtistHasDisc);

    $requete = $db->prepare("SELECT * FROM artist WHERE artist_id=?");
    $requete->execute(array($id));
    $myArtist = $requete->fetch(PDO::FETCH_OBJ);
    $requete->closeCursor();

    if($ArtistHasDisc->nbr_disc > 0)
    {
?>

        <span class="text-danger d-flex w-100 mx-3 mb-3 mt-3">ERREUR : Impossible de supprimer l'artiste  n°'<?= $myArtist->artist_id ?> : <?= $myArtist->artist_name ?> Cet artiste possède des disques dans la base de données. Veuillez d'abord supprimer les disques.</span>
        <a class="mx-3" href="?p=a_detail&id=<?= $myArtist->artist_id ?>"><input type="button" value="Retour" class="btn btn-light"></a>

<?php   
    }
    else {
?>

<form action ="content/script/script_artist_delete.php" method="post">
    <input type="hidden" name="id" value="<?= $myArtist->artist_id ?>">
    <span class='text-danger pt-3 d-flex'>ATTENTION : L'entrée suivante va être supprimée !<br class="mb-3"></span>
    <span>Artiste n°<?= $myArtist->artist_id ?>
    <br>Nom de l'artiste : <?= $myArtist->artist_name ?>
    <br>Site Internet : <?= $myArtist->artist_url ?><br class="mb-3"></span>
    <div class="d-flex justify-content-start">
        <input type="submit" value="Supprimer" class="btn btn-light text-danger">
        <a class="mx-2" href="?p=a_detail&id=<?= $myArtist->artist_id ?>"><input type="button" value="Annuler" class="btn btn-light"></a>
    </div>
</form>

<?php } ?>
<?php
        include('db.php');
        
        $db = connexionBase();
        
        $query = $db->query('SELECT * FROM disc');
        $myDisc = $query->fetchAll(PDO::FETCH_OBJ);
        $query->closeCursor();
?>

<?php

    $id = $_GET["d_id"];

    $requete = $db->prepare("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id WHERE disc_id=?");
    $requete->execute(array($id));
    $myDisc = $requete->fetch(PDO::FETCH_OBJ);
    $requete->closeCursor();
    ?>

<form action ="content/script/script_disc_delete.php" class="w-50" method="post">
    <input type="hidden" name="id" value="<?= $myDisc->disc_id ?>">
    <span class='text-danger pt-3 d-flex'>ATTENTION : L'entrée suivante va être supprimée !<br class="mb-3"></span>

    <?php echo '<span><b>Disque N°'.$myDisc->disc_id.
                '</b><br>Titre : '.$myDisc->disc_title.
                '<br>Artiste : '.$myDisc->artist_name.
                '<br>Image : <br> <img src="../../asset/img/jaquettes/'.$myDisc->disc_picture.'" alt="disc_picture" class="w-50 rounded border border-white mt-2 mx-1 mb-2"><br class="mb-3"></span>';

    ?>
    <br>
    <div class="d-flex justify-content-start mb-3">
        <input type="submit" value="Supprimer" class="btn btn-light text-danger">
        <a class="mx-2" href="?p=a_detail&id=<?php echo $myDisc->disc_id ?>"><input type="button" value="Annuler" class="btn btn-light"></a>
    </div>
</form>
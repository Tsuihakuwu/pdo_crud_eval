<?php
        include('db.php');
        
        $db = connexionBase();
        
        $query = $db->query('SELECT * FROM artist JOIN disc ON artist.artist_id = disc.artist_id ORDER BY artist_name');
        $tab = $query->fetchAll(PDO::FETCH_OBJ);
        $query->closeCursor();
?>


<!-- Affichage du bouton d'ajout disque uniquement pour auth_level > 0 -->
<?php if(isset($_SESSION["auth_lvl"])&&$_SESSION["auth_lvl"]>0)
    echo    '<div id="control" class="d-flex justify-content-center">
                <a href="?p=add_disc"><input type="button" class="btn btn-light" value="Ajouter un disque"></input></a>
            </div>';
?>

<h1 class="mx-3 mb-3">Liste des disques (<?php echo count($tab);?>)</h1>

<div class="d-flex mb-3 justify-content-start flex-wrap">
<?php foreach ($tab as $disc): ?>
        <div class="d-flex rounded col-2 border border-white mb-3">
            <img src="../../asset/img/jaquettes/<?= $disc->disc_picture ?>" alt="pochette_album" class="img-fluid w-100 rounded">
        </div>
        <div class="d-flex col-3 flex-column justify-content-center mx-5 mb-3">
            <span><b><?= $disc->disc_title ?></b></span>
            <span><b><?= $disc->artist_name ?></b></span>
            <span><b>Label : </b><?= $disc->disc_label ?></span>
            <span><b>Année : </b><?= $disc->disc_year ?></span>
            <span><b>Genre : </b><?= $disc->disc_genre ?></span>
            <!-- Affichage du bouton détail uniquement pour auth_level > 0 -->
            <?php if(isset($_SESSION["auth_lvl"])&&$_SESSION["auth_lvl"]>0)
                echo '<span class="mt-4"><a href="?p=d_detail&d_id='.$disc->disc_id.'"><input type ="button" class="btn btn-light" value="Détails"></input></a></span>';
            ?>
            <!-- Affichage du prix du disque si auth_level = 0 -->
            <?php if(isset($_SESSION["auth_lvl"])&&$_SESSION["auth_lvl"]==0)
                echo '<span><b>Prix : </b>'.$disc->disc_price.'</span>';
            ?>

        </div>
<?php endforeach; ?>
</div>
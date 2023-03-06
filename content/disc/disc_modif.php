<?php

    require "db.php";
    $db = connexionBase();

    $id = $_GET["d_id"];

    $requete = $db->prepare("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id WHERE disc_id=?");
    $requete->execute(array($id));
    $myDisc = $requete->fetch(PDO::FETCH_OBJ);
    $requete->closeCursor();

    $requete2 = $db->query("SELECT * FROM artist");
    $myArtist = $requete2->fetchAll(PDO::FETCH_OBJ);
    $requete2->closeCursor();
    
    ?>

        <h1 class="mx-3 mb-3">Modification disque</h1>
        
        <?php
        if ($myDisc == false){
            echo 'Erreur : Le disque n\'existe pas<div>';
        }
        else {

        ?>
        
        <form action ="" method="post" class="d-flex mb-3 m-auto justify-content-between flex-wrap w-50">
            <div class="col-12">
                <label for="disc_title" class="w-25 mb-1">Titre :</label>
                <input type="text" name="disc_title" id="disc_title" value="<?= $myDisc->disc_title ?>" class="w-100 mb-2">
            </div>
            <div class="col-12">
                <label for="disc_artist" class="w-25 mb-1">Artiste :</label>
                <select name="disc_artist" id="disc_artist" class="w-100 mb-2">
                <?php foreach ($myArtist as $artist){
                    if($artist->artist_id==$myDisc->artist_id){
                        echo '<option value="'.$artist->artist_id.'" selected >'.$artist->artist_name.'</option>';
                    }
                    else{
                        echo '<option value="'.$artist->artist_id.'">'.$artist->artist_name.'</option>';
                    }
                }
                ?>
            </select>
            </div>
            <div class="col-12">
                <label for="disc_year" class="w-25 mb-1">Année :</label>
                <input type="text" name="disc_year" id="disc_year" value="<?= $myDisc->disc_year ?>" class="w-100 mb-2">
            </div>
            <div class="col-12">
                <label for="disc_genre" class="w-25 mb-1">Genre :</label>
                <input type="text" name="disc_genre" id="disc_genre"  value="<?= $myDisc->disc_genre ?>" class="w-100 mb-2">
            </div>
            <div class="col-12">
                <label for="disc_label" class="w-25 mb-1">Label :</label>
                <input type="text" name="disc_label" id="disc_label" value="<?= $myDisc->disc_label ?>" class="w-100 mb-2">
            </div>
            <div class="col-12">
                <label for="disc_price" class="w-25 mb-1">Prix :</label>
                <input type="text" name="disc_price" id="disc_price" value="<?= $myDisc->disc_price ?>" class="w-100 mb-2">
            </div>
            <div>
                <span class="w-100 mb-1">Picture :</span><br>
                <img src="<?php echo'../../asset/img/jaquettes/';?><?= $myDisc->disc_picture ?>" alt="disc_picture" class="w-50 rounded border border-white mt-1 mx-1 mb-2">
            </div>

            <div class="d-flex col-12 justify-content-between">
                <span class='mt-4'><a href="#"><input type ="button" class="btn btn-light" value="Modifier"></input></a></span>
                <span class='mt-4'><a href="?p=d_detail&d_id=<?= $myDisc->disc_id ?>"><input type ="button" class="btn btn-light" value="Retour"></input></a></span>
            </div>
    
        </form>
        
        
        <?php

        }

        ?>
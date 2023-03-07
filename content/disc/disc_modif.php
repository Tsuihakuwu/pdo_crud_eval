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
            echo '  <span class="text-danger d-flex w-100 mx-3 mb-3 mt-3">Erreur : Le disque n\'existe pas<a href="?p=disc"></span>
            <a class="mx-3" href="?p=disc"><input type ="button" class="btn btn-light" value="Retour"></input></a></span>';
        }
        else {

        ?>
        
        <form action ="content/script/script_disc_modif.php" method="post" class="d-flex mb-3 m-auto justify-content-between flex-wrap w-50" enctype="multipart/form-data">

            <input type="hidden" name="disc_id" value="<?= $myDisc->disc_id ?>">

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
                <label for="disc_picture" class="w-100 mb-1">Image : </label>    
                <img src="<?php echo'../../asset/img/jaquettes/';?><?= $myDisc->disc_picture ?>" alt="disc_picture" class="img-flex w-50 rounded border border-white mt-1 mx-1 mb-3">
                <br>
                <input type="file" name="disc_picture" id="disc_picture" class="mb-2">
            </div>
            
            <input type="hidden" name="disc_old_picture" value="<?= $myDisc->disc_picture ?>">

            <div class="d-flex col-12 justify-content-between">
                <span class='mt-4'><a href="#"><input type ="submit" class="btn btn-light" value="Modifier"></input></a></span>
                <span class='mt-4'><a href="?p=d_detail&d_id=<?= $myDisc->disc_id ?>"><input type ="button" class="btn btn-light" value="Retour"></input></a></span>
            </div>

        </form>
        
        <?php

        }

        ?>
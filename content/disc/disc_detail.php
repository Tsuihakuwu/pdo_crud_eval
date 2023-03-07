<?php
    // On se connecte à la BDD via notre fichier db.php :
    require "db.php";
    $db = connexionBase();

    // On récupère l'ID passé en paramètre :
    $id = $_GET["d_id"];

    // On crée une requête préparée avec condition de recherche :
    $requete = $db->prepare("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id WHERE disc_id=?");
    // on ajoute l'ID du disque passé dans l'URL en paramètre et on exécute :
    $requete->execute(array($id));

    // on récupère le 1e (et seul) résultat :
    $myDisc = $requete->fetch(PDO::FETCH_OBJ);

    // on clôt la requête en BDD
    $requete->closeCursor();
    
    ?>
        
        <?php

        if ($myDisc == false){

            echo '  <span class="text-danger d-flex w-100 mx-3 mb-3 mt-3">Erreur : Le disque n\'existe pas<a href="?p=disc"></span>
                    <a class="mx-3" href="?p=disc"><input type ="button" class="btn btn-light" value="Retour"></input></a></span>';
        }
        else {

        ?>
        
        <form action ="#" method="post" class="d-flex mb-3 m-auto justify-content-between flex-wrap w-50">

            <input type="hidden" name="disc_id" value="<?= $myDisc->disc_id ?>">

            <div class="col-5">
                <label for="disc_title" class="w-25 mb-1">Titre :</label>
                <input type="text" name="disc_title" id="disc_title" readonly value="<?= $myDisc->disc_title ?>" class="w-100 mb-2">
            </div>
            <div class="col-5">
                <label for="disc_artist" class="w-25 mb-1">Artiste :</label>
                <input type="text" name="disc_artist" id="disc_artist" readonly value="<?= $myDisc->artist_name ?>" class="w-100 mb-2">
            </div>
            <div class="col-5">
                <label for="disc_year" class="w-25 mb-1">Année :</label>
                <input type="text" name="disc_year" id="disc_year" readonly value="<?= $myDisc->disc_year ?>" class="w-100 mb-2">
            </div>
            <div class="col-5">
                <label for="disc_genre" class="w-25 mb-1">Genre :</label>
                <input type="text" name="disc_genre" id="disc_genre" readonly value="<?= $myDisc->disc_genre ?>" class="w-100 mb-2">
            </div>
            <div class="col-5">
                <label for="disc_label" class="w-25 mb-1">Label :</label>
                <input type="text" name="disc_label" id="disc_label" readonly value="<?= $myDisc->disc_label ?>" class="w-100 mb-2">
            </div>
            <div class="col-5">
                <label for="disc_price" class="w-25 mb-1">Prix :</label>
                <input type="text" name="disc_price" id="disc_price" readonly value="<?= $myDisc->disc_price ?>" class="w-100 mb-2">
            </div>
            <div>
                <span class="w-100 mb-1">Picture :</span><br>
                <img src="<?php echo'../../asset/img/jaquettes/';?><?= $myDisc->disc_picture ?>" alt="disc_picture" class="w-50 rounded border border-white mt-1 mx-1 mb-2">
            </div>

            <div class="d-flex col-12 justify-content-between">
                <div>
                    <span class='mt-4'><a href="?p=d_mod&d_id=<?= $myDisc->disc_id ?>"><input type ="button" class="btn btn-light" value="Modifier"></input></a></span>
                    <span class='mt-4'><a href="?p=d_cdel&d_id=<?= $myDisc->disc_id ?>"><input type ="button" class="btn btn-light" value="Supprimer"></input></a></span>
                </div>
                <div>
                    <span class='mt-4'><a href="?p=disc"><input type ="button" class="btn btn-light" value="Retour"></input></a></span>
                </div>
            </div>
    
        </form>
        
        
        <?php

        }

        ?>
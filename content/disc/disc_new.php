<?php
        include('db.php');
        $db = connexionBase();
        
        $query = $db->query('SELECT * FROM artist');
        $list_artiste = $query->fetchAll(PDO::FETCH_OBJ);
        $query->closeCursor();
?>

<h1 class="d-flex justify-content-center">Saisir un vinyle</h1>

<div class="d-flex justify-content-center">

      <form action ="content/script/script_disc_ajout.php" method="post" class="w-50" enctype="multipart/form-data">

        <div>
            <label for="disc_title" class="w-25 mb-1">Titre :</label>
            <input type="text" name="disc_title" id="disc_title" placeholder="Entrez un titre" class="w-100 mb-2">
        </div>

        <div>
            <label for="disc_artist" class="w-25 mb-1">Artiste : </label>

            <select name="disc_artist" id="disc_artist" class="w-100 mb-2">
                <?php foreach ($list_artiste as $artist): ?>
                    <option value="<?= $artist->artist_id ?>"><?= $artist->artist_name ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label for="disc_year" class="w-25 mb-1">Année : </label>
            <input type="text" name="disc_year" id="disc_year" placeholder="Entrez l'année" class="w-100 mb-2">
        </div>

        <div>
            <label for="disc_genre" class="w-25 mb-1">Genre : </label>
            <input type="text" name="disc_genre" id="disc_genre" placeholder="Entrez le genre (Rock, Pop, Prog...)" class="w-100 mb-2">
        </div>

        <div>
            <label for="disc_label" class="w-25 mb-1">Label : </label>
            <input type="text" name="disc_label" id="disc_label" placeholder="Entrez le label (EMI, Warner, PolyGram, Universal...)" class="w-100 mb-2">
        </div>

        <div>
            <label for="disc_price" class="w-25 mb-1">Prix : </label>
            <input type="text" name="disc_price" id="disc_price" placeholder="" class="w-100 mb-2">
        </div>

        <div>
            <label for="disc_picture" class="w-100 mb-1">Image : </label>
            <input type="file" name="disc_picture" id="disc_picture" class="mb-2">
        </div>

        <div class="d-flex justify-content-end">
            <input type="submit" value="Ajouter" class="btn btn-light mt-2">
        </div>

    </form>
</div>
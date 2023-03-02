<?php
        include('db.php');
        $db = connexionBase();
        
        $query = $db->query('SELECT * FROM artist');
        $list_artiste = $query->fetchAll(PDO::FETCH_OBJ);
        $query->closeCursor();
?>

<h1>Saisir un vinyle</h1>

<form action ="#" method="post" class="d-flex justify-content-center w-100">

<div>
    <label for="disc_title" class="w-100">Titre :</label><br>
    <input type="text" name="disc_title" id="disc_title" placeholder="Entrez un titre" class="w-100"><br>
</div>

<div class="w-100">
    <label for="disc_artist">Artiste :</label><br>
    
    <select name="disc_artist" id="disc_artist" class="w-100">
        <?php foreach ($list_artiste as $artist): ?>
            <option value="<?= $artist->artist_id ?>"><?= $artist->artist_name ?></option>
        <?php endforeach; ?>
    </select><br>
</div>

<div>
    <label for="disc_year">Année :</label><br>
    <input type="text" name="disc_year" id="disc_year" placeholder="Entrez l'année" class="w-100"><br>
</div>

<div>
    <label for="disc_genre">Genre :</label><br>
    <input type="text" name="disc_genre" id="disc_genre" placeholder="Entrez le genre (Rock, Pop, Prog...)" class="w-100"><br>
</div>

<div>
    <label for="disc_label">Label :</label><br>
    <input type="text" name="disc_label" id="disc_label" placeholder="Entrez le label (EMI, Warner, PolyGram, Universal...)" class="w-100"><br>
</div>

<div>
    <label for="disc_price">Prix :</label><br>
    <input type="text" name="disc_price" id="disc_price" placeholder="" class="w-100"><br>
</div>

    <br>

    <input type="submit" value="Ajouter" class="btn btn-light mt-2">

</form>
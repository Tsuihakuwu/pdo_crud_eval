<?php if(!isset($_SESSION["login"])||$_SESSION["auth_lvl"]<=0){include('../script/script_auth_lv0.php');} ?>

<form action ="content/script/script_artist_ajout.php" method="post">

    <label for="nom_for_label">Nom de l'artiste :</label><br>
    <input type="text" name="nom" id="nom_for_label" class="w-25">

    <br class="mb-2">

    <label for="url_for_label">Adresse site internet :</label><br>
    <input type="text" name="url" id="url_for_label" class="w-25">
    
    <br class="mb-2">
    
    <input type="submit" value="Ajouter" class="btn btn-light mt-2">

</form>
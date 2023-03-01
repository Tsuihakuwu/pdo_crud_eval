<h1>Saisie d'un nouvel artiste</h1>

<form action ="content/script/script_artist_ajout.php" method="post">

    <label for="nom_for_label">Nom de l'artiste :</label><br>
    <input type="text" name="nom" id="nom_for_label">

    <br class="mb-2">

    <label for="url_for_label">Adresse site internet :</label><br>
    <input type="text" name="url" id="url_for_label">
    
    <br class="mb-2">
    
    <input type="submit" value="Ajouter" class="rounded">

</form>
<br>
<div class="d-flex justify-content-end">
    <a href="?p=artist"><input type="button" class="rounded" value="Retour à la liste des artistes"></input></a>
</div>
<?php if(!isset($_SESSION["login"])||$_SESSION["auth_lvl"]<=0){include('../script/script_auth_lv0.php');} ?>

<?php

        include('db.php');
        
        $db = connexionBase();
        
        $query = $db->query('SELECT * FROM artist');
        $tab = $query->fetchAll(PDO::FETCH_OBJ);
        $query->closeCursor();
?>


<div id="control" class="d-flex justify-content-center">
    <a href="?p=add_artist"><input type="button" class="btn btn-light" value="Ajouter un artiste"></input></a>
</div>

<table class='table table-dark justify-content-center d-flex w-100 mt-3'>
<tr>
    <th>ID</th>
    <th>Nom</th>
    <th>URL</th>
    <th></th>
</tr>

<?php foreach ($tab as $artist): ?>

<tr>
    <td><?= $artist->artist_id ?></td>
    <td><?= $artist->artist_name ?></td>
    <td><?= $artist->artist_url ?></td>
    <td><a href="?p=a_detail&id=<?= $artist->artist_id ?>">Détails</a></td>
</tr>

<?php endforeach; ?>

</table>
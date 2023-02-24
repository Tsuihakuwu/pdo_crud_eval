<table class='table table-dark justify-content-center d-flex w-100 mt-3'>
<tr>
    <th>ID</th>
    <th>Nom</th>
</tr>

<?php foreach ($tab as $artist): ?>

<tr>
    <td><?= $artist->artist_id ?></td>
    <td><?= $artist->artist_name ?></td>
</tr>

<?php endforeach; ?>

</table>

<div id="control" class="d-flex justify-content-center">
    <a href="index.php?p=add"><button>Ajout</button></a>
</div>
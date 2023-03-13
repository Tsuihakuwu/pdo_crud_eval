<?php if(!isset($_SESSION["login"])||$_SESSION["auth_lvl"]<=1){include('../script/script_auth_lv0.php');} ?>

<?php
        include('db.php');
        
        $db = connexionBase();
        
        $query = $db->query('SELECT * FROM user');
        $tab = $query->fetchAll(PDO::FETCH_OBJ);
        $query->closeCursor();
?>

<h1 class="mx-3 mb-3">Liste des utilisateurs inscris (<?php echo count($tab);?>)</h1>

<div class="w-100 d-flex justify-content-center">
    <table class="table table-striped table-dark w-75">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom d'utilisateur</th>
                <th>Adresse mail</th>
                <th>Niveau d'authentification</th>
                <th>Modifier l'utilisateur</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tab as $user): ?>
                    <tr>
                        <td><?= $user->id_user ?></td>
                        <td><?= $user->usr_log ?></td>
                        <td><?= $user->usr_mail ?></td>
                        <td><?= $user->auth_level ?></td>
                        <td><a href="?p=u_mod&u_id=<?= $user->id_user ?>"><input type ="button" value="Modifier"></input></a></td>
                    </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
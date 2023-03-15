<?php if(!isset($_SESSION["login"])||$_SESSION["auth_lvl"]<=1){include('../script/script_auth_lv0.php');} ?>

<?php

    include('db.php');
        
    $db = connexionBase();
    $id = $_GET["u_id"];

    $requete = $db->prepare("SELECT * FROM user WHERE id_user=?");
    $requete->execute(array($id));
    $myUser = $requete->fetch(PDO::FETCH_OBJ);
    $requete->closeCursor();

?>

<form action ="content/script/script_user_delete.php" class="w-50" method="post">
    <input type="hidden" name="id" value="<?= $myUser->id_user ?>">
    <span class='text-danger pt-3 d-flex'>ATTENTION : L'utilisateur va être supprimé !<br class="mb-3"></span>

    <?php echo '<span><b>Utilisateur N°'.$myUser->id_user.
                '</b><br>Nom d\'utilisateur : '.$myUser->usr_log.
                '<br>Adresse mail : '.$myUser->usr_mail;

    ?>
    <br>
    <div class="d-flex justify-content-start mb-3">
        <input type="submit" value="Supprimer" class="btn btn-light text-danger">
        <a class="mx-2" href="?p=user"><input type="button" value="Annuler" class="btn btn-light"></a>
    </div>
</form>
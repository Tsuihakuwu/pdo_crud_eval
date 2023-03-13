<?php if(!isset($_SESSION["login"])||$_SESSION["auth_lvl"]<=1){include('../script/script_auth_lv0.php');} ?>

<?php
    require "db.php";
    $db = connexionBase();

    $requete = $db->prepare("SELECT * FROM user WHERE id_user=?");
    $requete->execute(array($_GET["u_id"]));
    $myUser = $requete->fetch(PDO::FETCH_OBJ);
    $requete->closeCursor();
?>

<h1>Utilisateur n°<?= $myUser->id_user; ?> - <?= $myUser->usr_log; ?></h1>

<form action ="content/script/script_user_modif.php" method="post">

    <input type="hidden" name="id_user" value="<?= $myUser->id_user ?>">

    <label for="usr_log">Nom utilisateur :</label><br>
    <input type="text" name="usr_log" id="usr_log" value="<?= $myUser->usr_log ?>"><br class="mb-2">

    <label for="usr_mail">Mail :</label><br>
    <input type="text" name="usr_mail" id="usr_mail" value="<?= $myUser->usr_mail ?>"><br class="mb-2">

    <label for="auth_lvl">Niveau d'authentification :</label><br>
    <select>
        <option <?php if($myUser->auth_level==0){echo'selected';} ?> value=0>0 - Utilisateur</option>
        <option <?php if($myUser->auth_level==1){echo'selected';} ?> value=1>1 - Administrateur</option>
        <option <?php if($myUser->auth_level==2){echo'selected';} ?> value=2>2 - Superadmin</option>
    </select><br class="mb-3">

    <div class="d-flex justify-content-start">
        <input type="submit" value="Modifier" class="btn btn-light">
        <a class="mx-2" href="?p=user"><input type="button" value="Annuler" class="btn btn-light"></a>
    </div>
</form>
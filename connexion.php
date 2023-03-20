<?php 
    if(isset($_SESSION['n_usr'])&&$_SESSION['n_usr'] == true){
        echo '<span class="d-flex justify-content-center text-success mt-3 mb-3">Utilisateur créé !</span>';
    }
?>

<form class="d-flex justify-content-center" action="/content/script/script_connexion.php" method="POST">
    <fieldset>
        <legend>Connexion</legend>
            <label for="log" class="col-12 mb-1">Login : </label>
            <input type="text" class="col-12 mb-1" id="log" name="log"></input>
            <label class="col-12 mb-1" for="pwd">Mot de passe :</label>
            <div class="input-group">
                <input type="password" class="col-12 mb-1" id="toggle-input1" name="pwd"></input>
                <button id="toggle-password1" type="button" class="col-12 mb-1" aria-label="Attention: Ce bouton affichera votre mot de passe en texte visible."></button>
            </div>
            <?php if(isset($_SESSION['error_login'])&&$_SESSION['error_login']){
                echo '<span class="d-flex justify-content-center text-danger">ERREUR LOGIN</span>';
            }
            ?>
            <div id="sb_co" class="d-flex justify-content-center pt-3">
                <input type="submit" value="Envoyer" class="btn btn-light rounded">
            </div>
    </fieldset>
</form>

<a href='?p=insc' class='d-flex justify-content-center mt-3'>Inscription</a>

<a href='#' class='d-flex justify-content-center mt-3'>Mot de passe oublié ?</a>
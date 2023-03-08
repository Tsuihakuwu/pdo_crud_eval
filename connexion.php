<form class="d-flex w-100 justify-content-center" action="/content/script/script_connexion.php" method="POST">
    <fieldset>
        <legend>Connexion</legend>
            <label for="log" class="d-flex justify-content-left">Login : </label><input type="text" class="d-flex justify-content-left" id="log" name="log"></input>
            <label class="d-flex justify-content-left" for="pwd">Mot de passe :</label><input type="password" class="d-flex justify-content-left" id="pwd" name="pwd"></input>
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
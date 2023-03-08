<form class="d-flex justify-content-center" action="content/script/script_inscription.php" method="POST">
    <fieldset class="w-25">
        
        <legend>Inscription</legend>
    
            <label for="username" class="col-12 mb-1">Nom d'utilisateur :</label>
            <input type="text" class="col-12 mb-3" id="username" name="username"></input>

            <label for="mail" class="col-12 mb-1">Adresse mail : </label>
            <input type="text" class="col-12 mb-3" id="mail" name="mail"></input>


            <label for="passwd" class="col-12 mb-1">Mot de passe : </label>
            <input type="password" class="col-12 mb-3" id="passwd" name="passwd"></input>

        
            <label for="passwd_v" class="col-12 mb-1">Vérification du mot de passe : </label>
            <input type="password" class="col-12 mb-3" id="passwd_v" name="passwd_v"></input>
        

        <div id="sb_co" class="d-flex justify-content-center pt-3">
            <input type="submit" value="Valider" class="btn btn-light rounded mx-2">
            <input type="reset" value="Annuler" class="btn btn-light rounded">
        </div>
        
    </fieldset>
</form>
<form class="d-flex justify-content-center" action="content/script/script_inscription.php" method="POST">
    <fieldset class="w-50">
        
        <legend>Inscription</legend>

            <label for="username" class="col-12 mb-1">Nom d'utilisateur <small>(Caractères alphanumériques uniquement; entre 5 et 16 caratères)</small> :</label>
            <input type="text" class="col-12 mb-1" id="username" name="username"
            <?php
            if((isset($_SESSION['stored_ent'][0]) && $_SESSION['stored_ent'][0] != "")){ echo ' value="'.$_SESSION['stored_ent'][0].'"'; }
            ?>            
            ></input>
            <?php
                if(isset($_SESSION['ctrl_err'])){
                    switch($_SESSION['ctrl_err'][0]){
                        case '0':
                            echo '<small class="d-flex text-align-end text-success">';
                            echo 'Le champ est valide';
                            break;
                        case '1':
                            echo '<small class="d-flex text-align-end text-danger">';
                            echo 'La case est vide !';
                            break;
                        case '2':
                            echo '<small class="d-flex text-align-end text-danger">';
                            echo 'Le nom d\'utilisateur doit contenir entre entre 5 et 16 caractères alphanumériques';
                            break;
                    }
                    echo '</small>';
                }
            ?>

            </small>

            <label for="mail" class="col-12 mb-1">Adresse mail <small>(Format monnom@mondomaine.fr)</small> : </label>
            <input type="text" class="col-12 mb-1" id="mail" name="mail"
            <?php
            if((isset($_SESSION['stored_ent'][1]) && $_SESSION['stored_ent'][1] != "")){ echo ' value="'.$_SESSION['stored_ent'][1].'"'; }
            ?>            
            ></input>
            <?php
                if(isset($_SESSION['ctrl_err'])){
                    switch($_SESSION['ctrl_err'][1]){
                        case '0':
                            echo '<small class="d-flex text-align-end text-success">';
                            echo 'Le champ est valide';
                            break;
                        case '1':
                            echo '<small class="d-flex text-align-end text-danger">';
                            echo 'La case est vide !';
                            break;
                        case '2':
                            echo '<small class="d-flex text-align-end text-danger">';
                            echo 'L\'adresse mail n\'est pas valide';
                            break;
                    }
                    echo '</small>';
                }
            ?>

            </small>

            <label for="passwd" class="col-12 mb-1">Mot de passe <small>(Doit doit contenir minuscule, majuscule, caractère spécial, numérique et être d'une longueur comprise entre 8 et 32 caractères)</small> : </label>
            <input type="password" class="col-12 mb-1" id="passwd" name="passwd"></input>
            <?php
                if(isset($_SESSION['ctrl_err'])){
                    switch($_SESSION['ctrl_err'][2]){
                        case '0':
                            echo '<small class="d-flex text-align-end text-success">';
                            echo 'Le champ est valide';
                            break;
                        case '1':
                            echo '<small class="d-flex text-align-end text-danger">';
                            echo 'La case est vide !';
                            break;
                        case '2':
                            echo '<small class="d-flex text-align-end text-danger">';
                            echo 'Le mot de passe n\'est pas valide';
                            break;
                    }
                echo '</small>';
                }
            ?>
        
            <label for="passwd_v" class="col-12 mb-1">Vérification du mot de passe <small>(Doit être identique au mot de passe précédent)</small> : </label>
            <input type="password" class="col-12 mb-1" id="passwd_v" name="passwd_v"></input>
            <?php
                if(isset($_SESSION['ctrl_err'])){
                    switch($_SESSION['ctrl_err'][3]){
                        case '0':
                            echo '<small class="d-flex text-align-end text-success">';
                            echo 'Le champ est valide';
                            break;
                        case '1':
                            echo '<small class="d-flex text-align-end text-danger">';
                            echo 'La case est vide !';
                            break;
                        case '2':
                            echo '<small class="d-flex text-align-end text-danger">';
                            echo 'Les mots de passe ne correspondent pas';
                            break;
                        case '3':
                            echo '<small class="d-flex text-align-end text-danger">';
                            echo 'Erreur mot de passe';
                            break;
                    }
                    echo '</small>';
                }
            ?>

            </small>

        <div id="sb_co" class="d-flex justify-content-center pt-3">
            <input type="submit" value="Valider" class="btn btn-light rounded mx-2">
            <input type="reset" value="Annuler" class="btn btn-light rounded">
        </div>
        
    </fieldset>
</form>
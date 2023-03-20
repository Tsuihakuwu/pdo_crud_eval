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
            <div class="input-group">
                <input type="password" class="col-12 mb-1" id="toggle-input1" name="passwd"></input>
                <button id="toggle-password1" type="button" class="" aria-label="Attention: Ce bouton affichera votre mot de passe en texte visible."></button>
                <!-- <span id="passstrength"></span> -->
            </div>
            
            <div class="progress-stacked mt-1 mb-1">
            
                <div class="progress" role="progressbar" aria-label="SegmentMin" aria-valuenow="20" aria-valuemin="0" aria-valuemax="20">
                    <div class="progress-bar" id="passStrMin"></div>
                </div>
                
                <div class="progress" role="progressbar" aria-label="SegmentMaj" aria-valuenow="20" aria-valuemin="0" aria-valuemax="20">
                    <div class="progress-bar bg-success" id="passStrMaj"></div>
                </div>
                
                <div class="progress" role="progressbar" aria-label="SegmentSpec" aria-valuenow="20" aria-valuemin="0" aria-valuemax="20">
                    <div class="progress-bar bg-info" id="passStrSpec"></div>
                </div>

                <div class="progress" role="progressbar" aria-label="SegmentNum" aria-valuenow="20" aria-valuemin="0" aria-valuemax="20">
                    <div class="progress-bar bg-warning" id="passStrNum"></div>
                </div>

                <div class="progress" role="progressbar" aria-label="SegmentLen" aria-valuenow="20" aria-valuemin="0" aria-valuemax="20">
                    <div class="progress-bar bg-danger" id="passStrLen"></div>
                </div>

            </div>
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
            <div class="input-group">
                <input type="password" class="col-12 mb-1" id="toggle-input2" name="passwd_v"></input>
                <button id="toggle-password2" type="button" class="" aria-label="Attention: Ce bouton affichera votre mot de passe en texte visible."></button>
            </div>
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

<script>
$('#toggle-input1').keyup(function(e) {

    

    var minRegex = new RegExp("/[a-z]+/g");
    // var majRegex = new RegExp("/[A-Z]+/g");
    // var specRegex = new RegExp("/[!@#\$%\^\&*\)\(+=._-]/g");
    // var numRegex = new RegExp("/\d+/g");
    // var lengthRegex = new RegExp("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{7,31}$/");

    if (minRegex.test($(this).val())) {
        $('#passStrMin').width('20%');
    }

    // if (majRegex.test($(this).val())) {
    //     $('#passStrMaj').width('20%');
    // }

    // if (specRegex.test($(this).val())) {
    //     $('#passStrSpec').width('20%');
    // }

    // if (numRegex.test($(this).val())) {
    //     $('#passStrNum').width('20%');
    // }

    // if (lengthRegex.test($(this).val())) {
    //     $('#passStrLen').width('20%');
    // }
    
    return true;
});
</script>
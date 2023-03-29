<div class="d-flex justify-content-center">
<h1 class="mt-3">Réinitialisation Mot de passe</h1>
</div>

<div class="d-flex justify-content-center">
    <form action="script_reset_pw.php" method="POST">
        <label for="mail">Votre adresse mail : </label>    
        <input type="text" placeholder="dave.loper@afpa.fr" name="mail" id="mail">
        <input type="submit" value="Envoyer">
    </form>
</div>

<div class="d-flex justify-content-center">
<?php if(isset($_SESSION['er_rs_pw'])){
        switch($_SESSION['er_rs_pw']){
        case '0':
            echo '<small class="text-danger">Erreur</small>';
            break;
        case '1':
            echo '<small class="text-success">Un mail de réinitialisation a été envoyé !</small>';
            break;
        case '2':
            echo '<small class="text-danger">L\'adresse mail n\'existe pas !</small>';
            break;
        }
    }?>
</div>
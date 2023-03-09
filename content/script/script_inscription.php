<?php
    $usr = (isset($_POST['username']) && $_POST['username'] != "") ? $_POST['username'] : Null;
    $mail = (isset($_POST['mail']) && $_POST['mail'] != "") ? $_POST['mail'] : Null;
    $pwd = (isset($_POST['passwd']) && $_POST['passwd'] != "") ? $_POST['passwd'] : Null;
    $pwdv = (isset($_POST['passwd_v']) && $_POST['passwd_v'] != "") ? $_POST['passwd_v'] : Null;

    $ctrl_err = array(0,0,0,0);    

    //Controle nom d'utilisateur condition 6 caractères
    if ($usr==Null) {
        //Code erreur 0.1 le champ username est vide
        echo 'Erreur username champ vide<br>';
        $ctrl_err[0]=1;
    }
    else if(!preg_match('/^[A-Za-z][A-Za-z0-9]{4,15}$/', $usr)){
        //Username doit contenir entre 5 et 15 caractères alphanumériques
        $ctrl_err[0]=2;
        echo 'Erreur username non conforme<br>';
    }
    else { echo 'Username valide'; }


    //Controle mail format mail avec regex
    if ($mail==null){
        //Code erreur 1.1 le champ mail est vide
        echo 'Erreur mail champ vide<br>';
        $ctrl_err[1]=1;
    }
    else if(!preg_match('/^[A-Za-z][A-Za-z0-9]{4,15}$/', $usr)){
        //Username doit contenir entre 5 et 15 caractères alphanumériques
        $ctrl_err[0]=2;
        echo 'Erreur username non conforme<br>';
    }
    else { echo 'Mail valide'; }


    //Controle password à la main sans regex
    if ($pwd==null){
        //Code erreur 2.1 le champ password est vide
        echo 'Erreur passwd champ vide<br>';
        $ctrl_err[2]=1;
    }
    else if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}$/m',$pwd)){
        //Password doit contenir minuscule, majuscule, caractère spécial, numérique et être d'une longueur entre 8 et 32 caractères
        { 
            echo 'Password non conforme<br>';
            $ctrl_err[2]=2;
        }
    }
    else { echo 'Password valide<br>'; }


    //Verification password
    if($ctrl_err[2]==1||$ctrl_err[2]==2){
        $ctrl_err[3]=3;
    }
    else {
        if ($pwdv==null){
            //Code erreur 0.1 le champ passwd_v est vide
            echo 'Erreur passwd_v champ vide<br>';
            $ctrl_err[3]=1;
        }
        else if($pwdv!=$pwd)
        {
            echo 'Les mots de passe ne correspondent pas';
            $ctrl_err[3]=2;
        }
        else { echo 'Verification password valide<br>'; }
    }

    //var_dump($ctrl_err);

    foreach($ctrl_err as $error)
    {
        
    }

    session_start();
    $_SESSION['ctrl_err'] = $ctrl_err;

    //header("Location:/index.php?p=insc");

?>
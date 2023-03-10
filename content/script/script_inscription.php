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



    if($ctrl_err[0]==0&&$ctrl_err[1]==0&&$ctrl_err[2]==0&&$ctrl_err[3]==0){
        //Formulaire valide > Envoi de la requête SQL
        echo 'Formulaire Valide';

        // Verif de mes cases formulaire username / mail / passwd / passwd_v avant requête par précaution

        $myFields = array ('username','mail','passwd','passwd_v');

        foreach($myFields as $ctrlFields){
            if (isset($_REQUEST[$ctrlFields]) && $_REQUEST[$ctrlFields] != "") {
                ${"my_new_".$ctrlFields} = $_REQUEST[$ctrlFields];
            }
            else {
                ${"my_new_".$ctrlFields} = Null;
            }
        }

        if ($my_new_username == Null ||$my_new_mail == Null ||$my_new_passwd == Null ||$my_new_passwd_v == Null) {
            header("Location:?p=insc");
            exit;
        }

        var_dump($my_new_username, password_hash($my_new_passwd,PASSWORD_DEFAULT), $my_new_mail);

        require "../../db.php";
        $db = connexionBase();
        
        try {
            $requete = $db->prepare("INSERT INTO user (usr_log, usr_pwd, usr_mail, auth_level) VALUES (:log, :passwd, :mail, 0);");
            // Association des valeurs aux paramètres via bindValue() :
            $requete->bindValue(":log", $my_new_username, PDO::PARAM_STR);
            $requete->bindValue(":passwd", password_hash($my_new_passwd,PASSWORD_DEFAULT), PDO::PARAM_STR);
            $requete->bindValue(":mail", $my_new_mail, PDO::PARAM_STR);
        
            // Lancement de la requête :
            $requete->execute();
        
            // Libération de la requête (utile pour lancer d'autres requêtes par la suite) :
            $requete->closeCursor();
        }    
        // Gestion des erreurs
        catch (Exception $e) {
            var_dump($requete->queryString);
            var_dump($requete->errorInfo());
            echo "Erreur : " . $requete->errorInfo()[2] . "<br>"; 
            die("Fin du script (script_artist_ajout.php)");
        }
        
        // Si OK: redirection vers la page artists.php
        header("Location:/index.php");
        
        // Fermeture du script
        exit;
    }
    else {
        //Formulaire non valide > Redirection sur le formulaire pour afficher les code erreur
        session_start();
        $_SESSION['ctrl_err'] = $ctrl_err;
        header("Location:/index.php?p=insc");
    }
?>
<?php
    // Récupération des valeurs :

    $auth = (isset($_POST['auth_level']) && $_POST['auth_level'] >= 0 || isset($_POST['auth_level']) && $_POST['auth_level'] <= 2) ? $_POST['auth_level'] : Null;
    $mail = (isset($_POST['usr_mail']) && $_POST['usr_mail'] != "") ? $_POST['usr_mail'] : Null;
    $login = (isset($_POST['usr_log']) && $_POST['usr_log'] != "") ? $_POST['usr_log'] : Null;
    $usr = (isset($_POST['id_user']) && $_POST['id_user'] != "") ? $_POST['id_user'] : Null;

    $ctrl_err_mod=array(0,0,0,0);

    // Si l'ID User n'existe plus on retourne sur la liste
    if ($usr == Null) {
        header("Location:/?p=u_mod");
        die();
    }

    echo '$auth : '.$auth.'<br>';
    echo '<br>$usr : '.$usr.'<br>';

    echo '<br>$login : '.$login.'<br>';

    if ($login==Null) {
        //Code erreur 0.1 le champ username est vide
        echo 'Erreur username champ vide<br>';
        $ctrl_err_mod[0]=1;
    }
    else if(!preg_match('/^[A-Za-z][A-Za-z0-9]{4,15}$/', $login)){
        //Username doit contenir entre 5 et 15 caractères alphanumériques
        $ctrl_err_mod[0]=2;
        echo 'Erreur username non conforme<br>';
    }
    else { 
        echo 'Username valide<br>';
        $ctrl_err_mod[0]=0;
    }

    echo '<br>$mail : '.$mail.'<br>';

    //Controle mail format mail avec regex
    if ($mail==null){
        //Code erreur 1.1 le champ mail est vide
        echo 'Erreur mail champ vide<br>';
        $ctrl_err_mod[1]=1;
    }
    else if(!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))/i', $mail)){
        //Structure mail valide
        $ctrl_err_mod[1]=2;
        echo 'Erreur adresse mail non conforme<br>';
    }
    else {
        echo 'Mail valide';
        $ctrl_err_mod[1]=0;
    }

    //Indice auth en dehors des plages
    if ($auth==null){
        $ctrl_err_mod[2]=1;
    }

    //L'utilisateur n'existe pas
    if($usr==null){
        $ctrl_err_mod[3]=1;
    }

    var_dump($ctrl_err_mod);

    if($ctrl_err_mod[0]==0&&$ctrl_err_mod[1]==0&&$ctrl_err_mod[2]==0&&$ctrl_err_mod[3]==0){
        //Formulaire valide > Envoi de la requête SQL
        echo 'Formulaire Valide';

        require "../../db.php";
        $db = connexionBase();

        try {
            $requete = $db->prepare("UPDATE user SET usr_log = :log, usr_mail = :mail, auth_level = :auth WHERE id_user = :id;");
            $requete->bindValue(":id", $usr, PDO::PARAM_INT);
            $requete->bindValue(":log", $login, PDO::PARAM_STR);
            $requete->bindValue(":mail", $mail, PDO::PARAM_STR);
            $requete->bindValue(":auth", $auth, PDO::PARAM_INT);
        
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
        
        // Si OK: redirection vers la page administration utilisateurs
        header("Location:/index.php?p=user");
        exit;
    }
    else {
        //Formulaire non valide > Redirection sur le formulaire pour afficher les code erreur
        session_start();
        $_SESSION['ctrl_err_mod'] = $ctrl_err_mod;
        header("Location:/index.php?p=u_mod&u_id=".$usr);
    }
?>
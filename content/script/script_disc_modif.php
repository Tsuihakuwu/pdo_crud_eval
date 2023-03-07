<?php

    // Verif de mes cases formulaire disc_title / disc_artist / disc_year / disc_genre / disc_label / disc_price

    $myFields = array ('disc_title','disc_artist','disc_year','disc_genre','disc_label','disc_price');

    foreach($myFields as $ctrlFields){
        if (isset($_REQUEST[$ctrlFields]) && $_REQUEST[$ctrlFields] != "") {
            ${"my_new_".$ctrlFields} = $_REQUEST[$ctrlFields];
        }
        else {
            ${"my_new_".$ctrlFields} = Null;
        }
        echo ${"my_new_".$ctrlFields}."<br>";
    }

    // Verif upload disc_picture

    var_dump($_FILES["disc_picture"]);

    if ($_FILES["disc_picture"]["error"] != 0) {
        echo 'Erreur Upload<br>';
        
        //Si l'upload est vide ['error'] = 4
        if ($_FILES["disc_picture"]["error"] == 4) {
            echo 'Le champ fichier est resté vide lors de la modification<br>';
            //  $_FILES["disc_picture"]["name"] doit prendre l'ancienne valeur inscrite en BDD disc_picture qui est normalement déjà vérifiée type mime
            echo 'Ancien fichier en BDD : '.$_REQUEST['disc_old_picture'];
            $_FILES["disc_picture"]["name"] = $_REQUEST['disc_old_picture'];
        }

    }
    else {

        echo 'Upload OK - ';

        // Types mime autorisés
        $aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");
        // Extraction type fichier
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimetype = finfo_file($finfo, $_FILES["disc_picture"]["tmp_name"]);

        finfo_close($finfo);
        if (in_array($mimetype, $aMimeTypes))
        {
            //  Type OK
            echo 'Type OK - ';

            try {
                move_uploaded_file($_FILES["disc_picture"]["tmp_name"], "../../asset/img/jaquettes/".$_FILES["disc_picture"]["name"]);
                echo 'Fichier déplacé dans ../../asset/img/jaquettes/';
            }
            catch (Exception $e){
                echo 'Erreur déplacement fichier';
            }
        } 
        else 
        {
            // Type non autorisé
           echo "Type de fichier non autorisé";    
           exit;
        }    
    }

    // En cas d'erreur, on renvoie vers le formulaire
    if ($my_new_disc_title == Null ||$my_new_disc_artist == Null ||$my_new_disc_year == Null ||$my_new_disc_genre == Null ||$my_new_disc_label == Null ||$my_new_disc_price == Null ) {
        header("Location:?p=disc");
        exit;
    }


    // S'il n'y a pas eu de redirection vers le formulaire (= si la vérification des données est ok) :
    require "../../db.php";
    $db = connexionBase();


try {
    // Construction de la requête INSERT sans injection SQL :
    $requete = $db->prepare("UPDATE disc 
                                SET disc_title = :title,
                                disc_year = :dyear,
                                disc_picture = :picture,
                                disc_label = :label,
                                disc_genre = :genre,
                                disc_price = :price,
                                artist_id = :artist WHERE disc_id = :id;");

    var_dump($requete);

    // // Association des valeurs aux paramètres via bindValue() :
    $requete->bindValue(":title", $my_new_disc_title, PDO::PARAM_STR);
    $requete->bindValue(":dyear", $my_new_disc_year, PDO::PARAM_INT);
    $requete->bindValue(":picture", $_FILES["disc_picture"]["name"], PDO::PARAM_STR);
    $requete->bindValue(":label", $my_new_disc_label, PDO::PARAM_STR);
    $requete->bindValue(":genre", $my_new_disc_genre, PDO::PARAM_STR);
    $requete->bindValue(":price", str_replace(",", ".", $my_new_disc_price), PDO::PARAM_STR);
    $requete->bindValue(":artist", $my_new_disc_artist, PDO::PARAM_INT);
    $requete->bindValue(":id", $_REQUEST['disc_id'], PDO::PARAM_INT);


    // // Lancement de la requête :

    var_dump($requete);

    $requete->execute();

    // // Libération de la requête (utile pour lancer d'autres requêtes par la suite) :
    $requete->closeCursor();
}

// Gestion des erreurs
catch (Exception $e) {
    var_dump($requete->queryString);
    var_dump($requete->errorInfo());
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (script_disc_ajout.php)");
}

// Si OK: redirection vers la page disc
header("Location:/index.php?p=disc");

// // Fermeture du script
exit;
?>
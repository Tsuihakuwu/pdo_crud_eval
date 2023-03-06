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

    if ($_FILES["disc_picture"]["error"] != 0) {
        echo 'Erreur Upload';
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
        header("Location:/index.php?p=add_disc");
        exit;
    }


    // S'il n'y a pas eu de redirection vers le formulaire (= si la vérification des données est ok) :
    require "../../db.php";
    $db = connexionBase();


try {
    // Construction de la requête INSERT sans injection SQL :
    $requete = $db->prepare("INSERT INTO disc (disc_title,disc_year,disc_picture,disc_label,disc_genre,disc_price,artist_id) VALUES (:title,:dyear,:picture,:label,:genre,:price,:artist);");

    var_dump($requete);

    // Association des valeurs aux paramètres via bindValue() :
    $requete->bindValue(":title", $my_new_disc_title, PDO::PARAM_STR);
    $requete->bindValue(":dyear", $my_new_disc_year, PDO::PARAM_INT);
    $requete->bindValue(":picture", $_FILES["disc_picture"]["name"], PDO::PARAM_STR);
    $requete->bindValue(":label", $my_new_disc_label, PDO::PARAM_STR);
    $requete->bindValue(":genre", $my_new_disc_genre, PDO::PARAM_STR);
    $requete->bindValue(":price", $my_new_disc_price, PDO::PARAM_STR);
    $requete->bindValue(":artist", $my_new_disc_artist, PDO::PARAM_INT);


    // POUR LUNDI : PROBLEME PARAM_STR OU PARAM_INT POUR DECIMAL SUR PRICE DANS LA REQUETE SQL


    // Lancement de la requête :

    var_dump($requete);

    $requete->execute();

    // Libération de la requête (utile pour lancer d'autres requêtes par la suite) :
    $requete->closeCursor();
}

// Gestion des erreurs
catch (Exception $e) {
    var_dump($requete->queryString);
    var_dump($requete->errorInfo());
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (script_disc_ajout.php)");
}

// // Si OK: redirection vers la page artists.php
// header("Location:/index.php?p=disc");

// // Fermeture du script
// exit;
?>
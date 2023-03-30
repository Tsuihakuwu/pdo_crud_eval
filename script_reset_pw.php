<?php

include('db.php');

$db = connexionBase();

$query = $db->query('SELECT usr_mail FROM user');
$usr = $query->fetchAll(PDO::FETCH_OBJ);
$query->closeCursor();

var_dump($usr);

$exist_in_db = false;

foreach ($usr as $user){
    if($user->usr_mail==$_REQUEST['mail']){$exist_in_db = true;}
}

session_start();
$_SESSION['er_rs_pw'] == 0;


if($exist_in_db==true){

    echo 'L\'adresse mail existe !';

$mail = $_REQUEST["mail"];

$query = $db->prepare('SELECT id_user, usr_log, usr_mail FROM user WHERE usr_mail=?');
$query->execute(array($mail));
$oneusr = $query->fetchAll(PDO::FETCH_OBJ);
$query->closeCursor();

var_dump($oneusr);

foreach($oneusr as $usr){


// Destinataires
$destinataires = $_REQUEST['mail']; //à récup comparer base de données

$objet = 'Réinitialisation Mot de passe'; 

$aHeaders = array('MIME-Version' => '1.0',
'Content-Type' => 'text/html; charset=utf-8',
'From' => 'Velvet Records <matthias@velvetrecords.fr>',
'Reply-To' => $_REQUEST['mail'],
'X-Mailer' => 'PHP/' . phpversion()
);

$message = '';

//HEADER
$message .= '<!DOCTYPE html>';
$message .= '<html lang="fr"><head><meta charset="utf-8"><title>Réinitialisation Mot de passe</title>';
//META
$message .= '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">';
//CSS
$message .= '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
//BODY
$message .= '</head><body>';

$message .= '<p>Bonjour '.$usr->usr_log.' !</p>';
$message .= '<p>Cliquez sur le lien ci dessous pour réinitialiser votre mot de passe : </p>';
$message .= '<p><a href="#">Réinitialisation mot de passe</a></p>';
$message .= '<p>Si vous n\'êtes pas à l\'origine de cette demande ignorez ce message et vérifier la sécurité de votre compte.</p>';
$message .= '<br>';
$message .= '<p></p>';
$message .= '</body></html>';

try {
$bEnvoie = mail($destinataires, $objet, $message, $aHeaders);
echo 'Email bien envoy&eacute; &agrave; ' . $destinataires;
}catch (Exception $e){
    echo 'erreur';
}
}

if(isset($_SESSION['login'])&&isset($_SESSION['auth_lvl'])){
    header("Location:/index.php?p=user");
}
else {
    $_SESSION['er_rs_pw'] = 1;
    header("Location:/index.php?p=reset");
}

}
else{
    if(isset($_SESSION['login'])&&isset($_SESSION['auth_lvl'])){
        header("Location:/index.php?p=user");
    }
    else{
        $_SESSION['er_rs_pw'] = 2;
        header("Location:/index.php?p=reset");
    }
}

?>
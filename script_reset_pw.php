<?php 

// Destinataires
$destinataires = $_POST['mail']; //à récup comparer base de données

$objet = 'Réinitialisation Mot de passe'; 

$aHeaders = array('MIME-Version' => '1.0',
'Content-Type' => 'text/html; charset=utf-8',
'From' => 'Velvet Records<matthias@velvetrecords.fr>',
'Reply-To' => 'Velvet Records<matthias@velvetrecords.fr>',
'X-Mailer' => 'PHP/' . phpversion()
);

$message = '';
$message .= '<!DOCTYPE html>';
$message .= '<html lang="fr"><head><meta charset="utf-8"><title>Mon premier mail HTML</title>';
$message .= '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">';
$message .= '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
$message .= '<style>html{font-size:100%;}body{font-size:1rem;}</style></head><body><div class="container"><div class="row"><div class="col-12">';
$message .= '<h1>Mon premier mail HTML</h1></div></div><div class="row"><div class="col-12"><p>Ouah c\'est trop génial ! On peut même mettre une image.</p>';
$message .= '</div></div><div class="row"><div class="col-12"><img src="jarditou_logo.jpg" title="Logo" alt="Logo" class="img-fluid">';
$message .= '</div></div></div><script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>';
$message .= '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>';
$message .= '</body></html>';

try {
$bEnvoie = mail($destinataires, $objet, $message, $aHeaders); 
echo 'Email bien envoy&eacute; &agrave; ' . $destinataires;
}catch (Exception $e){
    echo 'erreur';
}



?>
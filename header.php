<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href='asset/css/styles.css' rel='stylesheet'>
    <title>PDO</title>
</head>
<body>
    <div class='mt-3 mb-3 mx-auto pt-3 pb-3 px-3 w-75 container-flex rounded bg-dark text-white' id="wraper">

<?php if(isset($_SESSION["login"]))
{
    echo '
    <div class="d-flex justify-content-between">
    <div class="d-flex">
            <a href="index.php"><img src="asset/img/home-icon.png" class="img-fluid" alt="HOME"></a>
    ';

    //FIL

    $list_page = array('artist','add','a_detail','a_form','a_cdel');

    if(isset($_GET['p']) && in_array($_GET['p'],$list_page))
    {
        echo '<a class="mx-1 col-1" href="index.php">Accueil</a><p>&gt;</p> <a class="mx-1" href="/index.php?p=artist">Artiste</a>';
    }

    echo '</div>
        
        <div class="d-flex justify-content-end col-5">
            <span class="text-white mt-1 mx-3">Connecté en tant que : '.$_SESSION["login"].'</span>    
            <a href="content/script/script_deco.php"><input type="button" class="rounded" value="Deconnexion"></input></a>
        </div></div>';
}

?>
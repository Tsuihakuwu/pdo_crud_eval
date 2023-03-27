<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href='/asset/css/styles.css' rel='stylesheet'>
    <link rel="icon" href="/asset/img/vr_favicon.ico">
    <title>Velvet Records</title>
</head>
<body>
<header>
    <a href="index.php" class="d-flex mx-auto text-white mt-3 mb-3 pt-3 pb-3 px-3 justify-content-center rounded"><img src="/asset/img/logo.png" alt="LOGO" class="rounded w-25"></a>
</header>

<div class='container-flex mx-auto px-3 pt-3 pb-3 w-75 rounded bg-dark text-white' id="wraper">

<nav>

<?php if(isset($_SESSION["login"]))
{
    echo '<div class="d-flex justify-content-between">
    <div class="d-flex justify-content-start  align-items-center">';

    //AUTH LEVEL 0+
    if(isset($_SESSION["auth_lvl"])&&$_SESSION["auth_lvl"]>0){
    echo '
            <a href="index.php"><img id="home" src="asset/img/home-icon.png" class="img-fluid mx-3" alt="HOME"></a><a class="mx-1" href="index.php">Accueil</a>
    ';

        //FIL

        $list_page_artist = array('artist','add_artist','a_detail','a_mod','a_cdel');
        $list_page_disc = array('disc','add_disc','d_detail','d_mod','d_cdel');
        $list_page_user = array('user','u_mod');

        if(isset($_GET['p']) && in_array($_GET['p'],$list_page_artist))
        {
            echo '<span class="mx-1">&gt;</span> <a class="mx-1" href="/index.php?p=artist">Artistes</a>';
            if($_GET['p']=='a_detail'){
                echo '<span class="mx-1">&gt;</span><span>Détail artiste</span>';
            }
            elseif($_GET['p']=='a_mod'){
                echo '<span class="mx-1">&gt;</span><span>Détail artiste</span><span class="mx-1">&gt;</span><span>Modification artiste</span>';
            }
            elseif($_GET['p']=='a_cdel'){
                echo '<span class="mx-1">&gt;</span><span>Détail artiste</span><span class="mx-1">&gt;</span><span>Suppression artiste</span>';
            }
            elseif($_GET['p']=='add_artist'){
                echo '<span class="mx-1">&gt;</span><span>Saisie d\'un nouvel artiste</span>';
            }
        }
        elseif(isset($_GET['p']) && in_array($_GET['p'],$list_page_disc))
        {
            echo '<span class="mx-1">&gt;</span> <a class="mx-1" href="/index.php?p=disc">Disques</a>';
            if($_GET['p']=='d_detail'){
                echo '<span class="mx-1">&gt;</span><span>Détail disque</span>';
            }
            elseif($_GET['p']=='d_mod'){
                echo '<span class="mx-1">&gt;</span><span>Détail disque</span><span class="mx-1">&gt;</span><span>Modification disque</span>';
            }
            elseif($_GET['p']=='d_cdel'){
                echo '<span class="mx-1">&gt;</span><span>Détail disque</span><span class="mx-1">&gt;</span><span>Suppression disque</span>';
            }
            elseif($_GET['p']=='add_disc'){
                echo '<span class="mx-1">&gt;</span><span>Saisie d\'un nouvel artiste</span>';
            }
        }
        elseif(isset($_GET['p']) && in_array($_GET['p'],$list_page_user))
        {
            echo '<span class="mx-1">&gt;</span> <a class="mx-1" href="/index.php?p=user">Utilisateurs</a>';
            if($_GET['p']=='u_mod'){
                echo '<span class="mx-1">&gt;</span><span>Modification</span>';
            }
        }
    }

    echo '</div>
        
        <div class="d-flex justify-content-end col-5 align-items-center">
            <span class="text-white mx-3">Connecté en tant que : <b>'.$_SESSION["login"].'</b></span>    
            <a href="content/script/script_deco.php"><input type="button" class="btn btn-light" value="Deconnexion"></input></a>
        </div></div>';
}

?>

</nav>
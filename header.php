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
    echo '<p class="d-flex justify-content-left text-white">Connecté en tant que : '.$_SESSION["login"].'</p>';
}
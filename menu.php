<h1 class="mx-3 mt-3">Interface administrateur</h1>
<ul>
    <li>
        <a href="?p=artist">Liste des artistes</a>
    </li>
    <li>
        <a href="?p=disc">Liste des disques</a>
    </li>
    <?php if (isset($_SESSION["login"])&&$_SESSION["auth_lvl"]>=2) {
        echo '
    <li>
        <a href="?p=user">Administration utilisateurs</a>
    </li>';
    }
    ?>
</ul>
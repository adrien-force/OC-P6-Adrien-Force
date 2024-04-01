<?php
/**
 * Ce fichier est le template principal qui "contient" ce qui aura été généré par les autres vues.
 *
 * Les variables qui doivent impérativement être définie sont :
 *      $title string : le titre de la page.
 *      $content string : le contenu de la page.
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> TEST TITTLE </title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
<header>

    <nav>
        <div class="leftNav">
            <div>
                <a href="index.php"> <img class="logo" src="ressources/assets/logo.png"> </a>
            </div>
            <div>
                <a href="index.php"> Accueil</a>
                <a href="?action=ourBooks"> Nos livres à l'échange</a>
            </div>
        </div>
        <div class="rightNav">
            <a href="index.php?action=inbox">
                <i class="fa-regular fa-comment fa-flip-horizontal"></i>
                Messagerie
                <span class="msgCount">6</span>
            </a>
            <a href="index.php?action=myAccount"> <i class="fa-regular fa-user"></i> Mon compte</a>
            <a href="index.php?action=signIn"> Connexion</a>

        </div>
    </nav>
</header>

<main>
    <?php if (isset($content)) {
        echo $content;
    } /* Ici est affiché le contenu réel de la page. */ ?>
</main>


<footer>
    <nav>
        <div class="leftNav">
        </div>
        <div class="rightNav">
            <a href="index.php"> Politique de confidentialité</a>
            <a href="index.php?action=modifyBook"> Mentions légales</a>  <!-- FIXME: Link to test-->
            <a href="index.php?action=account"> Tom Troc © </a> <!--FIXME : link to test accountpage -->
            <a href="index.php"> <img class="logoTT" src="ressources/assets/logoTT.png"> </a>
        </div>
    </nav>
</footer>
</body>

</html>

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
    <div class="headerOverflow">
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
                <?php if(isset($_SESSION['userId'])){?>
                <a href="index.php?action=showInbox">
                    <?php } else {?>
                    <a href="index.php?action=signIn">
                    <?php }?>
                    <i class="fa-regular fa-comment fa-flip-horizontal"></i>
                    Messagerie
                    <?php if(isset($_SESSION['userId'])){?>
                    <span class="msgCount"><?php
                        $messageManager = new MessageManager();
                        $unreadMessagesCount = $messageManager->countUnreadMessages($_SESSION['userId']);
                        echo$unreadMessagesCount; }?>
                    </span>
                </a>
                <a href="index.php?action=myAccount"> <i class="fa-regular fa-user"></i> Mon compte</a>
                <?php if (isset($_SESSION['userId'])): ?>
                    <a href="index.php?action=signOut"> Déconnexion</a>
                <?php else: ?>
                    <a href="index.php?action=signIn"> Connexion</a>
                <?php endif; ?>
            </div>
        </nav>
    </div>
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
            <a href="index.php"> Mentions légales</a>
            <a href="index.php"> Tom Troc © </a>
            <a href="index.php"> <img class="logoTT" src="ressources/assets/logoTT.png"> </a>
        </div>
    </nav>
</footer>
</body>

</html>

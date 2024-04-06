<?php
/** Page d'accueil expliquant le fonctionnement et montrant les 4 derniers livres */
?>

<div class="homePage">

    <div class="section1">

        <div class="leftPanel">
            <h2>
                Rejoignez nos lecteurs passionnés
            </h2>
            <h4>
                Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous
                croyons en la magie du partage de connaissances et d'histoires à travers les livres.
            </h4>
            <div><a href="/index.php" class="mainButton">
                    Découvrir
                </a></div>

        </div>

        <div class="rightPanel">
            <img src="ressources/assets/hamza.png">
            <h4>
                Hamza
            </h4>
        </div>
    </div>

    <div class="bgOverflow">
        <div class="section2">
            <h2>
                Les derniers livres ajoutés
            </h2>

            <div class="bookGrid">

                <?php
                for ($i = 0; $i < 4; $i++) {
                    if (isset($books[$i])) {
                        $book = $books[$i];
                        ?>
                        <div class="bookCard">
                            <img src="<?php echo $book->getPicture(); ?>">
                            <h3>
                                <?php echo $book->getTitle(); ?>
                            </h3>
                            <h4>
                                <?php echo $book->getAuthor(); ?>
                            </h4>
                            <h5>
                                Vendu par : <?php echo UserManager::getUsernameByOwnerId($book->getOwnerId());?>
                            </h5>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

            <a href="index.php" class="mainButton">
                Voir tous les livres
            </a>

        </div>
    </div>
    <div class="section3">

        <h2> Comment ça marche ? </h2>
        <h3> Échanger des livres avec TomTroc c’est simple et amusant ! Suivez ces étapes pour commencer : </h3>
        <div class="infoCardGrid">
            <div class="infoCard"> Inscrivez-vous gratuitement sur
                notre plateforme.
            </div>
            <div class="infoCard"> Ajoutez les livres que vous souhaitez échanger à votre profil.</div>
            <div class="infoCard"> Parcourez les livres disponibles chez d'autres membres.</div>
            <div class="infoCard"> Proposez un échange et discutez avec d'autres passionnés de lecture.</div>
        </div>

        <a class="mainButton clearButton" href="/index.php"> Voir tous les livres </a>

    </div>

    <div class="section4">
        <img src="ressources/assets/homeMidBanner.png"> <!-- TODO override bg -->
    </div>

    <div class="section5">

        <h2> Nos valeurs </h2>
        <h3> Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont
            ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous
            croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.

            Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé.

            Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter,
            de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les
            étagères. </h3>
        <div class="leftJustify"><h4>L’équipe Tom Troc</h4></div>
        <img src="ressources/assets/heart.png">

    </div>

</div>

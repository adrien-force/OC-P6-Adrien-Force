<?php
/** Page affichant une grille avec les livres disponibles à l'échange */
?>

<div class="bookPage">
    <div class="bgOverflow">
        <div class="bookPageContent">
            <div class="ourBookTop">
                <h2>Nos livres à l'échange</h2>
                <div class="searchBar">
                    <form action="index.php" method="get">
                        <button type="submit">
                            <i class='fa-solid fa-magnifying-glass'></i>
                        </button>
                        <div>
                        <input type="text" name="search" placeholder=" Rechercher un livre">
                        <input type="hidden" name="action" value="ourBooks">
                        </div>
                    </form>
                </div>


            </div>
            <div class="bookGrid">
                <?php if (isset($books)) {
                    foreach ($books as $book) : ?>
                        <a href="index.php?action=detailBook&id=<?php echo $book->getId() ?>">
                            <div class="bookCard">
                                <img src="<?php echo $book->getPicture(); ?>">
                                <h3>
                                    <?= $book->getTitle() ?>
                                </h3>
                                <h4>
                                    <?= $book->getAuthor() ?>
                                </h4>
                                <h5>
                                    Vendu par : <?php echo UserManager::getUsernameByOwnerId($book->getOwnerId());?>
                                </h5>
                            </div>
                        </a>
                    <?php endforeach;
                } ?>
            </div>
        </div>
    </div>
</div>

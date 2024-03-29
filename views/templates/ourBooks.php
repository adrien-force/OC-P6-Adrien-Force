<?php
/** Page affichant une grille avec les livres disponibles à l'échange */
?>

<div class="bookPage">
    <div class="ourBookTop">
        <h2>Nos livres à l'échange</h2>
        <div class="searchBar">
            <i class='fa-solid fa-magnifying-glass'></i>
            <input type="text" placeholder=" Rechercher un livre">


        </div>



    </div>
    <div class="bookGrid">
        <?php foreach ($books as $book) : ?>
            <a href="index.php?action=detailBook&id=<?php echo $book->getId() ?>
">
            <div class="bookCard">
                <img src="ressources/assets/book1.png">
                <h3>
                    <?= $book->getTitle() ?>
                </h3>
                <h4>
                    <?= $book->getAuthor() ?>
                </h4>
                <h5>
                    Vendu par : <?= $book->getOwner() ?>
                </h5>
            </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<?php /** Page affichant le detail d'une livre */?>
<?php if(isset($book)){?>
<div class="detailBookPage">
    <div class="breadcrumb"> Nos livres > <?= $book->getTitle() ?> </div>
    <div class="bgOverflow">
    <div class="detailBookContent">
        <div class="photoSide">
            <img src="<?php echo $book->getPicture(); ?>">
        </div>
        <div class="detailBook">
            <h2> <?= $book->getTitle() ?> </h2>
            <h4> par <?= $book->getAuthor() ?> </h4>
            <div class="separationLine"></div>
            <h3> DESCRIPTION </h3>
            <p> <?= $book->getDescription() ?> </p>
            <div class="owner">
                <h3> Propriétaire </h3>
            <div class="ownerBubble">
                <img src="<?=UserManager::getProfilePictureByOwnerId($book->getOwnerId());?>">
                <h5> <?php echo UserManager::getUsernameByOwnerId($book->getOwnerId());?> </h5>
            </div>
            </div>
            <a href="?action=showInbox&receiver_id=<?=$book->getOwnerId()?>" class="mainButton">Envoyer un message</a>
        </div>
    </div>
    </div>
</div>
<?php } ?>

<?php /** Page affichant le detail d'une livre */?>
<?php if(isset($book)){?>
<div class="detailBookPage">
    <div class="breadcrumb"> <a href="?action=ourBooks">Nos livres >  </a> <?= "  ".$book->getTitle() ?> </div>
    <div class="bgOverflow">
    <div class="detailBookContent">
        <div class="photoSide">
            <img src="<?php echo $book->getPicture(); ?>" alt="Photo de couverture de <?= $book->getTitle()?>">
        </div>
        <div class="detailBook">
            <h2> <?= $book->getTitle() ?> </h2>
            <h4> par <?= $book->getAuthor() ?> </h4>
            <div class="separationLine"></div>
            <h3> DESCRIPTION </h3>
            <p> <?= $book->getDescription() ?> </p>
            <div class="owner">
                <h3> Propriétaire </h3>
            <a href="?action=account&id=<?=$book->getOwnerId()?>">
            <div class="ownerBubble">
                <img src="<?=UserManager::getProfilePictureByOwnerId($book->getOwnerId());?>" alt="Photo de profil du propriétaire">
                <h5> <?php echo UserManager::getUsernameByOwnerId($book->getOwnerId());?> </h5>
            </div>
            </a>
            </div>
            <a href="?action=showInbox&receiver_id=<?=$book->getOwnerId()?>" class="mainButton">Envoyer un message</a>
        </div>
    </div>
    </div>
</div>
<?php } ?>

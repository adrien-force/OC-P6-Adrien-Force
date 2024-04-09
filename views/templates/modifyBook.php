<?php /* Cette page permet à l'utilisateur de modifier les informations d'un livre */ ?>
<?php if(isset($book)){?>
<div class="modifyBookPage">
    <div class="bgOverflow">
        <div class="breadcrumb"> <h5> <a href="?action=myAccount"><i class="fa-solid fa-arrow-left"></i> retour</h5></a></div>
        <div class="title"><h1> Modifier les informations </h1></div>
        <div class="modifyBookContent">
            <div class="photoSide">
                <h4> Photo </h4>
                <img src="<?= $book->getPicture()?>">
                <span class="modifyPicLink"> <a class=""> Modifier la photo </a></span> <!-- TODO Need to handle how to upload a pic -->
            </div>
            <form action="?action=updateBook" method="POST">
                <input type="hidden" name="id" value="<?= $book->getId()?>">
                <div class="modifyBook modifyCard">
                    <div class="myAccountFormBox">
                        <h4>Titre</h4>
                        <input class="modifyInput" type="text" name="title" value="<?= $book->getTitle()?>">
                    </div>
                    <div class="myAccountFormBox">
                        <h4>Auteur</h4>
                        <input class="modifyInput" type="text" name="author" value="<?= $book->getAuthor()?>">
                    </div>
                    <div class="myAccountFormBox">
                        <h4>Description</h4>
                        <textarea class="form" name="description" rows="20"><?= $book->getDescription()?></textarea>
                    </div>
                    <div class="myAccountFormBox">
                        <h4>Disponibilité</h4>
                        <select class="form selectorPadding" name="availability">
                            <option value="disponible" <?= $book->getAvailability() == 'disponible' ? 'selected' : '' ?>>Disponible</option>
                            <option value="indisponible" <?= $book->getAvailability() == 'indisponible' ? 'selected' : '' ?>>Non Disponible</option>
                        </select>
                    </div>
                    <button type="submit" class="mainButton">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>

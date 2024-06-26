<?php /* Page affichant les informations d'un compte et la liste des livres d'un utilisateur*/ ?>
<?php if(isset($user) && isset($books)) { ?>
<div class="accountPage">
    <div class="bgOverflow">
        <div class="accountPageContent">
            <div class="accountCard">
                <div class="myAccountCard userCard">
                    <img src=" <?= $user->getPicture() ?>" alt="Photo de profil de <?= $user->getUsername()?>">
                    <div class="separationLine"></div>
                    <h2> <?= $user->getUsername()?> </h2>
                    <h3> Membre depuis <?= Utils::dateDiff($user->getSignUpDate()) ?> </h3>
                    <h4> BIBLIOTHEQUE </h4>
                    <h3 class="darkText">  <i class="fa-solid fa-book-open"></i> <?= $user->getHowManyBookByUser($user->getId()) ?> livres </h3>
                    <a href="?action=showInbox&receiver_id=<?=$user->getId()?>" class="mainButton clearButton"> Écrire un message </a>

                </div>
            </div>
            <table class="myAccountBooks">
                <tr>
                    <th> PHOTO </th>
                    <th> TITRE</th>
                    <th> AUTEUR</th>
                    <th>DESCRIPTION </th>
                </tr>
                <?php

                $availableBooks = array_filter($books, function($book) {
                    return $book->getAvailability() === "disponible";
                });

                $availableBooks = array_slice($availableBooks, 0, 4);

                foreach($availableBooks as $book): ?>
                    <tr>
                        <td class="td-20p"> <a href="?action=detailBook&id=<?=$book->getId()?>"><img src="<?php echo $book->getPicture(); ?>" alt="Photo de couverture de <?= $book->getTitle()?>"></a></td>
                        <td class="td-20p"> <?php echo $book->getTitle(); ?> </td>
                        <td class="td-20p"> <?php echo $book->getAuthor(); ?> </td>
                        <td class="italic td-20p"> <?php echo substr($book->getDescription(), 0, 100)."..."; ?> </td>
                    </tr>
                <?php endforeach; ?>

            </table>

        </div>
    </div>
</div>
<?php } ?>


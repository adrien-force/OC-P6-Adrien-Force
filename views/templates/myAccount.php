<?php /* Page affichant les informations personnelles et la liste des livres de l'utilisateur*/
require_once 'models/User.php'
?>
<?php if(isset($user)){?>
<div class="myAccountPage">
    <div class="bgOverflow">
        <div class="myAccountPageContent">
            <div class="myAccountTitle">
                <h1> Mon compte</h1>
            </div>
            <section class="myAccountCards">
                <div class="myAccountCard userCard">
                    <img src="<?php echo $user->getPicture(); ?>">
                    <a> modifier </a>
                    <div class="separationLine"></div>
                    <h2> <?php echo $user->getUsername(); ?> </h2>
                    <h3> Membre depuis <?= Utils::dateDiff($user->getSignUpDate()) ?> </h3>
                    <h4> BIBLIOTHEQUE </h4>
                    <h3 class="darkText">  <i class="fa-solid fa-book-open"></i> <?= $user->getHowManyBookByUser($user->getId()) ?> livres </h3>
                    <a href="?action=showAddBook" class="mainButton clearButton"> Ajouter un livre </a>


                </div>
                <div class="myAccountCard modifyCard">
                    <div><h2> Vos informations personnelles</h2></div>
                    <form method="POST" action="index.php?action=modifyInfo">
                        <div class="myAccountFormBox">
                            <h4>
                                Adresse email
                            </h4>
                            <input class="modifyInput" type="email" name="email" value="<?php echo $user->getEmail(); ?>">
                        </div>
                        <div class="myAccountFormBox">
                            <h4>
                                Mot de passe
                            </h4>
                            <input class="modifyInput" type="password" name="password" value="">
                        </div>
                        <div class="myAccountFormBox">
                            <h4>
                                Pseudo
                            </h4>
                            <input class="modifyInput" type="text" name="username" value="<?php echo $user->getUsername(); ?>">
                        </div>
                        <input type="submit" class="mainButton clearButton" value="Enregistrer" <?php echo Utils::askConfirmation('Êtes-vous sûr de vouloir modifier vos informations ??'); ?>>
                    </form>
                </div>
            </section>
            <table class="myAccountBooks">
                <tr>
                    <th> PHOTO </th>
                    <th> TITRE</th>
                    <th> AUTEUR</th>
                    <th> DESCRIPTION </th>
                    <th> DISPONIBILITE</th>
                    <th> ACTION </th>
                </tr>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td> <img src="<?php echo $book->getPicture(); ?>"></td>
                        <td> <?php echo $book->getTitle(); ?> </td>
                        <td> <?php echo $book->getAuthor(); ?> </td>
                        <td class="italic"> <?php echo $book->getDescription(); ?> </td>
                        <td class="padding"> <span class="availability <?php if($book->getAvailability() === "disponible"){ echo "available";}else{echo "unavailable";}; ?>"><?php echo $book->getAvailability(); ?></span></td>
                        <td><a href="index.php?action=modifyBook&id=<?=$book->getId()?>" class="editButton">Éditer</a><a onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre?')" href="index.php?action=deleteBook&id=<?=$book->getId()?>" class="deleteButton">Supprimer</a></td>
<!--                        TODO Delete book not working yet, modify link here later-->
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </div>
</div>
<?php } ?>


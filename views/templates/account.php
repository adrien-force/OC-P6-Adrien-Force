<?php /* Page affichant les informations d'un compte et la liste des livres d'un utilisateur*/ ?>
<?php if(isset($user)){?>
<div class="accountPage">
    <div class="bgOverflow">
        <div class="accountPageContent">
            <div class="accountCard">
                <div class="myAccountCard userCard">
                    <img src="ressources/assets/hamza.png">
                    <a> modifier </a>
                    <div class="separationLine"></div>
                    <h2> Username </h2>
                    <h3> Membre depuis 1 an </h3>
                    <h4> BIBLIOTHEQUE </h4>
                    <h3 class="darkText">  <i class="fa-solid fa-book-open"></i> 4 livres </h3>
                    <a src="" class="mainButton clearButton"> Écrire un message </a>

                </div>
            </div>
            <table class="myAccountBooks">
                <tr>
                    <th> PHOTO </th>
                    <th> TITRE</th>
                    <th> AUTEUR</th>
                    <th> DESCRIPTION </th>
                    <th> DISPONIBILITE</th>
                    <th> ACTION </th>
                </tr>
                <tr>
                    <td> <img src="ressources/assets/book1.png"></td>
                    <td> Titre </td>
                    <td> Auteur </td>
                    <td class="italic"> Description </td>
                    <td class=""> <span class="availability available">disponible</span></td>
                    <td> <a class="editButton">Éditer</a><a class="deleteButton">Supprimer</a></td>
                </tr>
                <tr class="tableAlternateColor">
                    <td> <img src="ressources/assets/book1.png"></td>
                    <td> Titre </td>
                    <td> Auteur </td>
                    <td class="italic"> Description </td>
                    <td class=""> <span class="availability unavailable">disponible</span></td>
                    <td> <a class="editButton">Éditer</a><a class="deleteButton">Supprimer</a></td>
                </tr>
                <tr class="tableAlternateColor">
                    <td> <img src="ressources/assets/book1.png"></td>
                    <td> Titre </td>
                    <td> Auteur </td>
                    <td class="italic"> Description </td>
                    <td class=""> <span class="availability unavailable">disponible</span></td>
                    <td> <a class="editButton">Éditer</a><a class="deleteButton">Supprimer</a></td>
                </tr>
                <tr class="tableAlternateColor">
                    <td> <img src="ressources/assets/book1.png"></td>
                    <td> Titre </td>
                    <td> Auteur </td>
                    <td class="italic"> Description </td>
                    <td class=""> <span class="availability unavailable">disponible</span></td>
                    <td> <a class="editButton">Éditer</a><a class="deleteButton">Supprimer</a></td>
                </tr>

            </table>
        </div>

    </div>
</div>
<?php } ?>


<?php /* Page affichant les informations personnelles et la liste des livres de l'utilisateur*/ ?>
<div class="myAccountPage">
<div class="bgOverflow">
    <div class="myAccountPageContent">
        <div class="myAccountTitle">
            <h1> Mon compte</h1>
        </div>
        <section class="myAccountCards">
            <div class="myAccountCard userCard">
                <img src="ressources/assets/hamza.png">
                <a> modifier </a>
                <div class="separationLine"></div>
                <h2> Username </h2>
                <h3> Membre depuis 1 an </h3>
                <h4> BIBLIOTHEQUE </h4>
                <h3 class="darkText">  <i class="fa-solid fa-book-open"></i> 4 livres </h3>

            </div>
            <div class="myAccountCard modifyCard">
                <div><h2> Vos informations personnelles</h2></div>
                <div class="myAccountFormBox">
                    <h4>
                        Adresse email
                    </h4>
                    <input type="text" value="nathalie@mail.com">
                </div>
                <div class="myAccountFormBox">
                    <h4>
                        Mot de passe
                    </h4>
                    <input type="password" value="Coucou :)">
                </div>
                <div class="myAccountFormBox">
                    <h4>
                        Pseudo
                    </h4>
                    <input type="text" value="nathalire">
                </div>
                <a class="mainButton clearButton">
                    Enregistrer
                </a>

            </div>
        </section>
        <table class="myAccountBooks">
            <tr>
                <th> Mes livres</th>
                <th> Auteur</th>
                <th> Vendu par</th>
                <th> </th>
            </tr>
            <tr>
                <td> Titre du livre</td>
                <td> Auteur</td>
                <td> Nom de l'utilisateur</td>
                <td> <a> Supprimer</a></td>
            </tr>

        </table>
    </div>

</div>
</div>
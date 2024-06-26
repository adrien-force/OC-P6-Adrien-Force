<?php
/* Page permettant l'inscription d'un utilisateur en demandant le pseudo, l'email et le mot de passe*/
?>

<div class="bgOverflow">
<div class="signUpPage">
    <div class="signUpPageContent">
        <h2>Inscription</h2>
        <form action="index.php?action=register" method="post">
            <div class="signUpFormBox">
                <h4>Pseudo</h4>
                <input type="text" name="username" placeholder="">
            </div>
            <div class="signUpFormBox">
                <h4>Adresse email</h4>
                <input type="email" name="email" placeholder="">
            </div>
            <div class="signUpFormBox">
                <h4>Mot de passe</h4>
                <input type="password" name="password" placeholder="">
            </div>
            <button type="submit" class="mainButton">S'inscrire</button>
        </form>
        <h3> Déjà inscrit ? <a href="index.php?action=signIn"> Connectez-vous </a></h3>
    </div>
    <div class="rightImg">
        <img src="ressources/assets/signUpImage.jpeg" alt="Photo de couverture montrant une bibliothèque">
    </div>

</div>
</div>

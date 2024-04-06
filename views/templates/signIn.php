<?php
/* Page permettant la connexion d'un utilisateur en demandant l'email et le mot de passe*/
?>

<div class="bgOverflow">
    <div class="signUpPage">
        <div class="signUpPageContent">
            <h2>Connexion</h2>
            <form action="index.php?action=signIn" method="post">
                <div class="signUpFormBox">
                    <h4>Adresse email</h4>
                    <input type="email" name="email" placeholder="">
                </div>
                <div class="signUpFormBox">
                    <h4>Mot de passe</h4>
                    <input type="password" name="password" placeholder="">
                </div>
                <input type="submit" class="mainButton" value="Se connecter">
            </form>
            <h3> Pas de compte ? <a href="index.php?action=signUp"> Inscrivez-vous </a></h3>
        </div>
        <div class="rightImg">
            <img src="ressources/assets/signUpImage.jpeg">
        </div>

    </div>
</div>

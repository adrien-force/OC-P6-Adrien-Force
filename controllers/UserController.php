<?php

class UserController
{
    public function showLogin(): void
    {
        $view = new View("Login");
        $view->render('login');
    }

    public function showSignUp(): void
    {
        $view = new View("signUp");
        $view->render('signUp');
    }

    public function showSignIn(): void
    {
        $view = new View("signIn");
        $view->render('signIn');
    }

    public function showMyAccount(): void
    {
        $view = new View("My Account");
        $view->render('myAccount');
    }

}
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

}
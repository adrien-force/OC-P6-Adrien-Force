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

    public function showAccount(): void
    {
        $view = new View("Account");
        $view->render('account');
    }

    public function register(): void
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (empty($username) || empty($email) || empty($password)) {
                echo "Please fill in all fields.";
                return;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Please enter a valid email address.";
                return;
            }

            if (strlen($password) < 8) {
                echo "Your password must be at least 8 characters long.";
                return;
            }

            $userManager = new UserManager();

            if ($userManager->getUserByUsername($username)) {
                echo "A user with this username already exists.";
                return;
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $user = new User([
                'username' => $username,
                'email' => $email,
                'password' => $hashedPassword,
                'role' => 'user',
                'picture' => 'ressources/assets/default.png'
            ]);

            $userManager->addUser($user);

            header("Location: index.php?action=signIn");
            exit;
        } else {
            // If the form wasn't submitted, just render the sign-up page
            $view = new View("signUp");
            $view->render('signUp');
        }
    }

}
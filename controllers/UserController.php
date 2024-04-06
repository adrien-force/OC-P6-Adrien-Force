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
            $view = new View("signUp");
            $view->render('signUp');
        }
    }

    public function signIn(): void
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (empty($email) || empty($password)) {
                echo "Please fill in all fields.";
                return;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Please enter a valid email address.";
                return;
            }

            $userManager = new UserManager();

            $user = $userManager->getUserByEmail($email);
            if (!$user) {
                echo "No user found with this email.";
                return;
            }

            if (!password_verify($password, $user->getPassword())) {
                echo "Incorrect password.";
                return;
            }

            session_start();
            $_SESSION['user'] = $user;

            header("Location: index.php?action=showMyAccount");
            exit;
        } else {
            $view = new View("signIn");
            $view->render('signIn');
        }
    }

    public function signOut(): void
    {
        $_SESSION = [];


        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();

        header("Location: index.php");
        exit;
    }

}
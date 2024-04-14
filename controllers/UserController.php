<?php

require_once 'models/BookManager.php';
require_once 'models/User.php';

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
        if (!isset($_SESSION['userId'])) {
            header("Location: index.php?action=signIn");
            exit;
        }

        $bookManager = new BookManager();
        $userManager = new UserManager();

        $user = $userManager->getUserById($_SESSION['userId']);
        $books = $bookManager->getBooksByOwnerId($_SESSION['userId']);

        // Render the view and pass the data
        $view = new View("myAccount");
        $view->render( 'myAccount', ['user' => $user, 'books' => $books]);
    }

    public function showAccount(): void
    {
        $userManager = new UserManager();
        $bookManager = new BookManager();
        $user = $userManager->getUserById($_GET['id']);
        $books = $bookManager->getAvailableBooksByOwnerId($_GET['id']);


        $view = new View("Account");
        $view->render('account', ['user' => $user, 'books' => $books]);
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
                'picture' => 'ressources/assets/default.png',
                'signUpDate' => new DateTime()
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
                $_SESSION['error'] = "Veuillez remplir les 3 champs.";
                header("Location: index.php?action=signIn");
                exit;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = "Veuillez renseigner une adresse valide.";
                header("Location: index.php?action=signIn");
                exit;
            }

            $userManager = new UserManager();

            $user = $userManager->getUserByEmail($email);
            if (!$user) {
                $_SESSION['error'] = "Aucun utilisateur n'est associé à cet email.";
                header("Location: index.php?action=signIn");
                exit;
            }

            if (!password_verify($password, $user->getPassword())) {
                $_SESSION['error'] = "Mot de passe incorrect.";
                header("Location: index.php?action=signIn");
                exit;
            }
            session_destroy();
            session_start();

            //need to ensure that the user object is not incomplete
            $_SESSION['userId'] = $user->getId();

            header("Location: index.php?action=myAccount");
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

    public function modifyInfo()
    {
        $userManager = new UserManager();
        $user = $userManager->getUserById($_SESSION['userId']);

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

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $user->setUsername($username);
            $user->setEmail($email);
            $user->setPassword($hashedPassword);

            $userManager->updateUser($user);

            header("Location: index.php?action=myAccount");
            exit;
        } else {
            $view = new View("modifyInfo");
            $view->render('modifyInfo', ['user' => $user]);
        }
    }

}
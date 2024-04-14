<?php

require_once 'config/_config.php';
require_once 'config/autoload.php';

if (!isset($_SESSION['darkTheme'])) {
    $_SESSION['darkTheme'] = false;
}

// On récupère l'action demandée par l'utilisateur.
// Si aucune action n'est demandée, on affiche la page d'accueil.
$action = Utils::request('action', 'home');

// Try catch global pour gérer les erreurs
try {
    switch ($action) { //TODO : Ce switch peut etre remplacé par un match

        case 'home':
            $bookController = new BookController();
            $bookController->showHome();
            break;

        case 'ourBooks':
            $bookController = new BookController();
            $bookController->showOurBooks();
            break;

        case 'detailBook':
            $bookController = new BookController();
            $bookController->showDetail();
            break;

        case 'signUp':
            $userController = new UserController();
            $userController->showSignUp();
            break;

        case 'myAccount':
            $userController = new UserController();
            $userController->showMyAccount();
            break;

        case 'account':
            $userController = new UserController();
            $userController->showAccount();
            break;

        case 'modifyBook':
            $bookController = new BookController();
            $bookController->showModify();
            break;

        case 'showInbox':
            $messageController = new MessageController();
            $messageController->showInbox();
            break;

        case 'register':
            $UserController = new UserController();
            $UserController->register();
            break;

        case 'signOut':
            $userController = new UserController();
            $userController->signOut();
            break;

        case 'signIn':
            $userController = new UserController();
            $userController->signIn();
            break;

        case 'modifyInfo':
            $userController = new UserController();
            $userController->modifyInfo();
            break;

        case 'updateBook':
            $bookController = new BookController();
            $bookController->updateBook();
            break;

        case 'sendMessage':
            $messageController = new MessageController();
            $messageController->sendMessage();
            break;

        case 'showAddBook':
            $bookController = new BookController();
            $bookController->showAddBook();
            break;

        case 'addBook':
            $bookController = new BookController();
            $bookController->addBook();
            break;

        case 'deleteBook':
            $bookController = new BookController();
            $bookController->deleteBook();
            break;

        case 'darkTheme':
            $_SESSION['darkTheme'] = true;
            header('Location: index.php?action=myAccount');
            break;

        case 'lightTheme':
            $_SESSION['darkTheme'] = false;
            header('Location: index.php?action=myAccount');
            break;

        default:
            throw new Exception('Action non valide');
    }
} catch (Exception $e) {
    // En cas d'erreur, on affiche la page d'erreur.
    $errorView = new View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}

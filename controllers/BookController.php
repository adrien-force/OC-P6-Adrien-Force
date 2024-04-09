<?php


class BookController
{
    public function showHome(): void
    {
        $bookManager = new BookManager();
        $books = $bookManager->getFourLastBooks();

        $view = new View("HomePage");
        $view->render('home', ['books' => $books]);
    }

    public function showOurBooks(): void
    {
        $bookManager = new BookManager();
        if (isset($_GET['search'])) {
            $searchQuery = $_GET['search'];
            $books = $bookManager->searchBooks($searchQuery);
        } else {
            $books = $bookManager->getAllBooks();
        }

        $view = new View("Our Books");
        $view->render('ourBooks', ['books'=>$books]);
    }

    public function showDetail(): void
    {
        $id = Utils::request('id', 1);
        if (is_string($id)) {
            $id = intval($id);
        }

        $bookManager = new BookManager();
        $book = $bookManager->getBookById($id);

        if (!$book) {
            throw new Exception("The book does not exist.");
        }

        $view = new View($book->getTitle());
        $view->render('detailBook', ['book' => $book]);
    }

    public function showModify():void
    {
        try {
            $id = Utils::request('id');
        } catch (Exception $e) {
            throw new Exception("The book does not exist.");
        }
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($id);

        if (!$book) {
            throw new Exception("The book does not exist.");
        }

        $view = new View("Modifier"); //TODO: Find a better name (:
        $view->render('modifyBook', ['book' => $book]);
    }

    public function updateBook(): void
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $description = $_POST['description'];
        $availability = $_POST['availability'];

        $id = intval(filter_var($id, FILTER_SANITIZE_NUMBER_INT));
        $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        $author = htmlspecialchars($author, ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
        $availability = htmlspecialchars($availability, ENT_QUOTES, 'UTF-8');

        $bookManager = new BookManager();

        try {
            $bookManager->updateBook($id, $title, $author, $description, $availability);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }

        header('Location: ?action=detailBook&id='.$id);
        exit();
    }

    public function addBook()
    {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $description = $_POST['description'];
        $ownerId = $_SESSION['userId'];
        $availability = $_POST['availability'];
        $cover = $_FILES['cover'];

        $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        $author = htmlspecialchars($author, ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
        $availability = htmlspecialchars($availability, ENT_QUOTES, 'UTF-8');

        try {
            $coverPath = Utils::uploadFile($cover, 'ressources/uploads/','book_cover');
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }

        $bookManager = new BookManager();

        try {
            $bookManager->addBook($title, $author, $description, $ownerId, $availability, $coverPath);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }

        header('Location: ?action=ourBooks');
        exit();
    }

    public function showAddBook()
    {
        $view = new View("Ajouter un livre");
        $view->render('addBook');
    }

    public function deleteBook()
    {
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($_GET['id']);

        if ($book->getOwnerId() != $_SESSION['userId']) {
            throw new Exception("You are not the owner of this book.");
        }

        $id = Utils::request('id');

        if (!$id) {
            throw new Exception("The book does not exist.");
        }
        if (is_string($id)) {
            $id = intval($id);
        }

        $bookManager = new BookManager();
        $book = $bookManager->getBookById($id);

        if (!$book) {
            throw new Exception("The book does not exist.");
        }

        $bookManager->deleteBook($id);

        header('Location: ?action=myAccount');
        exit();
    }

}
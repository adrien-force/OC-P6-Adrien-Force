<?php


class BookController
{
    private BookManager $bookManager;
    public function __construct()
    {
        $this->bookManager = new BookManager();
    }

    public function showHome(): void
    {
        $books = $this->bookManager->getFourLastBooks();

        $view = new View("HomePage");
        $view->render('home', ['books' => $books]);
    }

    public function showOurBooks(): void
    {
        if (isset($_GET['search'])) {
            $searchQuery = $_GET['search'];
            $books = $this->bookManager->searchBooks($searchQuery);
        } else {
            $books = $this->bookManager->getAllBooks();
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

        $book = $this->bookManager->getBookById($id);

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
        $book = $this->bookManager->getBookById($id);

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


        try {
            $this->bookManager->updateBook($id, $title, $author, $description, $availability);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }

        header('Location: ?action=detailBook&id='.$id);
        exit();
    }

    public function addBook()
    {
        $book = $this->bookManager->createFromPost($_POST);

        try {
            $this->bookManager->addBook($book);
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
        $book = $this->bookManager->getBookById($_GET['id']);

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

        $book = $this->bookManager->getBookById($id);

        if (!$book) {
            throw new Exception("The book does not exist.");
        }

        $this->bookManager->deleteBook($id);
        if (strpos($book->getPicture(), 'ressources/uploads/') !== false)
        {
            unlink($book->getPicture());
        }
        header('Location: ?action=myAccount');
        exit();
    }

}
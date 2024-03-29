<?php


class BookController
{
    public function showHome(): void
    {
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooks();

        $view = new View("HomePage");
        $view->render('home', ['books' => $books]);
    }

    public function showOurBooks(): void
    {
        $bookManager = new BookManager();
        $books = $bookManager->fakeBookArray(24);

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

}
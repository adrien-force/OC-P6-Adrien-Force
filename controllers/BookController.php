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
        $books = $bookManager->getAllBooks();

        $view = new View("Our Books");
        $view->render('ourBooks', []);
    }

}
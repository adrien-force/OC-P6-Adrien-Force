<?php

class BookManager extends AbstractEntityManager
{
    public function getAllBooks(): array
    {
        $sql = <<<SQL
        SELECT * FROM book
        SQL;
        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }

        return $books;
    }

    public function addBook(Book $book): void
    {
        $sql = <<<SQL
        INSERT INTO book(title, author, description, print_date, owner, availability)
        VALUES(:title, :author, :description, :print_date, :owner, :availability)
        SQL;
        $this->db->query($sql, [
            'title' => $book->getTitle()

        ]);

    }

}
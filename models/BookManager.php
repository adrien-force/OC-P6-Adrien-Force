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

    public function getFourLastBooks(): array
    {
        $sql = <<<SQL
        SELECT * FROM book ORDER BY id DESC LIMIT 4
        SQL;
        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }

        return $books;
    }

    function fakeBookArray(int $int): array
    {
        $books = [];
        for ($i = 0; $i < $int; $i++) {
            $book = new Book();
            $book->setId(2);
            $book->setTitle('Title' . $i);
            $book->setAuthor('Author' . $i);
            $book->setDescription('Description' . $i);
            $book->setOwner('Owner' . $i);
            $book->setAvailability('Availability' . $i);
            $books[] = $book;
        }
        return $books;
    }


    public function addBook(Book $book): void
    {
        $sql = <<<SQL
        INSERT INTO book(title, author, description, owner, availability, picture)
        VALUES(:title, :author, :description, :owner, :availability, :picture)
        SQL;
        $this->db->query($sql, [
            'title' => $book->getTitle()

        ]);

    }

    public function getBookById(int $id): ?Book
    {
        $sql = <<<SQL
        SELECT * FROM book WHERE id = :id
        SQL;
        $result = $this->db->query($sql, ['id' => $id]);
        $book = $result->fetch();
        if ($book) {
            return new Book($book);
        }

        return null;
    }

    public function searchBooks($searchQuery) {
        $sql = <<<SQL
        SELECT * FROM book WHERE title LIKE :search OR author LIKE :search
        SQL;
        $result = $this->db->query($sql, ['search' => "%$searchQuery%"]);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }

        return $books;
    }

    public function getBooksByOwnerId($ownerId) {
        $sql = <<<SQL
        SELECT * FROM book WHERE owner_id = :ownerId
        SQL;
        $result = $this->db->query($sql, ['ownerId' => $ownerId]);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }

        return $books;
    }

    public function getHowManyBooksById($ownerId) {
        $sql = <<<SQL
        SELECT COUNT(*) as bookCount FROM book WHERE owner_id = :ownerId
        SQL;
        $result = $this->db->query($sql, ['ownerId' => $ownerId]);
        $count = $result->fetch();

        return (int)$count['bookCount'];

    }
}

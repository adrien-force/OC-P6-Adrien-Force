<?php

class BookManager extends AbstractEntityManager
{
    public function createFromPost(array $post): Book
    {
        $book = new Book();

        $book->setTitle(htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'));
        $book->setAuthor(htmlspecialchars($post['author'], ENT_QUOTES, 'UTF-8'));
        $book->setDescription(htmlspecialchars($post['description'], ENT_QUOTES, 'UTF-8'));
        $book->setOwnerId($_SESSION['userId']);
        $book->setAvailability(htmlspecialchars($post['availability'], ENT_QUOTES, 'UTF-8'));
        $book->setPicture(Utils::uploadFile($_FILES['cover'], 'ressources/uploads/', 'book_cover'));
        return $book;
    }

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

    /*
     * legacy
     * deprecated
     */
    public function addBookFromData($title, $author, $description, $ownerId, $availability, $coverPath): void
    {
        $sql = <<<SQL
        INSERT INTO book (title, author, description, owner_id, availability, picture) VALUES (:title, :author, :description, :ownerId, :availability, :coverPath)
        SQL;
        $this->db->query($sql, ['title' => $title, 'author' => $author, 'description' => $description, 'ownerId' => $ownerId, 'availability' => $availability, 'coverPath' => $coverPath]);
    }

    public function addBook(Book $book): void
    {
        $sql = <<<SQL
        INSERT INTO book (title, author, description, owner_id, availability, picture) 
        VALUES (:title, :author, :description, :ownerId, :availability, :picture)
        SQL;

        $this->db->query($sql,
            [
            'title' => $book->getTitle(),
            'author' => $book->getAuthor(),
            'description' => $book->getDescription(),
            'ownerId' => $book->getOwnerId(),
            'availability' => $book->getAvailability(),
            'picture' => $book->getPicture()
        ]
        );
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

    public function getAvailableBooksByOwnerId($ownerId) {
        $sql = <<<SQL
        SELECT * FROM book WHERE owner_id = :ownerId AND availability = 'disponible'
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

    public function updateBook(int $id, string $title, string $author, string $description, string $availability): void
    {
        $sql = <<<SQL
    UPDATE book SET title = :title, author = :author, description = :description, availability = :availability WHERE id = :id
    SQL;
        $this->db->query($sql, [
            'title' => $title,
            'author' => $author,
            'description' => $description,
            'availability' => $availability,
            'id' => $id
        ]);
    }

    public function deleteBook(int $id)
    {
        $sql = <<<SQL
        DELETE FROM book WHERE id = :id
        SQL;
        $this->db->query($sql, ['id' => $id]);
    }
}

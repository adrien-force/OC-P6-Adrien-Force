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

}
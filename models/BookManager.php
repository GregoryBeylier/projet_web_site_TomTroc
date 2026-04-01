<?php
require __DIR__ . '/../config/DBConnect.php';

class BookManager extends DBConnect
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->getPdo();
    }

    public function getAllBooks()
    {
        $sql = 'SELECT * FROM book';
        $stmt = $this->pdo->query($sql);
        $books = $stmt->fetchALL(PDO::FETCH_ASSOC);
        // $books = [];

        return $books;

        // foreach ($stmt as $row) {
        //     $book = new Book();
        //     $book->setID($row['id']);
        //     $book->setTitle($row['title']);
        //     $book->setDescription($row['description']);
        //     $book->setAuthor($row['author']);
        //     $book->setpicture($row['picture']);
        //     $book->setStatus($row['status']);
        //     $book->setUserID($row['user_id']);
        //     $books[] = $book;
        // }
        // return $books;
    }
}
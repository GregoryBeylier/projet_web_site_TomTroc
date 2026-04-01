<?php

require __DIR__ . '/../models/BookManager.php';

class BookController
{
    private $bookManager;

    public function __construct()
    {
        $this->bookManager = new BookManager();
    }

    public function listBooks()
    {
        $books = $this->bookManager->getAllBooks();
        require __DIR__ . '/../views/book/list.php';
    }
}
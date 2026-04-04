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

    public function library() 
    {
        $user_id = $_SESSION['user_id']; // Assurez-vous que l'utilisateur est connecté et que son ID est stocké dans la session
        $books = $this->bookManager->getBooksByUserId($user_id);
        require __DIR__ . '/../views/user/library.php';
    }
}
<?php

require_once __DIR__ . '/../models/BookManager.php';
require_once __DIR__ . '/../models/UserManager.php';

class BookController
{
    private $bookManager;
    private $userManager;

    // Constructeur pour initialiser le BookManager
    public function __construct()
    {
        $this->bookManager = new BookManager();
        $this->userManager = new UserManager();
    }

    // Méthode pour afficher la liste de tous les livres
    public function listBooks()
    {
        $books = $this->bookManager->getAllBooks();
        require __DIR__ . '/../views/book/list.php';
    }

    // Nouvelle méthode pour afficher les livres d'un utilisateur spécifique
    public function library() 
    {
        $user_id = $_SESSION['user_id']; // Assurez-vous que l'utilisateur est connecté et que son ID est stocké dans la session
        $books = $this->bookManager->getBooksByUserId($user_id);
        require __DIR__ . '/../views/user/library.php';
    }

    // Nouvelle méthode pour afficher les livres disponibles
    public function listAvailableBooks()
    {
        $books = $this->bookManager->getAvailableBook();
        require __DIR__ . '/../views/book/list.php';
    }

    // Méthode pour afficher les détails d'un livre spécifique
    public function detail()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $book = $this->bookManager->getBookById($id);
            if ($book) {
                $user = $this->userManager->getUserById($book['user_id']);
                require __DIR__ . '/../views/book/detail.php';
            } else {
                echo 'Livre non trouvé.';
            }
        } else {
            echo 'ID du livre manquant.';
        }
    }
}
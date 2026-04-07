<?php
require __DIR__ . '/../config/DBConnect.php';

class BookManager extends DBConnect
{
    private $pdo;

    // Constructeur pour initialiser la connexion PDO
    public function __construct()
    {
        $this->pdo = $this->getPdo();
    }

    // Méthode pour récupérer tous les livres
    public function getAllBooks()
    {
        $sql = 'SELECT * FROM book';
        $stmt = $this->pdo->query($sql);
        $books = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $books;
    }

    // Méthode pour récupérer les livres d'un utilisateur spécifique
    public function getBooksByUserId($user_id)
     {
        $sql = 'SELECT * FROM book WHERE user_id = :user_id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $books = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $books;
    }

    // Méthode pour récupérer les livres disponibles (status = 1)
    public function getAvailableBook()
    {
        $sql = 'SELECT * FROM book WHERE status = 1';
        $stmt = $this->pdo->query($sql);
        $books = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $books;
    }
    
    // Méthode pour récupérer les détails d'un livre spécifique
    public function getBookById($id)
    {
        $sql = 'SELECT * FROM book WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $book = $stmt->fetch(PDO::FETCH_ASSOC);
        return $book;
    }
}
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
    
}
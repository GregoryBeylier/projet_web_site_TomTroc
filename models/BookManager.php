<?php
require_once __DIR__ . '/../config/DBConnect.php';
require_once __DIR__ . '/../models/Book.php';


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
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
        $books = $stmt->fetchAll();

        return $books;
    }

    // Méthode pour récupérer les livres d'un utilisateur spécifique
    public function getBooksByUserId($user_id)
    {
        $sql = 'SELECT * FROM book WHERE user_id = :user_id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
        $books = $stmt->fetchAll();



        return $books;
    }

    // Méthode pour récupérer les livres disponibles (status = 1)
    public function getAvailableBook()
    {
        $sql = 'SELECT * FROM book WHERE status = 1';
        $stmt = $this->pdo->query($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
        $books = $stmt->fetchALL();

        return $books;
    }

    // Méthode pour récupérer les détails d'un livre spécifique
    public function getBookById($id)
    {
        $sql = 'SELECT * FROM book WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
        $book = $stmt->fetch();

        return $book;
    }

    //Méthode pour récupéerer les 4 derniers livres ajoutés 

    public function getLastBooks()
    {
        $sql = 'SELECT book.*, user.pseudo FROM book JOIN user ON  book.user_id = user.id  ORDER BY id DESC LIMIT 4';
        $stmt = $this->pdo->query($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');

        return $stmt->fetchAll();
    }


    // Méthode pour ajouter un nouveau livre
    public function addBook($title, $picture, $author, $description, $status, $user_id)
    {
        $sql = 'INSERT INTO book (title, picture, author, description, status, user_id) VALUES (:title, :picture, :author, :description, :status, :user_id)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':picture', $picture);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // Méthode pour mettre à jour un livre existant
    public function updateBook($title, $picture, $author, $description, $status, $id)
    {
        $sql = 'UPDATE book SET title = :title, picture = :picture, author = :author, description = :description, status = :status WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':picture', $picture);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // Méthode pour supprimer un livre
    public function deleteBook($id)
    {
        $sql = 'DELETE FROM book WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // Méthode de moteur de recherche pour les livres
    public function searchBooks($search)
    {
        $searchTerm = '%' . $search . '%'; // Ajouter des jokers pour la recherche partielle

        $sql = 'SELECT * FROM book WHERE title LIKE :search AND status = 1'; // Rechercher uniquement les livres disponibles
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':search', $searchTerm);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Book');
        $books = $stmt->fetchALL();

        return $books;
    }
}

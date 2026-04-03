<?php 
require_once __DIR__ . '/../config/DBConnect.php';

class UserManager extends DBConnect {
    
    private $pdo;

    // Initialise la connexion à la base de données
    public function __construct() 
    {
        $this->pdo = $this->getPdo();
    }

    // Crée un nouvel utilisateur dans la base de données
    public function createUser($name, $firstname, $email, $password, $pseudo, $profile_photo)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = 'INSERT INTO user (name, first_name, email, password, pseudo, profile_photo) VALUES (:name, :first_name, :email, :password, :pseudo, :profile_photo)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':first_name', $firstname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':profile_photo', $profile_photo);
        
        return $stmt->execute();
    }

    // Vérifie si l'email existe déjà dans la base de données
    public function emailExists($email)
    {
        $sql = 'SELECT id FROM user WHERE email = :email';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    // Récupère un utilisateur par son email
    public function getUserByEmail($email)
    {
        $sql = 'SELECT * FROM user WHERE email = :email';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
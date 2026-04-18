<?php
require_once __DIR__ . '/../config/DBConnect.php';
require_once __DIR__ . '/User.php';
require_once __DIR__ . '/Message.php';


class MessageManager extends DBConnect
{
    private $pdo;

    // Initialise la connexion à la base de données
    public function __construct()
    {
        $this->pdo = $this->getPdo();
    }

    // Envoie un message d'un utilisateur à un autre
    public function sendMessage($senderId, $receiverId, $content)
    {
        $sql = 'INSERT INTO message (sender_id, receiver_id, content) VALUES (:sender_id, :receiver_id, :content)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':sender_id', $senderId);
        $stmt->bindParam(':receiver_id', $receiverId);
        $stmt->bindParam(':content', $content);

        return $stmt->execute();
    }

    // Récupère les messages échangés entre deux utilisateurs
    public function getMessages($senderId, $receiverId)
    {
        $sql = 'SELECT * FROM message WHERE (sender_id = :sender_id AND receiver_id = :receiver_id) OR (sender_id = :receiver_id AND receiver_id = :sender_id) ORDER BY created_at ASC';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':sender_id', $senderId);
        $stmt->bindParam(':receiver_id', $receiverId);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Message');
        $message = $stmt->fetchAll();

        return $message;
    }

    // Récupère les conversations d'un utilisateur
    public function getConversations($userId)
    {
        $sql = 'SELECT DISTINCT u.id, u.pseudo, u.profile_photo FROM user u JOIN message m ON (u.id = m.sender_id OR u.id = m.receiver_id) WHERE u.id != :user_id AND (m.sender_id = :user_id2 OR m.receiver_id = :user_id3)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':user_id', $userId);
        $stmt->bindValue(':user_id2', $userId);
        $stmt->bindValue(':user_id3', $userId);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $message = $stmt->fetchAll();

        return $message;
    }

    //Récupère le dernier message entre deux utilisateurs
    public function getLastMessage($userId, $otherId)
    {
        $sql = 'SELECT content FROM message 
            WHERE (sender_id = :user_id AND receiver_id = :other_id) 
            OR (sender_id = :other_id2 AND receiver_id = :user_id2) 
            ORDER BY created_at DESC LIMIT 1';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':user_id', $userId);
        $stmt->bindValue(':user_id2', $userId);
        $stmt->bindValue(':other_id', $otherId);
        $stmt->bindValue(':other_id2', $otherId);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    // Marque un message comme lu
    public function markAsRead($senderId, $receiverId)
    {
        $sql = 'UPDATE message SET is_read = 1 WHERE sender_id = :sender_id AND receiver_id = :receiver_id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':sender_id', $senderId);
        $stmt->bindValue(':receiver_id', $receiverId);

        return $stmt->execute();
    }

    // Compte les messages non lus
    public function countUnreadMessages($userId)
    {
        $sql = 'SELECT COUNT(*) FROM message WHERE receiver_id = :user_id AND is_read = 0';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}

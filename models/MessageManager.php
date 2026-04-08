<?php

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

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupère les conversations d'un utilisateur
    public function getConversations($userId)
    {
        $sql = 'SELECT DISTINCT u.id, u.name, u.first_name, u.pseudo, u.profile_photo FROM user u JOIN message m ON (u.id = m.sender_id OR u.id = m.receiver_id) WHERE (m.sender_id = :user_id OR m.receiver_id = :user_id) AND u.id != :user_id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':user_id', $userId);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Marque un message comme lu
    public function markAsRead($senderId, $receiverId)
    {
        $sql = 'UPDATE message SET is_read = 1 WHERE (sender_id = :sender_id AND receiver_id = :receiver_id) OR (sender_id = :receiver_id AND receiver_id = :sender_id)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':sender_id', $senderId);
        $stmt->bindValue(':receiver_id', $receiverId);

        return $stmt->execute();
    }
}

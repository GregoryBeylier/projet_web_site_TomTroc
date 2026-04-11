<?php

require_once __DIR__ . '/../models/MessageManager.php';
require_once __DIR__ . '/../models/UserManager.php';

class MessageController
{
    private $messageManager;

    public function __construct()
    {
        $this->messageManager = new MessageManager();
    }

    // Méthode pour envoyer un message
    public function conversations()
    {
        // Vérifiez si l'utilisateur est connecté
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=user&action=login');
            exit();
        }

        $userId = $_SESSION['user_id']; // Assurez-vous que l'utilisateur est connecté et que son ID est stocké dans la session
        $conversations = $this->messageManager->getConversations($userId);
        require __DIR__ . '/../views/message/conversations.php';
    }

    // Méthode pour afficher une conversation spécifique entre deux utilisateurs
    public function thread()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=user&action=login');
            exit();
        }

        $userId = $_SESSION['user_id']; // Assurez-vous que l'utilisateur est connecté et que son ID est stocké dans la session
        $otherId = $_GET['id'] ?? null; // Récupérez l'ID de l'autre utilisateur à partir de la requête
        $messages = $this->messageManager->getMessages($userId, $otherId);
        $userManager = new UserManager(); // Instanciez UserManager pour obtenir les informations sur l'autre utilisateur
        $otherUser = $userManager->getUserById($otherId); // Obtenez les informations sur l'autre utilisateur
        require __DIR__ . '/../views/message/thread.php';
    }

    // Méthode pour envoyer un message
    public function send()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=user&action=login');
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $senderId = $_SESSION['user_id']; // ID de l'utilisateur connecté
            $receiverId = (int) $_POST['receiver_id'] ?? null; // ID du destinataire
            $content = htmlspecialchars($_POST['content'] ?? null); // Contenu du message
            $sender = $this->messageManager->sendMessage($senderId, $receiverId, $content);
            header('Location: index.php?controller=message&action=thread&id=' . $receiverId);
            exit();
        }
    }
}

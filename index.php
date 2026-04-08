<?php
session_start();

// Inclure les contrôleurs nécessaires
require 'controllers/BookController.php';
require 'controllers/UserController.php';
require 'controllers/MessageController.php';

// Récupérer les paramètres de la requête
$controller = $_GET['controller'] ?? 'book';
$action = $_GET['action'] ?? 'availableBooks';


try {

    switch ($controller) {
        case 'book':
            switch ($action) {
                case 'list':
                    $bookController = new BookController();
                    $bookController->listBooks();
                    break;
                case 'availableBooks':
                    $bookController = new BookController();
                    $bookController->listAvailableBooks();
                    break;
                case 'detail':
                    $bookController = new BookController();
                    $bookController->detail();
                    break;
                case 'add':
                    $bookController = new BookController();
                    $bookController->addBook();
                    break;
                case 'edit':
                    $bookController = new BookController();
                    $bookController->editBook();
                    break;
                case 'delete':
                    $bookController = new BookController();
                    $bookController->deleteBook();
                    break;
            }
            break;

        case 'user':
            switch ($action) {
                case 'register':
                    $userController = new UserController();
                    $userController->register();
                    break;
                case 'login':
                    $userController = new UserController();
                    $userController->login();
                    break;
                case 'logout':
                    $userController = new UserController();
                    $userController->logout();
                    break;
                case 'updateProfile':
                    $userController = new UserController();
                    $userController->updateProfile();
                    break;
                case 'profile':
                    $userController = new UserController();
                    $userController->profile();
                    break;
                case 'showProfile':
                    $userController = new UserController();
                    $userController->showProfile();
                    break;
            }
            break;

        case 'message':
            switch ($action) {
                case 'conversations':
                    $messageController = new MessageController();
                    $messageController->conversations();
                    break;
                case 'thread':
                    $messageController = new MessageController();
                    $messageController->thread();
                    break;
                case 'send':
                    $messageController = new MessageController();
                    $messageController->send();
                    break;
            }
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

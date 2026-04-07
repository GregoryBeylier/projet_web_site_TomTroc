<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Inclure les contrôleurs nécessaires
require 'controllers/BookController.php';
require 'controllers/UserController.php';

// Récupérer les paramètres de la requête
$controller = $_GET['controller'] ?? 'book';
$action = $_GET['action'] ?? 'list';


try {
    
switch ($controller) 
        {
            case 'book':
                switch ($action) 
                {
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
                switch ($action) 
                {
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
                }
            break;
      
        }
        
    
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
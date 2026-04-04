<?php
session_start();

require 'controllers/BookController.php';
require 'controllers/UserController.php';

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
<?php

require 'controllers/BookController.php';
require 'controllers/UserController.php';

$controller = $_GET['controller'] ?? 'book';
$action = $_GET['action'] ?? 'list';

try {
    
switch ($controller) {
        case 'book':
            switch ($action) {
                case 'list':
                    $bookController = new BookController();
                    $bookController->listBooks();
                    break;
            }
            break;
        case 'user':
            switch ($action) {
                case 'register':
                    $userController = new UserController();
                    $userController->register();
                    break;
            }
            break;
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
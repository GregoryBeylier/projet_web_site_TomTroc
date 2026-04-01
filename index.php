<?php

require 'controllers/BookController.php';

$action = $_GET['action'] ?? 'listBooks';
try {
    
switch ($action) {
        case 'listBooks':
            $bookController = new BookController();
            $bookController->listBooks();
            break;
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
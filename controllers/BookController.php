<?php

require_once __DIR__ . '/../models/BookManager.php';
require_once __DIR__ . '/../models/UserManager.php';

class BookController
{
    private $bookManager;
    private $userManager;

    // Constructeur pour initialiser le BookManager
    public function __construct()
    {
        $this->bookManager = new BookManager();
        $this->userManager = new UserManager();
    }

    // Méthode pour afficher la liste de tous les livres
    public function listBooks()
    {
        $books = $this->bookManager->getAllBooks();
        require __DIR__ . '/../views/book/list.php';
    }

    // Nouvelle méthode pour afficher les livres d'un utilisateur spécifique
    public function library()
    {
        $user_id = $_SESSION['user_id']; // Assurez-vous que l'utilisateur est connecté et que son ID est stocké dans la session
        $books = $this->bookManager->getBooksByUserId($user_id);
        require __DIR__ . '/../views/user/library.php';
    }

    // Nouvelle méthode pour afficher les livres disponibles
    public function listAvailableBooks()
    {
        $search = $_GET['search'] ?? null; // Récupérer le terme de recherche depuis la requête GET
        if ($search) {
            $books = $this->bookManager->searchBooks($search); // Appeler une méthode de recherche dans le BookManager
        } else {
            $books = $this->bookManager->getAvailableBook(); // Afficher tous les livres disponibles si aucun terme de recherche n'est fourni
        }

        require __DIR__ . '/../views/book/list.php';
    }

    // Méthode pour afficher les détails d'un livre spécifique
    public function detail()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $book = $this->bookManager->getBookById($id);
            if ($book) {
                $user = $this->userManager->getUserById($book['user_id']);
                require __DIR__ . '/../views/book/detail.php';
            } else {
                echo 'Livre non trouvé.';
            }
        } else {
            echo 'ID du livre manquant.';
        }
    }

    // Méthode pour ajouter un nouveau livre 
    public function addBook()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=user&action=login');
            exit();
        }

        // recuperer les données du formulaire d'ajout de livre
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = htmlspecialchars($_POST['title']);
            $author = htmlspecialchars($_POST['author']);
            $description = htmlspecialchars($_POST['description']);
            $status = isset($_POST['status']) ? 1 : 0; // Par exemple, un checkbox pour le statut
            $user_id = $_SESSION['user_id']; // Assurez-vous que l'utilisateur est connecté
            $picture = $_FILES['picture']['name']; // Nom du fichier téléchargé

            $error = [];

            // Validation des données
            if ((empty($title)) || empty($author) || empty($description)) {
                $error['titre'] = 'Le titre est requis.';
                $error['author'] = 'L\'auteur est requis.';
                $error['description'] = 'La description est requise.';
            }

            if (!empty($error)) {
                require __DIR__ . '/../views/book/add.php';
                return;
            }

            // ajouter le livre à la base de données
            if ($this->bookManager->addBook($title, $picture, $author, $description, $status, $user_id)) {
                // rediriger vers la liste des livres après l'ajout
                header('Location: index.php?controller=book&action=list');
                exit();
            } else {
                echo 'Erreur lors de l\'ajout du livre.';
            }
        } else {
            // afficher le formulaire d'ajout de livre
            require __DIR__ . '/../views/book/add.php';
        }
    }

    // Méthode pour modifier un livre existant
    public function editBook()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=user&action=login');
            exit();
        }

        $id = $_GET['id'] ?? null; // ← change juste le nom ici

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = htmlspecialchars($_POST['title']);
            $author = htmlspecialchars($_POST['author']);
            $description = htmlspecialchars($_POST['description']);
            $status = isset($_POST['status']) ? 1 : 0; // Par exemple, un checkbox pour le statut
            $picture = $_FILES['picture']['name']; // Nom du fichier téléchargé

            $error = [];

            // Validation des données
            if ((empty($title)) || empty($author) || empty($description)) {
                $error['titre'] = 'Le titre est requis.';
                $error['author'] = 'L\'auteur est requis.';
                $error['description'] = 'La description est requise.';
            }

            if (!empty($error)) {
                require __DIR__ . '/../views/book/edit.php';
                return;
            }

            // Mettre à jour le livre dans la base de données
            if ($this->bookManager->updateBook($title, $picture, $author, $description, $status, $id)) {
                // rediriger vers la liste des livres après la modification
                header('Location: index.php?controller=book&action=list');
                exit();
            } else {
                echo 'Erreur lors de la modification du livre.';
            }
        } else {
            // afficher le formulaire de modification de livre
            $book = $this->bookManager->getBookById($id);
            if ($book) {
                require __DIR__ . '/../views/book/edit.php';
            } else {
                echo 'Livre non trouvé.';
            }
        }
    }

    public function deleteBook()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=user&action=login');
            exit();
        }

        $id = $_GET['id'] ?? null;
        if ($id) {
            if ($this->bookManager->deleteBook($id)) {
                // rediriger vers la liste des livres après la suppression
                header('Location: index.php?controller=book&action=list');
                exit();
            } else {
                echo 'Erreur lors de la suppression du livre.';
            }
        } else {
            echo 'ID du livre manquant.';
        }
    }
}

<?php 

require_once __DIR__ . '/../models/UserManager.php';
require_once __DIR__ . '/../models/BookManager.php';

class UserController
{
    private $userManager;
    private $bookManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
        $this->bookManager = new BookManager();
    }

    public function register()
    {
        // traiter les données du formulaire d'inscription
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $image = $_FILES['image'] ?? null;

            $error = []; // tableau pour stocker les message d'erreurs 

            // validation des données
            if (empty($name) || empty($firstname) || empty($email) || empty($password) || empty($pseudo)) 
            {
                $error['name'] = 'Le nom est requis.';
                $error['firstname'] = 'Le prénom est requis.';
                $error['email'] = 'L\'email est requis.';
                $error['password'] = 'Le mot de passe est requis.';
                $error['pseudo'] = 'Le pseudo est requis.';

            }

            // vérifier si l'email est valide 
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            {
               $error['email'] = 'L\'adresse email n\'est pas valide.';
            }

            // vérifier si l'email existe déjà dans la base de données
            if ($this->userManager->emailExists($email)) 
            {
                $error['email'] = 'Cette adresse email est déjà utilisée.';
            }

            // longeur du mot de passe
            if (strlen($password) < 8) 
            {
                $error['password'] = 'Le mot de passe doit contenir au moins 8 caractères.';
                
            }

            // afficher les erreurs s'il y en a
            if (!empty($error)) {
                require __DIR__ . '/../views/user/register.php';
                return;
            }

             // créer l'utilisateur
            if ($this->userManager->createUser($name, $firstname, $email, $password, $pseudo, null)) 
            {
                header('Location: index.php?controller=user&action=login');
                exit();
            } else {
                $error['general'] = 'Une erreur est survenue lors de l\'inscription.';
                require __DIR__ . '/../views/user/register.php';
                return;
            }
           
        } else {
        // afficher le formulaire d'inscription
        require __DIR__ . '/../views/user/register.php';
        }
    }

        // Connection de l'utilisateur
        public function login() 
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);

                $error = [];

                if (empty($email) || empty($password)) {
                    $error['email'] = 'L\'email est requis.';
                    $error['password'] = 'Le mot de passe est requis.';
                }

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error['email'] = 'L\'adresse email n\'est pas valide.';
                }

                if (!empty($error)) {
                    require __DIR__ . '/../views/user/login.php';
                    return;
                }

                $user = $this->userManager->getUserByEmail($email);

                if ($user && password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    header('Location: index.php');
                    exit();
                } else {
                    $error['general'] = 'Email ou mot de passe incorrect.';
                    require __DIR__ . '/../views/user/login.php';
                    return;
                }
            } else {
                require __DIR__ . '/../views/user/login.php';
            }
        }

        // Déconnexion de l'utilisateur
        public function logout()
        {
            session_destroy();
            header('Location: index.php');
            exit();
        }
         
        // Afficher le profil de l'utilisateur
        public function profile()
        {
            $id = $_SESSION['user_id'];
            $user = $this->userManager->getUserById($id);
            $books = $this->bookManager->getBooksByUserId($id);
            require __DIR__ . '/../views/user/profile.php';

        }

        // Mettre à jour le profil de l'utilisateur
        public function updateProfile()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_SESSION['user_id'];
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                $pseudo = htmlspecialchars($_POST['pseudo']);

                $error = [];

                if (empty($email) || empty($pseudo)) {
                    $error['email'] = 'L\'email est requis.';
                    $error['pseudo'] = 'Le pseudo est requis.';
                }

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error['email'] = 'L\'adresse email n\'est pas valide.';
                }

                if (!empty($error)) {
                    require __DIR__ . '/../views/user/profile.php';
                    return;
                }

                if ($this->userManager->updateUser($id, $email, $password, $pseudo)) {
                    header('Location: index.php?controller=user&action=profile');
                    exit();
                } else {
                    $error['general'] = 'Une erreur est survenue lors de la mise à jour du profil.';
                    $user = $this->userManager->getUserById($id);
                    require __DIR__ . '/../views/user/profile.php';
                    return;
                }
            } else {
                header('Location: index.php?controller=user&action=profile');
                exit();
            }

            
        }

}
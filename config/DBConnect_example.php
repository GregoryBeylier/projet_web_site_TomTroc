<?php

class DBConnect
{
    private $host = 'your_host';
    private $dbname = 'your_database_name';
    private $username = 'your_username';
    private $password = 'your_password';

    // Méthode pour obtenir une instance de PDO
    public function getPdo()
    {
        try {
            $pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8', $this->username, $this->password);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }

        return $pdo;
    }
}

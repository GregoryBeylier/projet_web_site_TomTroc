# TomTroc 

Plateforme d'échange de livres entre particuliers.

## Prérequis

- PHP 8.0 ou supérieur
- MySQL 5.7 ou supérieur (testé avec MySQL 8.4)
- Laragon (ou WAMP/XAMPP)

## Installation

1. **Cloner le projet**
```bash
git clone https://github.com/GregoryBeylier/projet_web_site_TomTroc.git
```

2. **Importer la base de données**
- Ouvrir phpMyAdmin
- Créer une base de données nommée `tomtroc`
- Importer le fichier `tomtroc.sql` situé à la racine du projet

3. **Configurer la connexion BDD**
- Copier `config/DBConnect_example.php` en `config/DBConnect.php`
- Renseigner vos identifiants de connexion

4. **Lancer le projet**
- Placer le projet dans le dossier `www` de Laragon
- Démarrer Laragon
- Accéder à `http://localhost/projet_web_site_TomTroc`

## Stack technique

- PHP 8 (MVC, PDO)
- MySQL
- HTML / CSS vanilla
- JavaScript vanilla

## Fonctionnalités

- Inscription et connexion
- Ajout, modification et suppression de livres
- Échange de livres entre utilisateurs
- Messagerie entre utilisateurs
- Profil utilisateur avec photo

## Comptes de démonstration

Pour tester les fonctionnalités du site sans avoir à créer un compte, vous pouvez utiliser les identifiants suivants :

| Email | Mot de passe |
|-------|--------------|
| nathalie@exemple.com | 12345678 |
| alexandre@exemple.com | password |

> ⚠️ Les données associées à ces comptes sont purement fictives et ne proviennent d'aucune donnée personnelle réelle. Les livres, messages et informations de profil ont été créés uniquement à des fins de démonstration.
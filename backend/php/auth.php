<?php
// ./node_modules/\@angular/cli/bin/ng.js new frontend
// #ajouter un element dans le tableau de session en creeant une nouvelle clé
// $_SESSION['test'] = 'test des sessions';
// print_r($_SESSION);
require_once 'helper.php';

function authenticate() {
    session_start(['cookie_samesite' => 'Lax']);
    $pdo = new PDO('sqlite:../bda_form');

    if (array_key_exists('login', $_POST) && array_key_exists('password', $_POST)) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        // Préparer la requête SQL pour vérifier le couple login/password
        $sql = "SELECT Nom, mdp FROM Utilisateur WHERE Nom = :login AND mdp = :password";  //remplacer par recuperation d'id !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $stmt = $pdo->prepare($sql);
        
        // Exécuter la requête avec les valeurs fournies
        $stmt->execute(['login' => $login, 'password' => $password]);
        
        // Récupérer le résultat
        if ($stmt->fetch()) {
            // Si un utilisateur correspond
            $_SESSION['authenticated'] = true;
            $_SESSION['login'] = $login; // Utilisez une valeur appropriée, comme un ID utilisateur
            $_SESSION["password"] = $password;
            echo "Authentication successful\n";
            print_r($_SESSION);
            return true;
        }
        else {
            echo "No user found with this login or incorrect password.\n";
            print_r($_SESSION);
            return false;
        }
    }
}

function isAuthenticated() {
    session_start(['cookie_samesite' => 'Lax']);
    return array_key_exists('authenticated', $_SESSION) 
            && $_SESSION['authenticated'] === true;
}

function checkLogin(){
    session_start(['cookie_samesite' => 'Lax']);
    $pdo = new PDO('sqlite:../bda_form');

    if (array_key_exists('login', $_POST) && array_key_exists('password', $_POST)) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        // Préparer la requête SQL pour vérifier le couple login/password
        $sql = "SELECT Nom, mdp FROM Utilisateur WHERE Nom = :login AND mdp = :password"; 
        $stmt = $pdo->prepare($sql);
        
        // Exécuter la requête avec les valeurs fournies
        $stmt->execute(['login' => $login, 'password' => $password]);
        if ($stmt->fetch()) {
            sendMessage(''); 
        }
        else {
            sendError('login ou password incorrect');
        }
    }
    else {
        sendError('login ou password non fourni');
        return false;
    }
}


<?php

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

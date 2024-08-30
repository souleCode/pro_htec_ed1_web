<?php


$server = 'localhost';
$login = 'root';
$pass = '';

// instance= new CLASS_NAME();
try {
    $pdo = new PDO("mysql:host=$server;port=3345;dbname=web_2024", $login, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion executed";
} catch (PDOException $e) {
    echo "error: " . $e->getMessage();
}

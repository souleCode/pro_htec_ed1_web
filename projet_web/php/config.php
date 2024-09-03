<?php

$server = 'localhost';
$login = 'root';
$pass = '';


try {
	$pdo = new PDO("mysql:host=$server;port=3345;dbname=blog_formation", $login, $pass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// $bdd->query('SET lc_time_names = "fr_FR"');
	// echo "Connexion executed";
} catch (PDOException $e) {
	echo "error: " . $e->getMessage();
}



// $side_commentaires = $bdd->query('SELECT * FROM commentaires ORDER BY id DESC LIMIT 5');

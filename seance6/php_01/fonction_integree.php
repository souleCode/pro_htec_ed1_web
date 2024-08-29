<?php
session_start();
require('fonctions.php');
// include('fonctions.php');
echo "Le temps en seconde ecoulé depuis 1970 a 00h " . time();
displayBr();
echo "La date actuelle en format jr/mois/annee " . date("d/m/Y");
displayBr();

echo '<h2>Les constantes magiques en PHP:</h2>';
displayBr();

echo __DIR__;
displayBr();
echo __FILE__;
displayBr();
echo __FUNCTION__;
displayBr();
echo __LINE__;
displayBr();
echo __METHOD__; // POST and GET
displayBr();
echo '<h1>Les supers globals en php</h1>';
displayBr();
var_dump($_SERVER['HTTP_HOST']);
displayBr();
var_dump($_REQUEST);
displayBr();
var_dump($_POST);
displayBr();
var_dump($_GET);
displayBr();
var_dump($_SESSION); // utiliser pour connecter les utilisateur
displayBr();
var_dump($_COOKIE);
displayBr();
var_dump($_FILE);

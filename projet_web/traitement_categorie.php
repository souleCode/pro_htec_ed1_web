<?php
include_once('php/config.php');
include_once('php/functions.php');

if (isset($_POST['categorie'], $_POST['nom'])) {
    $nom = securisation($_POST['nom']);
    $slug = creer_slug($nom);
    $_SESSION['cat'] = $nom;
    if (!empty($nom) && !empty($slug)) {
        $query = "INSERT INTO categories (nom,slug_categorie) 
         VALUES(?, ?)";
        $result = $pdo->prepare($query);
        $params = array($nom, $slug);
        $result->execute($params);
        header("Location:administration.php");
    } else {
        $_SESSION['category_msg'] = "Veuillez remplir tout les chmaps";
        header('Location:administration.php');
    }
}

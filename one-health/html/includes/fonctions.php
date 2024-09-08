<?php
session_start();
function getNomCategorie($slug)
{
    global $pdo;
    $categorie = $pdo->prepare('SELECT nom FROM categories WHERE slug_categorie = ?');
    $categorie->execute([$slug]);

    $categorie = $categorie->fetchColumn();
    return $categorie;
}

function securisation($data)
{
    $data = htmlspecialchars($data);

    return $data;
}

function creer_slug($nom_categorie)
{
    // Convertir en minuscules
    $slug = strtolower($nom_categorie);

    // Remplacer les espaces par des tirets
    $slug = str_replace(' ', '-', $slug);

    // Supprimer les caractères spéciaux (à adapter selon tes besoins)
    $slug = preg_replace('/[^a-z0-9-]/', '', $slug);

    return $slug;
}


function contentTraitment($content, $longueurMax = 100)
{
    if (strlen($content) > $longueurMax) {
        return substr($content, 0, $longueurMax) . '...';
    } else {
        return $content;
    }
}

function emailExists(String $email, PDO $pdo)
{
    $query = $pdo->prepare("SELECT * FROM users WHERE email=:email");
    $query->bindValue(":email", $email);
    $query->execute();
    if ($query->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}
function login($id, $password, $email)
{
    $_SESSION['idUser'] = $id;
    $_SESSION['pwdU'] = $password;
    $_SESSION['emailU'] = $email;
}
function logout()
{
    unset($_SESSION['idUser']);
    unset($_SESSION['pwdU']);
    unset($_SESSION['emailU']);
}



function CreatePasswor()
{

    $chars = "abcdefghijkmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ0123456789";
    srand((float)microtime() * 1000000);
    $i = 0;
    $pass = '';

    while ($i <= 7) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }

    return $pass;
}

// echo CreatePasswor();

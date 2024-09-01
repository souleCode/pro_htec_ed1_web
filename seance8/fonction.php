<?php
session_start();
function securisation($data)
{
    $data = htmlspecialchars($data);
    $data = htmlentities($data);
    $data = trim($data);
    return $data;
}

function isEmailValide($data)
{
    $pattern = "/^[\w\-\.]+@gmail\.com$/";
    $result = preg_match($pattern, $data);
    return $result;
}

function EmailExists(String $email, PDO $pdo)
{
    $query = "SELECT email FROM users WHERE email=?";
    $result = $pdo->prepare($query);
    $result->execute([$email]);
    if ($result->rowCount() > 0) {
        return True;
    } else {
        return False;
    }
}
// if(!EmailExists($email, $pdo)==True)

function login($email, $id, $nom)
{
    $_SESSION['email'] = $email;
    $_SESSION['nom'] = $nom;
    $_SESSION['id'] = $id;
}
function logout()
{
    unset($_SESSION['email']);
    unset($_SESSION['id']);
    unset($_SESSION['nom']);
    // Detruis les session one by one. C'est interessant car vous n'allez pas detuire toutes les sessions
    // session_destroy(); Detruis toutres les sessions sur votre sites web.
}
function iConnected()
{
    if (isset($_SESSION['email'], $_SESSION['id'], $_SESSION['nom']) && !empty($_SESSION['id']) && !empty($_SESSION['email']) && !empty($_SESSION['nom'])) {
        return True;
    } else {
        return False;
    }
}
function contentTraitment($content, $longueurMax = 100)
{
    if (strlen($content) > $longueurMax) {
        return substr($content, 0, $longueurMax) . '...';
    } else {
        return $content;
    }
}

<?php
include_once('fonction.php');
include('config.php');
//Traitement de la session quand user veut acceder a une page qui necessite la connexion
if (isset($_SESSION['login_msg'])) {
    $login_msg = $_SESSION['login_msg'];
    unset($_SESSION['login_msg']);
}
if (isset($login_msg) && !empty($login_msg)) {
    echo '<div class="alert alert-info text-center ">' . $login_msg . '</div>';
}
if (isset($_POST['submit'])) {
    $email = securisation($_POST['email']);
    $pwd = securisation($_POST['pwd']);
    if (isset($email, $pwd) && !empty($email) && !empty($pwd)) {
        $query = "SELECT * FROM users WHERE email=?";
        $result = $pdo->prepare($query);
        $result->execute([$email]);
        // var_dump($result->fetch());
        $user = $result->fetch();
        $pass_hash = $user['password'];
        $id = $user['id'];
        $nom = $user['nom'];

        if (password_verify($pwd, $pass_hash)) {
            login($email, $id, $nom); // Pour le loger ic c'est mettre ces donnes dans la session, Pour pouvoir les utiliser apres
            header('Location:index.php');
            exit(); // arrete le programme oubien  vous utiliser die().
        } else {
            echo '<div class="alert alert-warning text-center ">Vos identifians sont incorrects</div>';
        }
    } else {
        echo '<div class="alert alert-warning text-center ">Veuillez remplir tous les champs</div>';
    }
}


?>




<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Les formulaires en PHP</title>
</head>



<div class="container">
    <!-- La difference enttre GET et POST: En post, les donnees sont pas vu en url. GET les donnees sont parser en url -->
    <h1> Ici un formulaire de ch Bootstrap v5 </h1>
    <form method="POST" action="">


        <div class="mb-3">
            <label for="" class="form-label">Votre adresse email</label>
            <input type="email " name="email" class="form-control" required>

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Mot de passe</label>
            <input type="password " name="pwd" class="form-control" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Envoyer</button>
    </form>



</div>
</div>

<body>

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>
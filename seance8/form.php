<?php
include('fonction.php');
include_once('config.php');
// '12345'==12345 mais en vrai '4'!=4, pour palier a ce probleme de type on utilise (===)
// == c'st une engalite, ex: $val==4
//= c'est une affectation pour dire la valeur prend la valeur a votre droite ex: $val=4;

//Traitement de la session quand user veut acceder a une page qui necessite la connexion
if (isset($_SESSION['connecte_msg'])) {
    $connecte_msg = $_SESSION['connecte_msg'];
    unset($_SESSION['connecte_msg']);
}
if (isset($connecte_msg) && !empty($connecte_msg)) {
    echo '<div class="alert alert-danger text-center ">' . $connecte_msg . '</div>';
}

//Traitement des donnees de users
if (isset($_POST['submit'])) {
    $nom = securisation($_POST['nom']);
    $prenom = securisation($_POST['prenom']);
    $email = securisation($_POST['email']);
    $pwd = securisation($_POST['pwd']);
    $pwd_confirm = securisation($_POST['pwd_confirm']);

    if (isset($nom, $prenom, $email, $pwd, $pwd_confirm) && !empty($nom) && !empty($email) && !empty($prenom) && !empty($pwd) && !empty($pwd_confirm)) {
        if ($pwd === $pwd_confirm) {
            // $password_hash = md5($pwd_confirm);
            $password_hash = password_hash($pwd, PASSWORD_DEFAULT);
            if (isEmailValide($email)) {
                if (!EmailExists($email, $pdo)) {
                    $query = "INSERT INTO users(nom,prenom,email,password)
                    VALUES(?,?,?,?)";
                    $params = array($nom, $prenom, $email, $password_hash);
                    $result = $pdo->prepare($query);
                    $res = $result->execute($params);
                    if ($res) {
                        $_SESSION['login_msg'] = "Votre compte est crée avec succès. Veuillez vous connectez en utilisant vos identifiants!";
                        header('Location:login.php');
                    }
                } else {
                    echo '<div class="alert alert-danger text-center ">Un compte existe deja avec et email</div>';
                }
            } else {
                echo '<div class="alert alert-info text-center ">Veuillez utiliser un email valide</div>';
            }
        } else {
            echo '<div class="alert alert-danger text-center ">Les mots de passe sont pas les mêmes</div>';
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
    <form method="POST" action="form.php">
        <div class="mb-3">
            <label for="" class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" required>

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Prenom</label>
            <input type="text" name="prenom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="email " name="email" class="form-control" required>

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Mot de passe</label>
            <input type="password " name="pwd" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Confirmez le mot de passe</label>
            <input type="password " name="pwd_confirm" class="form-control" required>
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
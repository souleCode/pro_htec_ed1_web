<?php
include_once('includes/config.php');
include_once('includes/fonctions.php');
$msg = "";
if (isset($_SESSION['error_registed'])) {
    $msg = $_SESSION['error_registed'];
    unset($_SESSION['error_registed']);
}
if (isset($_SESSION['champ_vide'])) {
    $msg = $_SESSION['champ_vide'];
    unset($_SESSION['champ_vide']);
}
if (isset($_SESSION['password_non_conforme'])) {
    $msg = $_SESSION['password_non_conforme'];
    unset($_SESSION['password_non_conforme']);
}
if (isset($_SESSION['email_existe'])) {
    $msg = $_SESSION['email_existe'];
    unset($_SESSION['email_existe']);
}
// var_dump($_SESSION);
if (isset($_POST['inscrire'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['numero'], $_POST['pwd'])) {
    $nom = securisation($_POST['nom']);
    $prenom = securisation($_POST['prenom']);
    $email = securisation($_POST['email']);
    $numero = securisation($_POST['numero']);
    $pwd = securisation($_POST['pwd']);
    $pwd_confirm = securisation($_POST['confirm_pwd']);


    if (!empty($nom) && !empty($prenom) && !empty($numero) && !empty($pwd) && !empty($email)) {
        if ($pwd_confirm === $pwd) {
            if (!emailExists($email, $pdo)) {
                $wpd_hash = password_hash($pwd, PASSWORD_DEFAULT);
                $query = "INSERT INTO users(nom,prenom,numero,password,email) VALUES(?,?,?,?,?)";
                $result = $pdo->prepare($query);
                $params = array($nom, $prenom, $numero, $wpd_hash, $email);
                $res = $result->execute($params);
                if ($res) {
                    $_SESSION['user_registed'] = "Vous êtes inscrits, Veuillez vous connectez avec vos identifiants";
                    header('location:connexion.php');
                } else {
                    $_SESSION['error_registed'] = "Une erreur est survenue lors de votre inscription, veuillez tenter une deuxieme fois";
                    header('location:register.php');
                }
            } else {
                $_SESSION['email_existe'] = "Un compte existe deja avec cet email";
                header('location:register.php');
            }
        } else {
            $_SESSION['password_non_conforme'] = "Vos mots de passes sont pas conformes";
            header('location:register.php');
        }
    } else {
        $_SESSION['champ_vide'] = "Veuillez completer tous les champs";
        header('location:register.php');
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<?php include_once('includes/head.php') ?>

<body>

    <?php include_once('includes/header.php') ?>

    <div class="container">
        <div class="comment-form-wrap pt-5">
            <h1 style="text-align: center;" class="mb-5">Inscription</h1>

            <?php if (isset($msg) && !empty($msg)) {
                echo '<div style="text-align:center;" class="alert alert-danger">' . $msg . '</div>';
            } ?>

            <form action="register.php" method="POST">
                <div class="form-row form-group">
                    <div class="col-md-6">
                        <label for="name">Nom </label>
                        <input type="text" name="nom" class="form-control" id="name">
                    </div>
                    <div class="col-md-6">
                        <label for="prenom">Prenom</label>
                        <input type="text" name="prenom" class="form-control" id="prenom">
                    </div>
                </div>
                <div class="form-row form-group">
                    <div class="col-md-6">
                        <label for="name">Nnumero </label>
                        <input type="text" name="numero" class="form-control" id="name">
                    </div>
                    <div class="col-md-6">
                        <label for="prenom">Email</label>
                        <input type="email" name="email" class="form-control" id="prenom">
                    </div>
                </div>

                <div class="form-row form-group">
                    <div class="col-md-6">
                        <label for="passe">Mot de passe </label>
                        <input type="password" name="pwd" class="form-control" id="passe">
                    </div>
                    <div class="col-md-6">
                        <label for="confirmpass">Confirmez le mot de passe</label>
                        <input type="password" name="confirm_pwd" class="form-control" id="confirmpass">
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="inscrire" value=" S'incrire" class="btn btn-primary">
                </div>
                <div class="form-group">
                    <a href="connexion.php" class="text-primary"> Déjà un compte?</a>
                </div>

            </form>
        </div>
    </div>

</body>

<?php include('includes/scripts.php') ?>

</html>
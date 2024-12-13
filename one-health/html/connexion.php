<?php
include_once('includes/config.php');
include_once('includes/fonctions.php');

$msg = "";
$msg_verify = "";
if (isset($_SESSION['user_registed'])) {
    $msg = $_SESSION['user_registed'];
    unset($_SESSION['user_registed']);
}
if (isset($_SESSION['pwd_non_verifie'])) {
    $msg_verify = $_SESSION['pwd_non_verifie'];
    unset($_SESSION['pwd_non_verifie']);
}
if (isset($_SESSION['email_sent'])) {
    $msg = $_SESSION['email_sent'];
    unset($_SESSION['email_sent']);
}

if (isset($_POST['connexion'], $_POST['email'], $_POST['pwd'])) {
    $email = securisation($_POST['email']);
    $pwd = securisation($_POST['pwd']);

    if (!empty($email) && !empty($pwd)) {
        $query = "SELECT * FROM users WHERE email=?";
        $result = $pdo->prepare($query);
        $result->execute([$email]);
        $users = $result->fetch();
        $hash_pass = $users['password'];
        $id = $users['id'];
        $nom = $users['nom'];
        $prenom = $users['prenom'];
        // echo $hash_pass;
        if (password_verify($pwd, $hash_pass)) {
            login($id, $pwd, $email);
            $_SESSION['user_connected'] = "Vous êtes connecté comme " . $nom . ' ' . $prenom;
            header('Location:index.php');
        } else {
            $_SESSION['pwd_non_verifie'] = "Vos identifiants sont incorrects";
            header('Location:connexion.php');
        }
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
            <h1 style="text-align: center;" class="mb-5">Connexion</h1>
            <?php if (isset($msg) && !empty($msg)) {
                echo '<div style="text-align:center;" class="alert alert-info">' . $msg . '</div>';
            } ?>
            <?php if (isset($msg_verify) && !empty($msg_verify)) {
                echo '<div style="text-align:center;" class="alert alert-danger">' . $msg_verify . '</div>';
            } ?>

            <form action="connexion.php" method="POST">

                <div class="form-row form-group">

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

                </div>
                <div class="form-group">
                    <input type="submit" name="connexion" value=" Se connecter" class="btn btn-primary">
                </div>
                <div class="form-group">
                    <a href="forget_password.php" class="text-primary"> Mot de passe oublié?</a>
                </div>

            </form>
        </div>
    </div>

</body>

<?php include('includes/scripts.php') ?>

</html>
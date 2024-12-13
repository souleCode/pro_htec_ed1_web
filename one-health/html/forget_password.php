<?php
include_once('includes/config.php');
include_once('includes/fonctions.php');

if (isset($_POST['pass_oublie'])) {
    $email = securisation($_POST['email']);
    $query = "SELECT* FROM users WHERE email=?";
    $result = $pdo->prepare($query);
    $result->execute([$email]);


    if ($result->rowCount() > 0) {
        $new_pass = CreatePasswor();
        $new_pass_hash = password_hash($new_pass, PASSWORD_DEFAULT);
        // mise a jour de user avec cet new pass
        $update = "UPDATE users SET password=? WHERE email=?";
        $params = array($new_pass_hash, $email);
        $result = $pdo->prepare($update);
        $result->execute($params);

        // Envoie email a user
        $to = $email;
        $subject = "Regeneration du mot de passe";
        $message = "Vous avez demander a mettre a jour votre mot de passe? Voici le nouveau mot de passe " . $new_pass;
        if (mail($to, $subject, $message)) {
            $_SESSION['email_sent'] = "Veuillez checker votre boite email, Votre mot de passe a ete regenerer";
            header("Location:connexion.php");
        };
    } else {
        $_SESSION['error_pwd_forget'] = "Aucun compte n'est associé a cet email";
        header('Location: register.php');
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
            <h1 style="text-align: center;" class="mb-5">Mot de passe oublié</h1>
            <form method="POST" class="">

                <div class="form-row form-group">

                    <div class="col-md-6">
                        <label for="prenom">Votre adresse email</label>
                        <input placeholder="Donnez l'email de votre compte" type="email" name="email" class="form-control" id="prenom">
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="pass_oublie" value="Envoyer" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

</body>

<?php include('includes/scripts.php') ?>

</html>
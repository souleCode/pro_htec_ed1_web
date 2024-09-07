<!DOCTYPE html>
<html lang="en">

<?php include_once('includes/head.php') ?>

<body>

    <?php include_once('includes/header.php') ?>

    <div class="container">
        <div class="comment-form-wrap pt-5">
            <h1 style="text-align: center;" class="mb-5">Mot de passe oublié</h1>
            <form action="#" class="">

                <div class="form-row form-group">

                    <div class="col-md-6">
                        <label for="prenom">Votre adresse email</label>
                        <input placeholder="Donnez l'email de votre compte" type="email" name="email" class="form-control" id="prenom">
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="connexion" value="Envoyer" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

</body>

<?php include('includes/scripts.php') ?>

</html>
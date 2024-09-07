<!DOCTYPE html>
<html lang="en">

<?php include_once('includes/head.php') ?>

<body>

    <?php include_once('includes/header.php') ?>

    <div class="container">
        <div class="comment-form-wrap pt-5">
            <h1 style="text-align: center;" class="mb-5">Connexion</h1>
            <form action="#" class="">

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
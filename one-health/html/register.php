<!DOCTYPE html>
<html lang="en">

<?php include_once('includes/head.php') ?>

<body>

    <?php include_once('includes/header.php') ?>

    <div class="container">
        <div class="comment-form-wrap pt-5">
            <h1 style="text-align: center;" class="mb-5">Inscription</h1>
            <form action="#" class="">
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
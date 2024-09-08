<?php
include_once('fonctions.php');
?>
<div class="back-to-top"></div>

<header>
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 text-sm">
                    <div class="site-info">
                        <a href="#"><span class="mai-call text-primary"></span> +212 0619944895</a>
                        <span class="divider">------</span>
                        <a href="#"><span class="mai-mail text-primary"></span> souleymanetraore2025@gmail.com</a>
                    </div>
                </div>
                <div class="col-sm-4 text-right text-sm">
                    <div class="social-mini-button">
                        <a href="#"><span class="mai-logo-facebook-f"></span></a>
                        <a href="#"><span class="mai-logo-twitter"></span></a>
                        <a href="#"><span class="mai-logo-instagram"></span></a>
                    </div>
                </div>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#"><span class="text-primary">Site</span>-Santé</a>

            <form action="#">
                <div class="input-group input-navbar">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Entrer un mot clés..." aria-label="Username"
                        aria-describedby="icon-addon1">
                </div>
            </form>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupport">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">A propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="doctors.php">Specialistes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contacter</a>
                    </li>
                    <?php if (isset($_SESSION['idUser'], $_SESSION['emailU'], $_SESSION['pwdU'])) : ?>
                        <li class="nav-item">
                            <a class="btn btn-primary ml-lg-3" href="logout.php">Se déconnecter</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="btn btn-primary ml-lg-3" href="register.php">S'inscrire</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div> <!-- .navbar-collapse -->
        </div> <!-- .container -->
    </nav>
</header>
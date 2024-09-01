<?php
include_once('fonction.php');
if (!iConnected()) {
    $_SESSION['connecte_msg'] = "Veuilez vous connectez avant de passer sur cette page.";
    header('Location:form.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vos connexions</title>
</head>

<body>
    <ul>

        <li><a href="projets.php">Projets</a></li>
        <li><a href="users.php" target="_blank">Utilisateurs</a></li>
    </ul>

    <h1>Bienvenu sur votre page de connexion</h1>
    <small>Ici, on se fait des amis de divers horizons,on partage nos experience, on ameliore notre visiblite</small>

    <table border="10" width="600px" height="400px">
        <!-- Entête du tableau -->
        <tr>
            <th>Nom:</th>
            <th>Prenom:</th>
            <th>Profession</th>
        </tr>

        <!-- Premiere personne du tableau -->
        <tr>
            <td>TRAORE</td>
            <td>Souley</td>
            <td>Eleve Ingenieur IA/Ds</td>
        </tr>
        <!-- 2eme personne du tableau -->
        <tr>
            <td>DIARRA</td>
            <td>Ibrahima</td>
            <td>Etudiant</td>
        </tr>
        <!-- 3e personne -->
        <tr>
            <td>KOMLAN</td>
            <td>Dieudonné</td>
            <td>Etudiant</td>
        </tr>
        <!-- 4em -->
        <tr>
            <td>KADIO</td>
            <td>Wahab</td>
            <td>Etudiant</td>
        </tr>
        <tr>
            <td>KADIO</td>
            <td>Wahab</td>
            <td>Etudiant</td>
        </tr>
    </table>

    <!-- les blocs et balises de structures -->
    <!-- les blocks -->
    <div>
        <h2>Ceci est un bloc</h2>
    </div>
    <span>
        <h2>Ce ci est un span</h2>
    </span>
    <h2>Ce ci est un h2
    </h2>

    <!-- <nav>
        <li>Accueil</li>
        <li>A propos</li>
        <li>Contact</li>
        <li>Services</li>
    </nav> -->

    <header>
        <li>Accueil</li>
        <li>A propos</li>
        <li>Contact</li>
        <li>Services</li>
    </header>
    <footer>
        <li>Liens utils</li>
        <li>Reseaux sociaux</li>
        <li>Liens externe</li>
        <li>Services</li>
    </footer>

    <section></section>
    <article></article>
    <aside></aside>



</body>

</html>
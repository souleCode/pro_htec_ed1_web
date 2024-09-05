<?php
include_once('php/functions.php');
?>
<header>
	<nav>
		<div class="container">

			<ul>
				<?php if (isset($_SESSION['nom'])): ?>
					<!-- Boutons accessibles à tous les utilisateurs -->
					<li><a href="index.php">ACCUEIL</a></li>
					<li><a href="administration.php">ADMIN</a></li>
					<li><a href="#">A PROPOS</a></li>
					<li><a href="#">CONTACT</a></li>
				<?php else : ?>
					<li><a href="index.php">ACCUEIL</a></li>
				<?php endif ?>
			</ul>
			<ul>
				<!-- Afficher différents boutons selon que l'utilisateur est connecté ou non -->
				<?php if (isset($_SESSION['nom'], $_SESSION['pwd'])): ?>
					<li><a href="logout.php">DECONNEXION</a></li>
				<?php else: ?>
					<li><a href="connexion.php">CONNEXION</a></li>
				<?php endif; ?>
			</ul>

		</div>
	</nav>
	<h1>BLOG</h1>
</header>


<div class="container main">
	<section class="content">
<?php
require_once('php/config.php');
$side_categories = $pdo->query('SELECT * FROM categories ORDER BY id DESC LIMIT 5');
// var_dump($side_categories->fetch());
// die();
$commentaires = $pdo->query('SELECT * FROM commentaires ORDER BY id DESC LIMIT 5');
?>

</section>

<section class="sidebar">

	<form method="GET" action="/">
		<input type="text" name="q" placeholder="Rechercher...">
		<input type="submit" value="OK">
	</form>


	<h4>Catégories recentes</h4>
	<ul>
		<?php while ($c = $side_categories->fetch()) { ?>
			<a href="index.php?categorie=<?= $c['slug_categorie'] ?>">
				<li><?= $c['nom'] ?></li>
			</a>
		<?php 	} ?>

	</ul>

	<h4>Commentaires récents</h4>
	<ul>

		<li>
			<?php while ($comm = $commentaires->fetch()) { ?>
				<a href="article.php?id=<?= $comm['id_article'] ?>">
					<i><?= $comm['contenu'] ?></i><br>
					- <?= $comm['nom'] ?>
				</a>
				<br><br>
			<?php } ?>
		</li>

	</ul>

</section>
<div class="clearfix"></div>
</div>

<footer>
	<div class="container">
		<p>&copy; Tous droits réservés ...</p>
	</div>
</footer>
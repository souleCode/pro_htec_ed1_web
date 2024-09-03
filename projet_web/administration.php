<?php
require_once('php/config.php');
require_once('php/functions.php');

$categories = $pdo->query('SELECT * FROM categories');
if (isset($_SESSION['cat'])) {
	$cat = securisation($_SESSION['cat']);
} else {
	$cat = "";
}



// du 03/09
$msg_article = "";
$taille_maximum = 2; //02 Mega octet
if (isset($_POST['article'])) {
	if (isset($_POST['categorie_article'], $_POST['titre'], $_POST['contenu'], $_FILES['miniature']['tmp_name'])) {
		$categorie = htmlspecialchars($_POST['categorie_article']);
		$titre = htmlspecialchars($_POST['titre']);
		$contenu = htmlspecialchars($_POST['contenu']);
		$miniature = $_FILES['miniature'];

		if (!empty($categorie) and !empty($titre) and !empty($contenu) and !empty($miniature)) {

			if (filesize($miniature['tmp_name']) <= $taille_maximum * 1000000) {

				if (exif_imagetype($miniature['tmp_name']) == 2) {

					$ins = $pdo->prepare('INSERT INTO articles(titre, categorie, contenu, date_post) VALUES (?,?,?, NOW())');
					$params = array($titre, $categorie, $contenu);
					$res = $ins->execute($params);

					if ($res) {
						$last_id = $pdo->lastInsertId();

						$chemin = 'images/miniatures/' . $last_id . '.jpg';

						$move = move_uploaded_file($miniature['tmp_name'], $chemin);

						if ($move) {
							$message_article = 'Votre article a bien été créé !';
						} else {
							$message_article = 'Une erreur est survenue durant le transfert de votre miniature';
						}
					} else {
						$message_article = 'Une erreur est survenue durant l\'ajout de votre article';
					}
				} else {
					$message_article = 'Votre miniature doit être au format JPG/jpg*/JPEG/jpeg';
				}
			} else {
				$message_article = 'Votre miniature ne peut pas dépasser ' . $taille_maximum . 'Mo';
			}
		} else {
			$message_article = 'Veuillez compléter tous les champs';
		}
	} else {
		$message_article = 'Veuillez compléter tous les champs';
	}
}

// Reg




?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Administration</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

	<?php include_once('head.php') ?>

	<h2>Administration</h2>
	<a href="php/deconnexion.php">Se déconnecter</a>

	<br><br>

	<h3>Nouvelle catégorie</h3>
	<form method="POST" action="traitement_categorie.php">
		<input type="text" name="nom" placeholder="Nom de la catégorie" required>
		<input type="hidden" name="slug" size="30" placeholder="Slug de la catégorie (dans l'url)" required>
		<input type="submit" name="categorie" value="Créer la catégorie">
	</form>


	<br><br>
	<!-- $_POST['produits']==1 -->


	<h3>Rédiger un article</h3>
	<form method="POST" enctype="multipart/form-data">
		<select name="categorie_article" required>
			<option>Vos categories</option>
			<?php while ($o = $categories->fetch(PDO::FETCH_ASSOC)) { ?>
				<option value="<?= $o['slug_categorie'] ?>" <?php if (isset($cat) && $cat == $o['slug_categorie']) {
																echo 'selected';
															} ?>><?= $o['nom'] ?> </option>
			<?php } ?>
		</select>
		<br>
		<input type="text" name="titre" <?php if (isset($titre)) {
											echo 'value=" ' . $titre . '"';
										} ?> placeholder="Titre de l'article" required>
		<br>
		<textarea name="contenu" placeholder="Contenu de l'article" style="width:80%;" required>
				<?php
				if (isset($contenu)) {
					echo $contenu;
				}
				?>

		</textarea>
		<br>
		<input type="file" name="miniature" id="miniature" required><label for="miniature">Miniature de l'article</label>
		<br>
		<input type="submit" value="Publier l'article" name="article">
	</form>
	<br><br>

	<h3>Supprimer un article</h3>
	<form method="POST">
		<input type="number" name="id_article" placeholder="ID de l'article à supprimer" required>
		<br>
		<input type="submit" name="supprimer_article" value="Supprimer l'article">
	</form>

	<?php

	if (isset($message)) {
		echo '<p>' . $message .  ' </p>';
	}

	if (isset($msg_article)) {
		echo '<p>' . $msg_article .  ' </p>';
	}


	?>

	<?php include_once 'foot.php' ?>

</body>

</html>
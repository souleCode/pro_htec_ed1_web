<?php
include_once('php/config.php');
include_once('php/functions.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
	$id = securisation($_GET['id']);
	$query = "SELECT * FROM articles WHERE id=?";
	$result = $pdo->prepare($query);
	$result->execute([$id]);

	$article = $result->fetch();
	$titre = $article['titre'];
	$date = $article['date_post'];
	$contenu = $article['contenu'];
	$categorie = getNomCategorie($article['categorie']);
}

if (isset($_GET['id'], $_POST['commentaire']) && !empty($_GET['id'])) {
	$id = $_GET['id'];
	$nom = securisation($_POST['nom']);
	$email = securisation($_POST['email']);
	$contenu = securisation($_POST['contenu']);
	if (!empty($nom) && !empty($email) && !empty($contenu)) {
		$quert_ins_comm = "INSERT INTO commentaires(id_article,nom,email,contenu) 
							VALUES (?, ?, ?, ?)";
		$params = array($id, $nom, $email, $contenu);
		$result = $pdo->prepare($quert_ins_comm);
		$res = $result->execute($params);
		if ($res) {
			$_SESSION['comment_msg'] = "Votre commentaire a bien ete ajouter";
		}
	}
}

// Affichage des comments

if ($_GET['id'] && !empty($_GET['id'])) {
	$id = $_GET['id'];
	$query_select_comm = "SELECT * FROM commentaires WHERE id_article=? ORDER BY id DESC";
	$result_comm = $pdo->prepare($query_select_comm);
	$result_comm->execute([$id]);
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>- Blog</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

	<?php include_once 'head.php' ?>

	<article>
		<img src="images/miniatures/<?= $id ?>.jpg" alt="miniature">

		<h2><?= $titre ?></h2>
		<span class="categorie"><?= $categorie ?></span> - <span class="date"><?= $date ?>:</span>

		<div class="contenu">
			<?= $contenu ?>
		</div>
	</article>

	<hr>

	<?php while ($comm = $result_comm->fetch()) { ?>
		<div>
			<p style="text-align: center;"><?= $comm['contenu'] ?> </p>
		</div>
	<?php } ?>


	<section id="commentaires" class="commentaires">
		<h2>Commentaires</h2>
		<form method="POST" action="#commentaires">
			<input type="text" name="nom" placeholder="Nom" required>
			<input type="email" name="email" placeholder="Email" required>
			<br>
			<textarea name="contenu" placeholder="Votre commentaire..." required></textarea>
			<br>
			<input type="submit" name="commentaire" value="Poster le commentaire">
		</form>


	</section>

	<?php include_once 'foot.php' ?>

</body>

</html>
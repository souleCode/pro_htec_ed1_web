<?php
include_once('php/config.php');
include_once('php/functions.php');
// var_dump($_SESSION);
if (isset($_GET['categorie']) && !empty($_GET['categorie'])) {
	$categorie = securisation($_GET['categorie']);
	$query = "SELECT * FROM articles WHERE categorie=? ORDER BY id DESC";
	$result = $pdo->prepare($query);
	$result->execute([$categorie]);
} elseif (isset($_GET['q']) && !empty($_GET['q'])) {
	// echo 'traitement de la barre de recherche';
	$q = securisation($_GET['q']);
	$query = "SELECT * FROM articles WHERE categorie LIKE ? OR titre LIKE ? OR contenu LIKE ? ORDER BY id DESC";
	$params = array("%" . $q . "%", "%" . $q . "%", "%" . $q . "%");
	$result = $pdo->prepare($query);
	$result->execute($params);
} else {
	$query = "SELECT * FROM articles ORDER BY id DESC";
	$result = $pdo->query($query);
}


?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Blog</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

	<?php include_once 'head.php' ?>

	<?php if ($result->rowCount() > 0) { ?>
		<?php while ($art = $result->fetch()) { ?>
			<div class="article">
				<div class="image-wrapper">
					<a href="#">
						<!--  -->
						<img src="images/miniatures/<?= $art['id'] ?>.jpg">
					</a>
				</div>


				<?php if (isset($_SESSION['nom'])): ?>
					<h4 style="color:red;text-align:end;">
						<a style="color:red" href="delete.php?id=<?= $art['id'] ?>">Supprimer</a>
					</h4>
				<?php endif ?>
				<h3><a href="article.php?id=<?= $art['id'] ?>"><?= $art['titre'] ?></a></h3>
				<span class="categorie"><?= getNomCategorie($art['categorie']) ?></span> - <span class="date"><?= $art['date_post'] ?></span>
				<p><?= contentTraitment($art['contenu'], 400) ?></p>
			</div>
		<?php } ?>
	<?php } else {
		echo '<div class="article">
			<h1 style="color:red;"> Pas d\'articles pour cette categorie</h1>
		</div>';
	} ?>

	<?php include_once 'foot.php' ?>

</body>

</html>
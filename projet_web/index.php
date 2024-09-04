<?php
include_once('php/config.php');
include_once('php/functions.php');
if (isset($_GET['categorie']) && !empty($_GET['categorie'])) {
	$categorie = securisation($_GET['categorie']);
	$query = "SELECT * FROM articles WHERE categorie=? ORDER BY id DESC";
	$result = $pdo->prepare($query);
	$result->execute([$categorie]);
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


	<?php while ($art = $result->fetch()) { ?>
		<?php
		if (!$art) {
			echo "<h1>PAs d'articles</h1>";
		} ?>
		<div class="article">
			<div class="image-wrapper">
				<a href="#">
					<!--  -->
					<img src="images/miniatures/<?= $art['id'] ?>.jpg">
				</a>
			</div>
			<h3><a href="article.php?id=<?= $art['id'] ?>"><?= $art['titre'] ?></a></h3>
			<span class="categorie"><?= getNomCategorie($art['categorie']) ?></span> - <span class="date"><?= $art['date_post'] ?></span>
			<p><?= contentTraitment($art['contenu'], 400) ?></p>
		</div>

	<?php } ?>




	<?php include_once 'foot.php' ?>

</body>

</html>
<?php
include_once('php/config.php');
include_once('php/functions.php');
$query = "SELECT * FROM articles ORDER BY id DESC";
$result = $pdo->query($query);


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
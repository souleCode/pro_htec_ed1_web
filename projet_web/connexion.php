<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

	<?php include_once 'includes/head.php' ?>

	<h2>Connexion</h2>
	<form method="POST">
		<input type="text" placeholder="Nom d'utilisateur" name="pseudo" required>
		<br>
		<input type="password" placeholder="Mot de passe" name="mdp" required>
		<br>
		<input type="submit" name="connexion" value="Se connecter">
	</form>


	<?php include_once 'includes/foot.php' ?>

</body>

</html>
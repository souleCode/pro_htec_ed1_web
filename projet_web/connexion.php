<?php
include_once('php/config.php');
require_once('php/functions.php');
if (isset($_POST['connexion'])) {
	$nom = $_POST['pseudo'];
	$pwd = $_POST['mdp'];
	$query = "INSERT INTO users(nom,pwd) VALUES(?,?)";
	$params = array($nom, $pwd);
	$result = $pdo->prepare($query);

	$res = $result->execute($params);
	if ($res) {
		login($nom, $pwd);
		$_SESSION['user_msg'] = "Vous etes connectés";
		header('Location:index.php');
	}
}


?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

	<?php include_once 'head.php' ?>

	<h2>Connexion</h2>
	<form method="POST">
		<input type="text" placeholder="Nom d'utilisateur" name="pseudo" required>
		<br>
		<input type="password" placeholder="Mot de passe" name="mdp" required>
		<br>
		<input type="submit" name="connexion" value="Se connecter">
	</form>


	<?php include_once 'foot.php' ?>

</body>

</html>
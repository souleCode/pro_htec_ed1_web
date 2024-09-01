<?php
include('fonction.php');
include_once('config.php');
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = securisation($_GET['id']);
    $query = "SELECT * FROM product WHERE id=?";
    $result = $pdo->prepare($query);
    $res = $result->execute([$id]);
    $product = $result->fetch();
    if ($res) {
        echo "Affiche les detailes sur le produit " . $product['title'];
    } else {
        $_SESSION['detail_msg'] = "Faites attention le produit n'\existe pas";
        header('Location:boutique.php?');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les produits en details</title>
</head>

<body>
    <h1>Voila les details sur votre produits</h1>

</body>

</html>
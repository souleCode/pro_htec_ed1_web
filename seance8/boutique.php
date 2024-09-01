<?php
include('config.php');
include('fonction.php');

$query = "SELECT * FROM product ORDER BY id DESC ";
$result = $pdo->query($query);
$result->execute();
// $result->fetch();
// var_dump($products);
// $id = $products['id'];
// $title = $products['title'];
// $content = $products['content'];
// $categorie = $products['categorie'];
// $price = $products['price'];
// $created_at = $products['created_at'];

if (isset($_SESSION['detail_msg'])) {
    $detail_msg = $_SESSION['detail_msg'];
    unset($_SESSION['detail_msg']);
}
if (isset($detail_msg) && !empty($detail_msg)) {
    echo '<div class="alert alert-danger text-center ">' . $detail_msg . '</div>';
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Les formulaires en PHP</title>
</head>




<!-- $p['image_name] -->
<!-- La difference enttre GET et POST: En post, les donnees sont pas vu en url. GET les donnees sont parser en url -->

<div class="container">
    <h1> La liste totale des produits </h1>
    <div style="height: 100px;"></div>
    <a href="pub_product.php" class="btn btn-primary">Publier un article</a>
    <div style="height: 100px;"></div>
    <div class="row">
        <?php while ($p = $result->fetch()) { ?>
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="images/miniatures/<?= $p['id'] ?>.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $p['title']  ?></h5>
                        <h6 class="card-title">Categorie:<?= $p['categorie']  ?></h6>
                        <p class="card-text">Description: <?= contentTraitment($p['content']) ?></p>
                        <div class="card-title text-danger">Prix:<?= $p['price']  ?>MAD</div>
                        <div>
                            <small class="card-text">Publié le: <?= $p['created_at']  ?></small>
                        </div>
                        <a href="details.php?id=<?= $p['id'] ?>" class="btn btn-primary">Voir+</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>





</div>

<body>

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>

</html>
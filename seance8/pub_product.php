<?php
include_once('fonction.php');
include_once('config.php');
$taille_max = 2;
if (isset($_POST['publier'])) {
    if (isset($_POST['titre'], $_POST['content'], $_POST['categorie'], $_FILES['image'])) {
        $titre = securisation($_POST['titre']);
        $content = securisation($_POST['content']);
        $categorie = securisation($_POST['categorie']);
        $price = securisation($_POST['price']);
        $miniature = $_FILES['image'];


        if (!empty($miniature) && !empty($categorie) && !empty($titre) && !empty($content)) {
            //verifie la taille de l'image
            if (filesize($miniature['tmp_name']) <= $taille_max * 1000000) {
                if (exif_imagetype($miniature['tmp_name']) == 2) {
                    //image est de type jpg ou jpeg.
                    $query = "INSERT INTO product(title,content,categorie,price,created_at)
                    VALUES(?,?,?,?,NOW())";
                    $params = array($titre, $content, $categorie, $price);
                    $result = $pdo->prepare($query);
                    $res = $result->execute($params);
                    if ($res) {
                        //move image to images/miniatures
                        $last_id = $pdo->lastInsertId();
                        $chemin = 'images/miniatures/' . $last_id . '.jpg';
                        $move = move_uploaded_file($miniature['tmp_name'], $chemin);
                        if ($move) {
                            echo '<div class="alert alert-info text-center ">Votre article a bien été crée.</div>';
                        } else {
                            echo '<div class="alert alert-warning text-center ">Une erreur est survenu lors du deplacement de l\'image.</div>';
                        }
                    } else {
                        echo '<div class="alert alert-warning text-center ">Une erreur est survenu lors de l\'insertion des donnees</div>';
                    }
                } else {
                    echo '<div class="alert alert-warning text-center ">Veuillez choisir une image de type jpg/jpeg</div>';
                }
            } else {
                echo '<div class="alert alert-warning text-center ">Donnez une image dont la taille est inferieure a' . $taille_max . 'Mo</div>';
            }
        } else {
            echo '<div class="alert alert-warning text-center ">Veuillez remplir tous les champs</div>';
        }
    } else {
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Articles</title>
</head>



<div class="container">
    <!-- La difference enttre GET et POST: En post, les donnees sont pas vu en url. GET les donnees sont parser en url -->
    <h1 style="text-align: center;"> Publie votre votre article</h1>
    <div style="height: 100px;"></div>
    <a href="boutique.php" class="btn btn-primary">Voir la boutique</a>
    <div style="height: 100px;"></div>
    <form method="POST" enctype="multipart/form-data" action="">
        <div class="mb-3">
            <label for="" class="form-label">Titre</label>
            <input type="text" name="titre" class="form-control" required>

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <textarea type="text" name="content" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Categorie</label>
            <input type="text" name="categorie" class="form-control" required>

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Le prix du produit</label>
            <input type="text" name="price" class="form-control" required>

        </div>
        <div class="mb-3">
            <!-- <label for="" class="form-label">Ajouter une image de l'article</label> -->
            <input type="file" name="image" id="miniature" required>
            <label for="miniature">Ajouter une image de l'article</label>
        </div>

        <button type="submit" name="publier" class="btn btn-primary">Publier</button>
    </form>



</div>
</div>

<body>

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>
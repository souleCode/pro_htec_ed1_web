<?php
include_once('php/config.php');
include_once('php/functions.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM articles WHERE id=?";
    $result = $pdo->prepare($query);
    $res = $result->execute([$id]);
    if ($res) {
        header("Location:index.php");
    } else {
        header("Location:index.php");
    }
}

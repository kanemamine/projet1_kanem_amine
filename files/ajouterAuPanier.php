<?php
session_start();

if(isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];

    // Créer une structure de panier si elle n'existe pas
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Ajouter le produit au panier
    $_SESSION['cart'][] = array(
        'id' => $productId,
        'name' => $productName,
        'price' => $productPrice
    );

    header('Location: produits.php');
}
?>
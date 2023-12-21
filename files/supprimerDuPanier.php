<?php
session_start();

// Fonction pour supprimer un produit du panier
function removeProductFromCart($productId) {
    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $product) {
            if ($product['id'] == $productId) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }
    }
}

// Vérifier si un produit doit être supprimé du panier
if (isset($_GET['productId'])) {
    $productId = $_GET['productId'];
    removeProductFromCart($productId);
    header('Location: panier.php');
    exit;
} else {
    // Rediriger vers la page du panier si aucun productId n'est spécifié
    header('Location: panier.php');
    exit;
}
?>
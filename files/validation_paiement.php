
<?php
session_start();
require_once 'connexion.php'; // Assurez-vous d'inclure le fichier de connexion à la base de données

// Récupérez les informations du formulaire POST
$total = isset($_POST['total']) ? $_POST['total'] : 0;
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : null;

// Enregistrez les informations de la transaction dans la base de données
$date = date('Y-m-d H:i:s'); // Utilisez la date actuelle
$insertOrderQuery = "INSERT INTO user_order (ref, date, total, user_id) VALUES ('', '$date', '$total', '$user_id')";
mysqli_query($conn, $insertOrderQuery);

// Récupérez l'ID de la commande que vous venez d'insérer
$orderId = mysqli_insert_id($conn);

// Parcourez le panier et enregistrez les produits dans la table order_has_product
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $product) {
        $productId = $product['id'];
        $quantity = $product['quantity'];
        $price = $product['price'];

        $insertOrderProductQuery = "INSERT INTO order_has_product (order_id, product_id, quantity, price) VALUES ('$orderId', '$productId', '$quantity', '$price')";
        mysqli_query($conn, $insertOrderProductQuery);
    }
}

// Effacez le panier après la transaction
unset($_SESSION['cart']);

// Redirigez l'utilisateur vers la page de confirmation de commande
header('Location: produits.php?id=' . $orderId);

mysqli_close($conn);
?>
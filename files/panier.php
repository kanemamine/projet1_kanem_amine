<?php
session_start();

// Fonction pour mettre à jour la quantité d'un produit dans le panier
function updateQuantityInCart($productId, $quantity) {
    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as &$product) {
            if ($product['id'] == $productId) {
                $product['quantity'] = $quantity;
                break;
            }
        }
    }
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["productId"]) && isset($_POST["quantity"])) {
    $productId = $_POST["productId"];
    $quantity = $_POST["quantity"];

    // Mettre à jour la quantité dans le panier
    updateQuantityInCart($productId, $quantity);
    header('Location: panier.php');
    exit;
}

// Afficher le panier
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    echo "<h2>Votre Panier :</h2>";

    $total = 0;

    foreach($_SESSION['cart'] as $product) {
        // Vérifier si la quantité existe, sinon, la définir à 1
        $quantity = isset($product['quantity']) ? $product['quantity'] : 1;

        $subtotal = $product['price'] * $quantity;
        $total += $subtotal;

        echo "<form method='POST'>";
        echo "<p>Produit : {$product['name']} | Prix unitaire : {$product['price']} € | Quantité : ";
        echo "<input type='number' min='1' name='quantity' value='{$quantity}'>";
        echo "<input type='hidden' name='productId' value='{$product['id']}'>";
        echo "<input type='submit' value='Modifier'>";
        echo " | Sous-total : {$subtotal} € | <a href='supprimerDuPanier.php?productId={$product['id']}'>Supprimer</a></p>";
        echo "</form>";
    }

    
    $_SESSION['total'] = $total;
    $_SESSION['user_id'] = $_SESSION['user_id'];
    $_SESSION['email'] = $_SESSION['email'];
    
    // chaque produit avec son prix et sa quantité

    

    echo "<p>Total : {$total} €</p>";
    // echo '<a href="../paypage/index.php?total=' . $total . '">Payer</a>';
    echo '<a href="paiement.php?total=' . $total . '">Payer</a>';

} else {
    echo "<p>Le panier est vide.</p>";
}
?>
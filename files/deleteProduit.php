<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];

    $conn = mysqli_connect("localhost", "root", "root", "amine_bdd");
    $query = "DELETE FROM product WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $productId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    header('location: adminProduits.php');
    exit;
  }
}
?>
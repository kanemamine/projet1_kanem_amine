<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Include the necessary files
    include '../includes/dB.php';  // Make sure to include the database connection file
    include '../includes/head.php';

    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['email'])) {
        header('location: index.php');
        exit;
    }

    // Treatment of the product addition form
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addProduct"])) {
        // Retrieve form data
        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];

        // Manage image upload
        $uploadDir = '../images/';  // Destination folder
        $uploadFile = $uploadDir . basename($_FILES['productImage']['name']);  // Full file path

        if (move_uploaded_file($_FILES['productImage']['tmp_name'], $uploadFile)) {
            // Successful upload, get the image URL
            $img_url = '../images/' . basename($_FILES['productImage']['name']);

            // Prepare the insertion query
            $query = "INSERT INTO product (name, description, price, quantity, img_url) VALUES (?, ?, ?, ?, ?)";
            $stmt = $bdd->prepare($query);

            // Bind parameters
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $description);
            $stmt->bindParam(3, $price);
            $stmt->bindParam(4, $quantity);
            $stmt->bindParam(5, $img_url);

            // Execute the insertion query
            if ($stmt->execute()) {
                header('location: adminProduits.php');
            } else {
                echo "Error adding the product.";
            }
        }
    } else {
        echo "Error uploading the image.";
    }
?>

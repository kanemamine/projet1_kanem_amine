<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include '../includes/dB.php';
    include '../includes/head.php';

    session_start();

    if (!isset($_SESSION['email'])) {
        header('location: index.php');
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addProduct"])) {

        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];

        $uploadDir = '../images/'; 
        $uploadFile = $uploadDir . basename($_FILES['productImage']['name']);

        if (move_uploaded_file($_FILES['productImage']['tmp_name'], $uploadFile)) {

            $img_url = '../images/' . basename($_FILES['productImage']['name']);
            $query = "INSERT INTO product (name, description, price, quantity, img_url) VALUES (?, ?, ?, ?, ?)";
        
            if ($stmt = mysqli_prepare($conn, $query)) {
                mysqli_stmt_bind_param(
                    $stmt,
                    "sidss",
                    $name,
                    $description,
                    $price,
                    $quantity,
                    $img_url

                );
        
                $result = mysqli_stmt_execute($stmt);
                echo mysqli_error($conn);
            }
        }
        header('location: adminProduits.php');
    } else {
        echo "Error uploading the image.";
    }
?>

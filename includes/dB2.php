?>

<?php
$server = 'localhost';
$userName = "root";
$pwd = "";
$db = "ecom1_project";

$conn = mysqli_connect($server, $userName, $pwd, $db);
if ($conn) {

    global $conn;
} else {
    echo "Error : Not connected to the $db database";
}
?>
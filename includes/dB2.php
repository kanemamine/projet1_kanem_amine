?>

<?php
$server = 'localhost';
$userName = "root";
$pwd = "root";
$db = "amine_bdd";

$conn = mysqli_connect($server, $userName, $pwd, $db);
if ($conn) {

    global $conn;
} else {
    echo "Error : Not connected to the $db database";
}
?>
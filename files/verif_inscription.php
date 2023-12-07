<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// include '../includes/config.php';
if(isset($_POST['email']) && !empty($_POST['email'])){
	setcookie('email', $_POST['email'], time() + 24 * 60 * 60);
}

if(empty($_POST['email']) || empty($_POST['user_name']) || empty($_POST['pwd']) || empty($_POST['fname']) || empty($_POST['lname'])){
	header('location: inscription.php?message=Vous devez remplir tous les champs.');
	exit;
}

include('../includes/dB.php');

$q = 'SELECT user_name FROM user';
$req = $bdd->prepare($q);
$req->execute();


$results = $req->fetchAll();

foreach ($results as $result) {
    if ($result['user_name'] == $_POST['user_name']) {
        header('location: inscription.php?message=Nom d\'utilisateur déjà utilisé.');
        exit;
    }
}


if((strlen($_POST['user_name']) < 8) && strlen($_POST['user_name']) > 20){
	header('location: inscription.php?message=Le nom d\'utilisateur doit faire au moins 8 caractères.');
	exit;
}

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	header('location: inscription.php?message=Email invalide.');
	exit;
}

if(strlen($_POST['pwd']) < 8){
	header('location: inscription.php?message=Le mot de passe doit faire au moins 8 caractères.');
	exit;
}

$role_id = 1; // 1 = user / 2 = admin

include('../includes/dB.php'); 

$q = 'SELECT id FROM user WHERE email = ?';
$req = $bdd->prepare($q);
$req->execute([$_POST['email']]);

$results = $req->fetchAll(); 

if(count($results) != 0){
	header('location: inscription.php?message=Cet email est déjà utilisé.');
	exit;
}

$q = 'INSERT INTO user (user_name, email, pwd, fname, lname, billing_address_id, shipping_address_id, token, role_id) VALUES  (:user_name, :email, :pwd, :fname, :lname, 1, 1, "123", :role_id)';
$req = $bdd->prepare($q);
$result = $req->execute([
	'fname' => $_POST['fname'],
	'lname' => $_POST['lname'],
	'email' => $_POST['email'],
	'user_name' => $_POST['user_name'],
	'pwd' => hash('sha512', $_POST['pwd']),
	'role_id' => $role_id
]);

if($result){
	header('location: connexion.php?message=Compte créé avec succès');
	exit;
}
else{
	header('location: inscription.php?message=Erreur lors de l\'inscription.');
	exit;
}


?>
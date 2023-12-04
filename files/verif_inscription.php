<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// include '../includes/config.php';
if(isset($_POST['email']) && !empty($_POST['email'])){
	setcookie('email', $_POST['email'], time() + 24 * 60 * 60);
}

if(empty($_POST['email']) || empty($_POST['user_name']) || empty($_POST['pwd1']) || empty($_POST['pwd2']) || empty($_POST['fname']) || empty($_POST['lname'])){
	header('location: inscription.php?message=Vous devez remplir tous les champs.');
	exit;
}

if((strlen($_POST['user_name']) < 8) && strlen($_POST['user_name']) > 20){
	header('location: inscription.php?message=Le mot de passe doit faire au moins 8 caractères.');
	exit;
}

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	header('location: inscription.php?message=Email invalide.');
	exit;
}

if(strlen($_POST['pwd1']) < 8){
	header('location: inscription.php?message=Le mot de passe doit faire au moins 8 caractères.');
	exit;
}

if($_POST['pwd1'] != $_POST['pwd2']){
	header('location: inscription.php?message=Veuillez saisir un mot de passe identique pour les 2 champs.');
	exit;
}

$user_role = 1; // 1 = user / 2 = admin

include('../includes/dB.php'); 

$q = 'SELECT id FROM user WHERE email = ?';
$req = $bdd->prepare($q);
$req->execute([$_POST['email']]);

$results = $req->fetchAll(); 

if(count($results) != 0){
	header('location: inscription.php?message=Cet email est déjà utilisé.');
	exit;
}

$q = 'INSERT INTO user (user_name, email, pwd1, fname, lname, billing_address_id, shipping_address_id, token, user_role, pwd2) VALUES  (:user_name, :email, :pwd1, :fname, :lname, 1, 1, "123", :user_role, :pwd2)';
$req = $bdd->prepare($q);
$result = $req->execute([
	'fname' => $_POST['fname'],
	'lname' => $_POST['lname'],
	'email' => $_POST['email'],
	'user_name' => $_POST['user_name'],
	'pwd1' => hash('sha512', $_POST['pwd1']),
	'pwd2' => hash('sha512', $_POST['pwd2']),
	'user_role' => $user_role
]);


// $empreinte = hash('sha512', $mdp);
// $salt = 'hdiufyzq!qitèçdkfgdzifg';
// $empreinteSalee = hash('sha512', $salt . $mdp);


if($result){
	header('location: connexion.php?message=Compte créé avec succès');
	exit;
}
else{
	header('location: inscription.php?message=Erreur lors de l\'inscription.');
	exit;
}


?>
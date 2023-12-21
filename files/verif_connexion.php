<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


	if(isset($_POST['email']) && !empty($_POST['email'])){
		setcookie('email', $_POST['email'], time() + 24 * 60 * 60);
	}

	if(empty($_POST['email']) || empty(htmlspecialchars($_POST['pwd']))){
		header('location: connexion.php?message=Vous devez remplir les 2 champs'); 
		exit;
	}


	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		header('location: connexion.php?message=Email invalide');
		exit;
	}

	include('../includes/dB.php'); 

	$q = 'SELECT id FROM user WHERE email = :email AND pwd = :pwd';
	$req = $bdd->prepare($q);
	$req->execute([
					'email' => $_POST['email'],
					'pwd' => hash('sha512', $_POST['pwd'])
				]);
	$results = $req->fetchAll(); 

	if(count($results) == 0){
		header('location: connexion.php?message=Identifiants incorrects'); 
		exit;
	}
	session_start();
	$_SESSION['email'] = $_POST['email'];

	//on récupère le status de l'utilisateur
	$q = 'SELECT role_id FROM user WHERE email = :email';
	$req = $bdd->prepare($q);
	$req->execute([
		'email' => $_POST['email']
	]);
	$userRoleId = $req->fetchColumn();

	// Vérification du rôle
	if ($userRoleId == 1) {
		header('location: index_user.php');
		exit;
	} elseif ($userRoleId == 3) {
		header('location: adminUsers.php');
		exit;
	}elseif ($userRoleId == 2) {
		header('location: administrateur.php');
		exit;
	} else {
		// Rôle non reconnu, gestion d'erreur ou redirection vers une page par défaut
		header('location: erreur.php');
		exit;
	}
?>

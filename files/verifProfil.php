<?php
session_start();
include 'includes/userInfo.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    header('location: editProfil.php?message=Email invalide'); 
    exit;
}

$prenom = htmlspecialchars($_POST['fname']);
$nom = htmlspecialchars($_POST['lname']);
$email = htmlspecialchars($_POST['email']);
$phone = intval($_POST['phone']); 
$adresse = htmlspecialchars($_POST['adresse']);
$username = htmlspecialchars($_POST['user_name']);

include '../includes/dB.php';

$q = 'SELECT id FROM user WHERE email = ?';
$req = $bdd->prepare($q);
$req->execute([$_SESSION['email']]);

$results = $req->fetchAll();
$id = $results[0]['id']; 

if($_POST['email'] == $_SESSION['email']){
    $update = 'UPDATE user SET fname= :prenom, lname= :nom, email= :email, phone= :phone, adresse= :adresse, user_name= :username WHERE email= :email';

    $send = $bdd->prepare($update);
    $send->execute(array(':prenom'=>$prenom, ':nom'=>$nom,'email'=>$email, ':phone'=>$phone, ':adresse'=>$adresse, ':username'=>$username));
    $_SESSION['email'] = $email;
    header('location: profil.php?message=Informations modifiés avec succès');
    exit;
}

if($_POST['email'] != $_SESSION['email']){

    $q = 'SELECT id FROM user WHERE email = ?';
    $req = $bdd->prepare($q);
    $req->execute([$_POST['email']]);

    $results = $req->fetchAll();

    if(count($results) != 0){
        header('location: verifProfil.php?message=Cet email est déjà utilisé.');
        exit;
    }

    $update = 'UPDATE user SET fname= :prenom, lname= :nom, email= :email, phone= :phone, adresse= :adresse, user_name= :username WHERE id= :id';

    $send = $bdd->prepare($update);
    $send->execute(array(':id'=>$id[0]['id'], ':prenom'=>$prenom, ':nom'=>$nom,'email'=>$email, ':phone'=>$phone, ':adresse'=>$adresse, ':username'=>$username));
    $_SESSION['email'] = $email;
    header('location: profil.php?message=Informations modifiés avec succès');
    exit;
}


?>
<?php
include('dB.php');

$userInfSelect = 'SELECT id, fname, lname, email, role_id, user_name FROM user WHERE email = :email';
$req = $bdd->prepare($userInfSelect);
$req->execute([
    'email' => $_SESSION['email']
]);
$userInfo = $req->fetchAll();

if (count($userInfo) === 0) {
    exit;
}

$role = $userInfo[0]['role_id'];

$userSelect = 'SELECT id, fname, lname, email, role_id, user_name FROM user';
$userReq = $bdd->prepare($userSelect);
$userReq->execute();
$allUsers = $userReq->fetchAll();

$idReq = $bdd->prepare('SELECT id FROM user WHERE email = :email LIMIT 1');
$idReq->execute([
    'email' => $_SESSION['email']
]);
$idUser = $idReq->fetchColumn();
?>

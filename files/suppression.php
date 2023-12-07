<!-- supprimer le profil -->
<?php

session_start();

include '../includes/dB.php';

$idReq = $bdd->prepare('SELECT id FROM user WHERE email = :email LIMIT 1');
$idReq->execute([
    'email' => $_SESSION['email']
]);
$idUser = $idReq->fetchAll();

$delete = 'DELETE FROM user WHERE id = :id';
$send = $bdd->prepare($delete);
$send->execute([
    ':id' => $idUser[0]['id']
]);

session_destroy();

header('location: index.php');
exit;

?>
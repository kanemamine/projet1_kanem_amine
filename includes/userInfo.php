<?php

include('dB.php');
$userInfSelect = 'SELECT id, fname, lname, email, user_role, user_name, adresse, phone FROM user WHERE email = :email';
$req = $bdd->prepare($userInfSelect);
$req->execute([
        'email' => $_SESSION['email']
]);
    $userInfo = $req->fetchAll(); 

    $role = $userInfo[0]['user_role'];

    $userSelect = 'SELECT id, fname, lname, email, user_role, user_name, adresse, phone FROM user';
    $userReq = $bdd->prepare($userSelect);
    $userReq->execute();

    $user = $userReq->fetchAll(); 

    $idReq = $bdd->prepare('SELECT id FROM user WHERE email = :email LIMIT 1');
    $idReq->execute([
        'email' => $_SESSION['email']
    ]); 
    $idUser = $idReq->fetchAll(); 
?>

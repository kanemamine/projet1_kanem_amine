<?php

try{
    $bdd = new PDO('mysql:host=localhost;port=3306;dbname=amine_bdd; charset=utf8', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch(Exception $e){
  die('Erreur : ' . $e->getMessage());
}

?>
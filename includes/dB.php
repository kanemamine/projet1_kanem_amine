<?php

try{
    $bdd = new PDO('mysql:host=localhost;port=3306;dbname=ecom1_project; charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch(Exception $e){
  die('Erreur : ' . $e->getMessage());
}


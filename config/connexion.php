<?php
try{
    $db= new PDO("mysql:host=localhost; dbname=gestion_stock",'root','');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    echo 'Erreur :'.$e->getMessage();
}
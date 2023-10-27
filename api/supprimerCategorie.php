<?php
// Fait appel au fichier de connexion à la base de données
include_once __DIR__ . "/../config/connect.php";

if (isset($_POST["numeroCategorie"])){
    $numeroCategorie = $_POST["numeroCategorie"];
    $stmt = $conn->prepare("DELETE FROM Categories WHERE CategoryID = :numeroCategorie");
  // Ajoutez des % autour de la valeur de recherche
    $stmt->bindParam(':numeroCategorie', $numeroCategorie);
    $res=$stmt->execute();
    if ($res){
        
        echo json_encode("la categorie est supprimer avec succes");
    }

    
}


?>
<?php
// Fait appel au fichier de connexion à la base de données
include_once __DIR__ . "/../config/connect.php";

if (isset($_POST["numeroProduit"])){
    $numeroProduit = $_POST["numeroProduit"];
    $stmt = $conn->prepare("DELETE FROM Products WHERE ProductID = :nomProduit");
  // Ajoutez des % autour de la valeur de recherche
    $stmt->bindParam(':nomProduit', $numeroProduit);
    $res=$stmt->execute();
    if ($res){
        echo json_encode("le produit est supprimer avec succes");
    }

    
}


?>
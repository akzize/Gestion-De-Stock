<?php

// Fait appel au fichier de connexion à la base de données
include_once __DIR__ . "/../config/connect.php";

// S'assurer que le button ajouter est deja cliquer
// $action = $_POST["action"];

// Récupère les info  de de produit en utilisant la variable superglobale POST


if (isset($_POST["nomProduit"])){
    $nomProduit = $_POST["nomProduit"];
    $stmt = $conn->prepare("SELECT * FROM Products WHERE Name LIKE :nomProduit");
    $nomProduit = '%' . $nomProduit . '%';  // Ajoutez des % autour de la valeur de recherche
    $stmt->bindParam(':nomProduit', $nomProduit);
    
}
elseif(isset($_POST['idCategorie'])){
    $nomCategorie=$_POST['idCategorie'];
    $stmt = $conn->prepare("SELECT * FROM Products WHERE CategoryID=:nomCategorie");
    // $nomCategorie = '%' . $nomCategorie . '%';  // Ajoutez des % autour de la valeur de recherche
    $stmt->bindParam(':nomCategorie', $nomCategorie);



}


$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (count($result)){

    echo json_encode($result);
}
else{
    echo json_encode("aucun produit trouver");
}

?>
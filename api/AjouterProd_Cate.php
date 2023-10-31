<?php
// Fait appel au fichier de connexion à la base de données
include_once __DIR__ . "/../config/connect.php";

// S'assurer que le button ajouter est deja cliquer
$action = $_POST["action"];

// Récupère les info  de catégorie en utilisant la variable superglobale POST


if (isset($action) && $action == "Ajouter") {


    if (isset($_POST["nameCategorie"])) {

        $nomCategorie = $_POST["nameCategorie"];

        $idCategorie = $_POST['idCategorie'];

        // Prépare la requête SQL avec un paramètre à lier
        $stmt = $conn->prepare("INSERT INTO Categories (CategoryID,CategoryName) VALUES(?,?)");

        // Lie la valeur de $nomCategorie au paramètre de la requête

        $stmt->bindParam(1, $idCategorie); // il doit supprimer ce param si le champ idCategorie autoIncrementer
        $stmt->bindParam(2, $nomCategorie);


        if ($stmt->execute()) {
            echo json_encode("la categorie est insérée avec succès.");
        } else {
            echo json_encode("Erreur lors de l'insertion de la catégorie : " . $stmt->errorInfo()[2]);
        }
    } else {
        // Récupère les info  de produit en utilisant la variable superglobale POST
        $nomProduit = $_POST['Name'];
        $descProduit = $_POST['Description'];
        $prixProduit = $_POST['Price'];
        $idCategorie = $_POST['CategoryID'];

        // Prépare la requête SQL avec un paramètre à lier
        $stmt = $conn->prepare("INSERT INTO Products (`ProductID`,`Name`,`Description`,Price,CategoryID,`image`) VALUES(?,?,?,?,?,?)");


        // le code pour placer l'image dans le dossier images
        $uploads_dir = '/images';
        $tmp_name = $_FILES["imageProduit"]["tmp_name"];
        $nameImage = $_FILES["imageProduit"]["name"];
        move_uploaded_file($tmp_name, "$uploads_dir/$nameImage");

        $stmt->bindParam(1, $idProduit);
        $stmt->bindParam(2, $nomProduit);
        $stmt->bindParam(3, $descProduit);
        $stmt->bindParam(4, $prixProduit);
        $stmt->bindParam(5, $idCategorie);
        $stmt->bindParam(6, $nameImage);



        if ($stmt->execute()) {
            echo json_encode("le produit est insérée avec succès.");
        } else {
            echo json_encode("Erreur lors de l'insertion du produit : " . $stmt->errorInfo()[2]);
        }
    }
}
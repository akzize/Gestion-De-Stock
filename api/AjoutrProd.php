<?php
// Fait appel au fichier de connexion à la base de données
include_once __DIR__ . "/../config/connect.php";

// S'assurer que le button ajouter est deja cliquer
$action = $_POST["action"];

// Récupère les info  de catégorie en utilisant la variable superglobale POST
$nomCategorie = $_POST["nameCategorie"];

$idCategorie = $_POST['idCategorie'];

if (isset($action) && $action == "Ajouter") {

    if (isset($nomCategorie)) {

        // Prépare la requête SQL avec un paramètre à lier
        $stmt = $conn->prepare("INSERT INTO Categories (CategoryID,CategoryName) VALUES(?,?)");

        // Lie la valeur de $nomCategorie au paramètre de la requête

        $stmt->bindParam(1, $idCategorie); // il doit supprimer ce param si le champ idCategorie autoIncrementer
        $stmt->bindParam(2, $nomCategorie);


        if ($stmt->execute()) {
            echo "la categorie est insérée avec succès.";
        } else {
            echo "Erreur lors de l'insertion de la catégorie : " . $stmt->errorInfo()[2];
        }
    } else {
        // Récupère les info  de produit en utilisant la variable superglobale POST



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
            echo "le produit est insérée avec succès.";
        } else {
            echo "Erreur lors de l'insertion du produit : " . $stmt->errorInfo()[2];
        }
    }
}















// 

// // Lie la valeur de $nomCategorie au paramètre de la requête

// $stmt->bindParam(1,$idCategorie);
// $stmt->bindParam(2,$nomCategorie);

// Récupère les info  de produit en utilisant la variable superglobale POST
// $nomProduit = $_GET['nomProduit'];
// $idProduit = $_GET['idProduit'];
// $descProduit = $_GET['descProduit'];
// $prixProduit = $_GET['prixProduit'];
// $imageProduit = $_GET['imageProduit'];
// $nomProduit=$_FILES['imageProduit']['name'];
// $nomProduit=$_FILES['imageProduit']['tempnaame'];

// $stmt1 = $conn->prepare("INSERT INTO Products (`ProductID`,`Name`,`Description`,Price,CategoryID,`image`) VALUES(?,?,?,?,?,?)");



// le code pour placer l'image dans le dossier imags

// $uploads_dir = '/images';

// $tmp_name = $_FILES["imageProduit"]["tmp_name"];
// $nameImage = $_FILES["imageProduit"]["name"];
// move_uploaded_file($tmp_name, "$uploads_dir/$nameImage");



// Lie la valeur de $nomCategorie au paramètre de la requête

// $stmt1->bindParam(1, $idProduit);
// $stmt1->bindParam(2, $nomProduit);
// $stmt1->bindParam(3, $descProduit);
// $stmt1->bindParam(4, $prixProduit);
// $stmt1->bindParam(5, $idCategorie);
// $stmt1->bindParam(6, $nameImage);






// if ($stmt1->execute()) {
//     echo "le produit est insérée avec succès.";
// } else {
//     echo "Erreur lors de l'insertion de la catégorie : " . $stmt1->errorInfo()[2];
// }



// le code pour placer l'image dans le dossier imags

// $uploads_dir = '/images';
// foreach ($_FILES["imageProduit"]["error"] as $key => $error) {
//     if ($error == UPLOAD_ERR_OK) {
//         $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
//         // basename() may prevent filesystem traversal attacks;
//         // further validation/sanitation of the filename may be appropriate
//         $name = basename($_FILES["pictures"]["name"][$key]);
//         move_uploaded_file($tmp_name, "$uploads_dir/$name");
//     }
// }


// Exécute la requête

// if ($stmt->execute()) {
//     echo "Catégorie insérée avec succès.";
// } else {
//     echo "Erreur lors de l'insertion de la catégorie : " . $stmt->errorInfo()[2];
// }

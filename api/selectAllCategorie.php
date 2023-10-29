<?php
// Fait appel au fichier de connexion à la base de données
include_once __DIR__ . "/../config/connect.php";

$stmt = $conn->prepare("SELECT * FROM Categories ");

$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (count($result)){

    echo json_encode($result);
}
else{
    echo json_encode("aucun categorie trouver");
}


?>
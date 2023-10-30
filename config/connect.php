<?php
$username = "root";
$password = "rootpass";

try {
  $conn = new PDO("mysql:host=localhost;dbname=gestion_stock", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
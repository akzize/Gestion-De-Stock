<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/Logo.png" type="image/x-icon" />

    <!-- styles -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <main>
        <a class="btn btn-outline-danger" href="./config/logout.php" name="logout">Se deconnecter</a>
        <p>test jira</p>
        zorp dfgfghjjgu swfewfdwe
    </main>
    <!-- js -->
    <script src="assets/js/app.js"></script>
</body>

</html>
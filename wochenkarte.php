<?php
session_start();
require_once 'CookieHelper.php';
require_once 'User.php';

if (!CookieHelper::isCookieSet('allowed') || !User::isLoggedIn()) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Wochenkarte</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Styling für die Menüanzeige */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .menu-item {
            text-align: center;
        }
        .menu-item img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
    </style>
</head>
<body class="container">
    <h1 class="text-center mt-5">Wochenkarte</h1>

    <div class="menu-grid mt-5">
        <!-- Bilder und Beschriftungen für jeden Tag -->
        <div class="menu-item">
            <img src="bilder/1.jpg" alt="Montag">
            <p>Montag</p>
        </div>
        <div class="menu-item">
            <img src="bilder/2.jpeg" alt="Dienstag">
            <p>Dienstag</p>
        </div>
        <div class="menu-item">
            <img src="bilder/3.jpg" alt="Mittwoch">
            <p>Mittwoch</p>
        </div>
        <div class="menu-item">
            <img src="bilder/4.jpg" alt="Donnerstag">
            <p>Donnerstag</p>
        </div>
        <div class="menu-item">
            <img src="bilder/5.jpg" alt="Freitag">
            <p>Freitag</p>
        </div>
        <div class="menu-item">
            <p>Samstag<br>Ruhetag</p>
        </div>
    </div>
    
    <a href="logout.php" class="btn btn-link mt-4">Logout</a>
</body>
</html>

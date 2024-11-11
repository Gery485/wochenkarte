<?php
session_start();
require_once 'classes/CookieHelper.php';
require_once 'classes/User.php';

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
</head>
<body class="container">
    <h1>Aktuelle Tagesmenüs</h1>
    <!-- Hier können Tagesmenüs für die einzelnen Wochentage angezeigt werden -->
    <p>Montag: Rührei mit Speck</p>
    <p>Dienstag: Pfannkuchen</p>
    <p>...</p>
    <a href="logout.php" class="btn btn-danger">Logout</a>
</body>
</html>

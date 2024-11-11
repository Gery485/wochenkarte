<?php
// Start der Session
session_start();
require_once 'classes/CookieHelper.php';
require_once 'classes/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accept_cookies'])) {
        CookieHelper::setCookie('allowed', 'true');
    } elseif (isset($_POST['email']) && isset($_POST['password'])) {
        $user = User::get($_POST['email'], $_POST['password']);
        if ($user && $user->login()) {
            header("Location: wochenkarte.php");
            exit();
        } else {
            $error = "Ungültige Anmeldedaten.";
        }
    }
}

$isCookieAllowed = CookieHelper::isCookieSet('allowed');
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Anmeldung</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container">
    <h1>Anmeldung zur Wochenkarte</h1>

    <?php if (!$isCookieAllowed): ?>
        <form method="post">
            <p>Bitte akzeptieren Sie unsere Cookie-Richtlinien, um fortzufahren.</p>
            <button type="submit" name="accept_cookies" class="btn btn-primary">Cookies akzeptieren</button>
        </form>
    <?php else: ?>
        <form method="post">
            <div class="form-group">
                <label for="email">E-Mail-Adresse:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Passwort:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Anmelden</button>
            <?php if (isset($error)): ?>
                <p class="text-danger"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
        </form>
    <?php endif; ?>
</body>
</html>

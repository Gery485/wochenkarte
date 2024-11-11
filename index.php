<?php
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
            $error = "Zugangsdaten ungültig";
        }
    }
}

$isCookieAllowed = CookieHelper::isCookieSet('allowed');
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Wochenkarte Anmeldung</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Zusätzliche Stile für das Design gemäß den Mockups */
        .container {
            max-width: 400px;
            margin-top: 50px;
        }
        .btn-custom {
            background-color: #FFAA00;
            color: white;
        }
        .btn-custom:hover {
            background-color: #FF8800;
        }
        .error-message {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body class="container text-center">
    <h1 class="mt-5">Wochenkarte</h1>

    <?php if (!$isCookieAllowed): ?>
        <!-- Cookie-Banner -->
        <div class="mt-5">
            <p>Willkommen</p>
            <p class="text-muted">Diese Website verwendet Cookies.</p>
            <form method="post">
                <button type="submit" name="accept_cookies" class="btn btn-custom">Akzeptieren</button>
            </form>
        </div>
    <?php else: ?>
        <!-- Login-Formular -->
        <form method="post" class="mt-5">
            <h2>Bitte anmelden</h2>
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="E-Mail-Adresse" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Passwort" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Anmelden</button>
            <?php if (isset($error)): ?>
                <p class="error-message mt-2"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
        </form>
    <?php endif; ?>
</body>
</html>

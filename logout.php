<?php
session_start();
require_once 'classes/CookieHelper.php';
require_once 'classes/User.php';

if (!CookieHelper::isCookieSet('allowed')) {
    header("Location: index.php");
    exit();
}

User::logout();
header("Location: index.php");
exit();
?>

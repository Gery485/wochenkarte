<?php
// File: classes/CookieHelper.php

class CookieHelper {
    // Prüft, ob ein bestimmtes Cookie gesetzt ist
    public static function isCookieSet($cookieName) {
        return isset($_COOKIE[$cookieName]);
    }

    // Setzt ein Cookie mit einem bestimmten Namen und Wert
    public static function setCookie($cookieName, $value, $expiration = 3600) {
        setcookie($cookieName, $value, time() + $expiration, "/");
    }
}
?>

<?php
// File: classes/User.php

class User {
    private $email;
    private $password;
    private $errors = [];

    // Beispielhafte Zugangsdaten für den Prototyp
    const VALID_EMAIL = 'sophie.nemes05@gmail.com';
    const VALID_PASSWORD = '123';

    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function validate() {
        // E-Mail Validierung
        if (strlen($this->email) < 5 || strlen($this->email) > 30) {
            $this->errors[] = "E-Mail muss zwischen 5 und 30 Zeichen lang sein.";
        }

        // Passwort Validierung
        if (strlen($this->password) < 5 || strlen($this->password) > 20) {
            $this->errors[] = "Passwort muss zwischen 5 und 20 Zeichen lang sein.";
        }

        return empty($this->errors);
    }

    public static function get($email, $password) {
        if ($email === self::VALID_EMAIL && $password === self::VALID_PASSWORD) {
            return new self($email, $password);
        }
        return null;
    }

    public function login() {
        if ($this->email === self::VALID_EMAIL && $this->password === self::VALID_PASSWORD) {
            $_SESSION['loggedin'] = true;
            return true;
        }
        return false;
    }

    public static function logout() {
        session_destroy();
    }

    public static function isLoggedIn() {
        return isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
    }

    public function getErrors() {
        return $this->errors;
    }
}
?>

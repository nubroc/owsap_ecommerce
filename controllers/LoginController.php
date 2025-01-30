<?php
require_once 'models/User.php';

class AuthController {
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];

            $userModel = new User();
            $user = $userModel->login($email, $password);

            if ($user) {
                $_SESSION["user"] = $user["email"];
                header("Location: index.php?page=home");
                exit();
            } else {
                $error = "Email ou mot de passe incorrect";
                require "views/login.php";
            }
        } else {
            require "views/login.php";
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?page=login");
        exit();
    }
}
?>

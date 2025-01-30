<?php

require_once 'models/User.php';

class LoginController {
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $email = $_POST["email"] ?? null;
            $password = $_POST["password"] ?? null;
    
            if (empty($email) || empty($password)) {
                echo "Veuillez remplir tous les champs.";
                return;
            }
    
            $userModel = new User();
            $user = $userModel->Login($email, $password);
    
            if ($user) {

                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];

                header("Location: index.php?page=home");
                exit();
            } else {

                $error_message = "Identifiants incorrects.";
            }
        }
    
        require "views/login.php";
    }
    
    }
?>

<?php

require_once 'models/User.php';

class LoginController
{
    public function login()
    {
        $userModel = new User;

        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email=$_POST['email'];
                $password=$_POST['password'];
    
                if (empty($email) || empty($password)) {
                    throw new Exception("error in login");
                }

                $user = $userModel->Login($email, $password);
                if ($user) {
                    session_start([
                        'cookie_lifetime' => 86400,
                        'cookie_secure' => true,
                        'cookie_httponly' => true,
                        'cookie_samesite' => 'Strict'
                    ]);              
                          $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_email'] = $user['email'];

                    header("Location:index.php?page=home");
                    exit();
                } else {
                    $error_message = "Identifiants incorrects.";
                }
            }
        } catch (Exception $e) {
            $error_message = $e->getMessage();
        }

        require_once "views/login.php";
    }
    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: index.php?page=login");
        exit();
    }
}



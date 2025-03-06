<?php

class RegisterController
{
    public function register()
    {

        if (isset($_SESSION['user_id'])) {
            header("Location: index.php?page=home");
            exit();
        }

        try {
            $UserModel = new User;

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                if (empty($firstName) || empty($lastName) || empty($email) || empty($password)) {
                    throw new Exception("Tous les champs sont obligatoires.");
                }

                $UserModel->register($firstName, $lastName, $email, $password);

                header("Location: index.php?page=login");
                exit();
            }
        } catch (Exception $e) {
            $error_message = $e->getMessage();
        }

        include_once("./views/registration.php");
    }
}
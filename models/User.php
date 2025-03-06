<?php
require_once "config/Database.php";

class User
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function Login($email, $password)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("L'email n'est pas valide.");
        }

        $attempts = $this->getLoginAttempts($email);
        if ($attempts >= 5) {
            throw new Exception("Trop de tentatives échouées. Veuillez réessayer plus tard.");
        }

        try {
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $this->resetLoginAttempts($email);
                return $user;
            } else {
                $this->incrementLoginAttempts($email);
                return false;
            }
        } catch (Exception $e) {
            error_log("Erreur de connexion : " . $e->getMessage());
            throw new Exception("Une erreur s'est produite lors de la connexion.");
        }
    }

    public function register($firstName, $lastName, $email, $password)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("L'email n'est pas valide.");
        }
        if (empty($firstName) || empty($lastName)) {
            throw new Exception("Le prénom et le nom sont obligatoires.");
        }
        if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/[0-9]/", $password)) {
            throw new Exception("Le mot de passe doit contenir au moins 8 caractères, une majuscule et un chiffre.");
        }

        try {
            $sql = "INSERT INTO users (firstName, lastName, email, password) VALUES (:firstName, :lastName, :email, :password)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':firstName' => $firstName,
                ':lastName' => $lastName,
                ':email' => $email,
                ':password' => password_hash($password, PASSWORD_DEFAULT)
            ]);
            return true;
        } catch (Exception $e) {
            error_log("Erreur d'inscription : " . $e->getMessage());
            throw new Exception("Une erreur s'est produite lors de l'inscription.");
        }
    }

    private function getLoginAttempts($email)
    {
        $sql = "SELECT attempts FROM login_attempts WHERE email = :email AND timestamp > NOW() - INTERVAL '1 hour'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? (int)$result['attempts'] : 0;
    }

    private function incrementLoginAttempts($email)
    {
        $sql = "INSERT INTO login_attempts (email, attempts, timestamp) VALUES (:email, 1, NOW())
                ON CONFLICT (email) DO UPDATE SET attempts = login_attempts.attempts + 1, timestamp = NOW()";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
    }

    private function resetLoginAttempts($email)
    {
        $sql = "DELETE FROM login_attempts WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
    }
}
<?php
require_once "config/Database.php";

class User {
    private $conn;
    private $table_name = "user";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function Login($email, $password) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
    
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user && !empty($user['password']) && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
    

    public function register($name, $fullname, $email, $password) {
        $sql = "INSERT INTO user (nom, prenom, email, mdp) VALUES (:nom, :prenom, :email, :mdp)";
        $stmt = $this->conn->prepare($sql);
        $result = $stmt->execute([
            ':nom' => $name,
            ':prenom' => $fullname,
            ':email' => $email,
            ':mdp' => password_hash($password, PASSWORD_DEFAULT)
        ]);
        
        return $result;
    }
    
}
?>

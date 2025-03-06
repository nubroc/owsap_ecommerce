<?php
include_once __DIR__ . '/../config/Database.php';

class Seller
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function fetchAllSellers()
    {
        try {
            $sql = "SELECT * FROM sellers";
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Erreur lors de la récupération des vendeurs : " . $e->getMessage());
            throw new Exception("Une erreur s'est produite lors de la récupération des vendeurs.");
        }
    }

    public function fetchSellerById($seller_id)
    {
        try {
            $sql = "SELECT * FROM sellers WHERE id = :seller_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':seller_id', $seller_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Erreur lors de la récupération du vendeur : " . $e->getMessage());
            throw new Exception("Une erreur s'est produite lors de la récupération du vendeur.");
        }
    }
}
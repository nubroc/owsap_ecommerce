<?php

include_once __DIR__ . '/../config/Database.php';

class Article
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function fetchAllProducts()
    {
        try {
            $sql = "SELECT * FROM products";
            $stmt = $this->conn->query($sql);
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $products;
        } catch (Exception $e) {
            error_log("Erreur lors de la récupération des produits : " . $e->getMessage());
            throw new Exception("Une erreur s'est produite lors de la récupération des produits.");
        }
    }

    public function fetchProduct($id)
    {
        try {
            $sql = "SELECT * FROM products WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            return $product;
        } catch (Exception $e) {
            error_log("Erreur lors de la récupération du produit : " . $e->getMessage());
            throw new Exception("Une erreur s'est produite lors de la récupération du produit.");
        }
    }
   
}

<?php

include_once __DIR__ . '/../models/Article.php';

class ProductController
{
    public function catalogue()
    {
       

        if (isset($_SESSION['user_id'])) {
            $articleModel = new Article;

            try {
                $products = $articleModel->fetchAllProducts();
                    include_once("./views/home.php");
                
            } catch (Exception $e) {
                error_log("Erreur dans ProductController::catalogue : " . $e->getMessage());
                throw new Exception("Une erreur s'est produite lors de l'affichage du catalogue.");
            }
        } else {
            header("Location: index.php?page=login");
            exit();
        }
    }
}
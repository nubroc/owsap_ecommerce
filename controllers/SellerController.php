<?php
require_once __DIR__ . '/../models/Seller.php';

class SellerController
{
    public function showSeller()
    {
$sellerModel = new Seller ;
        if (isset($_SESSION['user_id'])) {
            $seller_id = intval($_GET['seller_id']);              
                    $seller = $sellerModel->fetchSellerById($seller_id);
                    if ($seller) {
                        include_once("./views/seller.php");
                    } else {
                        throw new Exception("Vendeur non trouvé.");
                    }
             
          
        } else {
            header("Location: index.php?page=login");
            exit();
        }
    }
}
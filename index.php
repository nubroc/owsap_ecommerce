<?php
session_start();

require_once 'config/Database.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/ProduitController.php';
require_once 'controllers/RegisterController.php';


$database = new Database();
$db = $database->getConnection();


$page = $_GET['page'] ?? 'home';

if ($page === 'home') {
    $homeController = new HomeController();
    $homeController->index();
} elseif ($page === 'login') {
    $authController = new LoginController();
    $authController->login();
} elseif ($page === 'logout') {
    $authController = new LoginController();
    $authController->logout();
} elseif ($page === 'catalogue') {
    $produitController = new ProduitController();
    $produitController->catalogue();
} elseif ($page === 'register') {
    $produitController = new RegisterController();
    $produitController->register();
} else {
    echo "Page non trouvée";
}
?>

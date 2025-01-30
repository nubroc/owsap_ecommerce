<?php
session_start();

require_once 'config/Database.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/LoginController.php';


$database = new Database();
$db = $database->getConnection();


$page = $_GET['page'] ?? 'home';

if ($page === 'home') {
    $homeController = new HomeController();
    $homeController->index();
} elseif ($page === 'login') {
    $authController = new AuthController();
    $authController->login();
} elseif ($page === 'logout') {
    $authController = new AuthController();
    $authController->logout();
} else {
    echo "Page non trouvée";
}
?>

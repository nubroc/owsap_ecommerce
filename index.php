<?php
require_once 'config/Database.php';
require_once 'controllers/HomeController.php';

$database = new Database();
$db = $database->getConnection();

$homeController = new HomeController();
$homeController->index();
?>

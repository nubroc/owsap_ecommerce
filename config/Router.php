<?php
require_once 'controllers/HomeController.php';
require_once 'controllers/RegisterController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/ProduitController.php';

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;

    case 'register':
        $controller = new RegisterController();
        $controller->register();
        break;

    case 'login':
        $controller = new LoginController();
        $controller->login();
        break;

    case 'catalogue':
        $produitController = new ProduitController();
        break;

    default:
        echo "Erreur 404 : Page non trouvée";
        break;
}

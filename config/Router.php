<?php
require_once 'controllers/LoginController.php' ;
require_once 'controllers/HomeController.php';
require_once 'controllers/RegisterController.php' ;
$page = $_GET['page'] ?? 'home';


switch($page) {
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;

    case 'register':
        $controller = new RegisterController();
        $controller->register();
        break;

    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;

    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;

    default:
        echo "Erreur 404 : Page non trouvée";
        break;
}

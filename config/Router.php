<?php
require_once 'controllers/HomeController.php';
require_once 'controllers/RegisterController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/SellerController.php';
require_once 'controllers/ContactController.php';


$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        $produitController = new ProductController();
        $produitController->catalogue();
        break;
    case 'register':
        $controller = new RegisterController();
        $controller->register();
        break;

    case 'login':
        $controller = new LoginController();
        $controller->login();
        break;

    case 'seller':
        $sellerController = new SellerController();
        $sellerController->showSeller();
        break;
        case 'logout':
            $controller = new LoginController();
            $controller->logout();
            break;
            case 'contact':
                $contactController = new ContactController;
                $contactController->submitContactRequest();
                break;

    default:
        echo "Erreur 404 : Page non trouvée";
        break;
}

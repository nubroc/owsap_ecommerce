<?php
class HomeController {
    public function index() {
        //session_start();
        /*
        if (!isset($_SESSION["user"])) {
            header("Location: index.php?page=login");
            exit();
        }
            
*/
    include 'views/home.php';

    echo "Bienvenue sur la page d'accueil !";

}
}
?>

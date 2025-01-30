<?php
class HomeController {
    public function index() {
        session_start();
        if (!isset($_SESSION["user"])) {
            header("Location: index.php?page=login");
            exit();
        }

        echo "<h1>Bienvenue, " . $_SESSION["user"] . " !</h1>";
        echo "<a href='index.php?page=logout'>Se déconnecter</a>";
    }
}
?>

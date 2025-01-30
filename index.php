<?php
session_start();

require_once 'config/Database.php';
require_once 'config/router.php';



$database = new Database();
$db = $database->getConnection();



?>

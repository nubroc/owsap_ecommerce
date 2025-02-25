<?php
session_start();

require_once 'config/Database.php';
$database = new Database();
$db = $database->getConnection();


require_once __DIR__ . '/config/router.php';
?>

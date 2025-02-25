<?php
class Database {
    private static $instance = null;
    private $pdo;
    private $host = "localhost";
    private $db_name = "owsap_ecommerce";
    private $username = "root";
    private $password = "FaBen456BizBob";

    public function __construct() {
        $this->getConnection();
    }

    public function getConnection() {
        $this->pdo = null;

        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->pdo;
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->pdo;
    }
}

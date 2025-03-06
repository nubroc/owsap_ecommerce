<?php
class Database {
    private static $instance = null;
    private $pdo;
    private $host = "localhost";
    private $port = "5432";
    private $db_name = "ecommerce_db";
    private $username = "postgres";
    private $password = "adamadiop";

    public function __construct() {
        $this->getConnection();
    }

    public function getConnection() {
        $this->pdo = null;

        try {
            $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->db_name}";
            $this->pdo = new PDO($dsn, $this->username, $this->password);
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
?>

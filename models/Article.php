<?php

include_once __DIR__ . '/../config/Database.php';

class Article {
    private $id;
    private $nom;
    private $description;
    private $image;
    private $prix;

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getImage() {
        return $this->image;
    }

    public function getPrix() {
        return $this->prix;
    }

    public static function getAll() {
        $db = Database::getInstance();
        $stmt = $db->query("
            SELECT
                id,
                nom,
                description,
                image,
                prix
            FROM article
        ");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');
        return $stmt->fetchAll();
    }

    public static function getById($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("
            SELECT
                id,
                nom,
                description,
                image,
                prix
            FROM article
            WHERE id = ?
        ");
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');
        return $stmt->fetch();
    }
}

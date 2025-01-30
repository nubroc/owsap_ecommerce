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
                id as id,
                nom as nom,
                description as description,
                image as image,
                prix as prix,
            FROM article
        ");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
        return $stmt->fetchAll();
    }

    public static function getById($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("
            SELECT
                id as id,
                nom as nom,
                description as description,
                image as image,
                prix as prix,
            FROM article
            WHERE id = ?
        ");
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');
        return $stmt->fetch();
    }
}

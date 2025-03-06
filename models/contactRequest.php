<?php

class ContactRequest {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function createContactRequest($title, $description, $user_id) {
        $sql = "INSERT INTO contact_requests (title, description, user_id) VALUES (:title, :description, :user_id)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':user_id', $user_id);

        return $stmt->execute();
    }

}

?>

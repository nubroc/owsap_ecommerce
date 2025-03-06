<?php
include_once __DIR__ . '/../models/ContactRequest.php';

class ContactController {
    private $contactRequestModel;

    public function __construct() {
        $this->contactRequestModel = new ContactRequest();
    }

    public function submitContactRequest() {
        if (!isset($_SESSION['user_id'])) {
            echo "Vous devez être connecté pour soumettre une demande.";
            return;
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'], $_POST['description'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $user_id = $_SESSION['user_id'];
    
            if ($this->contactRequestModel->createContactRequest($title, $description, $user_id)) {
                $successMessage = 'Votre demande a été envoyée avec succès !';
            } else {
                $errorMessage = "Erreur lors de l'envoi de la demande.";
            }
        } 
    
        include 'views/contactRequest.php';
    }
    

   
}



?>
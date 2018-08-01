<?php 
namespace App;

class FlashMessage 
{
    // Enregistre un message en session pour un affichage "one shot".
    public static function setFlashMessage($message, $type = 'success'){
        $_SESSION['flashMessage'] = [
            'message' => $message,
            'type' => $type
        ];
    }

    // affiche un message flash si il y en a un en session puis le supprime
    public static function displayFlashMessage(){
        if(isset($_SESSION['flashMessage'])){
            $message = $_SESSION['flashMessage']['message'];
            $type = ($_SESSION['flashMessage']['type'] == 'error') 
                ? 'danger' 
                : $_SESSION['flashMessage']['type'];
            
            // On affiche le message.
            echo '<div class="alert alert-' . $type . '">' . ' <h5 class="alert-heading">'. $message . '</h5></div>';
    
            // On suprime le message de la session.
            unset($_SESSION['flashMessage']);
        }
    }
}
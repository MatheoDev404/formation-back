<?php 

require __DIR__ . '/App/init.php';

use Model\Abonne;
use App\FlashMessage;

// / recuperer un objet Abonne à partir de l'id reçue dans l'url.
// ajoute run emethode delete() qui le suprimera en bdd
// gerer le cas ou l'abonnée ne peut etre suprimer: 
// dans ce cas rediriger avec un message d'erreur
// rediriger avec un message de confirmation
 
try{
    $abonne = Abonne::find($_GET['id']);
    $abonne->delete();
    FlashMessage::setFlashMessage('L\'abonné a bien été supprimé.');  
}catch(Exception $ex){
    FlashMessage::setFlashMessage('Impossible de suprimer l\'abonné, il a des livres à rendre', 'error');
}
header('location: abonne.php');
die;  

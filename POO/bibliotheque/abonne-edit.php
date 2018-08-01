<?php

require __DIR__ . '/App/init.php';

use Model\Abonne;
use App\FlashMessage;

$abonne = new Abonne();



if(!empty($_POST)) {
    $abonne->setPrenom($_POST['prenom']); // possible grace au __construct();

    if (isset($_GET['id'])) {
        $abonne->setId($_GET['id']);
    }

    $errors = $abonne->validate();

    if(empty($errors)){
        $abonne->save(); 

        FlashMessage::setFlashMessage("l'abonné est enregistré.");
        header('location: abonne.php');
        die;
    }else{
        FlashMessage::setFlashMessage("Le formulaire contient des erreurs : <br/>" . implode('<br/>', $errors),'error');
    }
    

}elseif(isset($_GET['id'])){
    $abonne = Abonne::find($_GET['id']);
}



include __DIR__ . '/view/abonne-edit.html.php';
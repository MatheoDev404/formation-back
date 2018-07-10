<?php 

function dump($var) {
    echo '<pre>' ;
    var_dump($var);
    echo '</pre>';
}

// nettoie les valeures
function sanitizeValue(&$value){
    // trim() : supprime les espace en début et fin de string.
    // strip_tags() : supprime les balises html.
   $value = trim(strip_tags($value));
}

// nettoie les valeurs d'un tableau
function sanitizeArray(array &$array){
    // application de la fonction sanitizeValue() sur tous le selement du tableau.
    array_walk($array, 'sanitizeValue');
}

// nettoie les valeur du tableau $_POST;
function sanitizePost(){
    sanitizeArray($_POST);
}

// ajout du message (erreur/succès/warnig/...).
function setFlashMessage($message, $type = 'success'){
    $_SESSION['flashMessage'] = [
        'message' => $message,
        'type' => $type
    ];
}

//affichage d'un message si il y en a un
function displayFlashMessage(){
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

// Verifie si un utilisateur est connecté, renvois true ou false
function isUserConnected(){
    return isset($_SESSION['utilisateur']);
}

function getUserFullName(){
    if(isUserConnected()){
        return $_SESSION['utilisateur']['prenom'] . ' ' . $_SESSION['utilisateur']['nom'];
    }
}

// verifie si on a un utilisateru connecté qui à le rôle admin
function isUserAdmin(){
    return isUserConnected() && $_SESSION['utilisateur']['role'] == 'admin'; 
}

// On bloque l'accès aux pages d'administration via l'url et on le redirige
function adminSecurity(){
    if(!isUserAdmin()){
        if(!isUserConnected()){
            header('location: ' . RACINE_WEB . 'connexion.php');
        } else {
            header('HTTP/1.1 403 Forbidden');
            echo "Vous n'avez pas le droit d'accéder à cette page.";
        }
        die;
    }
}

// formatage du prix pour l'affichage
function prixFr($prix){
    return number_format($prix, 2, ',', ' ') . ' €';
}
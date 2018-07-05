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
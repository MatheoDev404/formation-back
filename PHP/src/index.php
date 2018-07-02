<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>php</title>
</head>
<body>

    <?php

        echo 'hello world';
        echo '</br><strong> du text </strong>';

    ?>

    <h2>Variables</h2>

    <?php

        // déclaration de variable
        $a = 1; // type INTEGER ou INT
        $b = 1.5; // type FLOAT
        $c ='hello'; //type STRING
        $d = true; //type BOOLEAN ou BOOL
        
        // echo affiche la valeur de la variable.
        echo $a;
        echo '<br>';
        
        // var_dump() : Affiche les informations structurées d'une variable, y compris son type et sa valeur.
        var_dump($b);
        echo '<br>';

        $e = (int)$d; // pour forcer le type d'une variable.
        var_dump($e);
        echo '<br>';
        
        // concaténation avec le ' . ' 
        echo $a . $b;
        echo '</br>' . $a . ' to the ' . $b;

        $c = 2;
        // devient une string 'Un plus un font 2'
        $d = 'Un plus un font ' . 2;
        echo '<br>' . $d

    ?>

    <h2>Guillemets</h2>

    <?php 

        $a = 'Bonjour';
        echo '$a le monde'; // simple quote, la variable n'est pas interprété.
        echo "</br>$a le monde";// double quote, la variable est interprété.

    ?>

    <h2>Constantes</h2>
    
    <?php 
    // define() : Définit une constante
    define('VILLE', 'Paris');
    echo VILLE;
    
    echo '<br> <strong>renvois le fichier dans lequel on se trouve : <br></strong>';
    echo __FILE__ ; // renvois le fichier dans lequel on se trouve
    echo '<br> <strong>la ligne à laquelle on se trouve : <br></strong>';
    echo __LINE__; // la ligne à laquelle on se trouve
    echo '<br> <strong>le répertoir dans lequel on se trouve :<br></strong>';
    echo __DIR__; // le répertoir dans lequel on se trouve
    
    ?>

    <h2>Opérateurs arithmétiques</h2>
    
    <?php 
    $a = 2;
    $b = 6;

    echo '<br> <strong>addition :<br></strong>';
    echo $a + $b;
    echo '<br> <strong>soustraction :<br></strong>';
    echo $a - $b;
    echo '<br> <strong>multiplication :<br></strong>';
    echo $a * $b;
    echo '<br> <strong>division :<br></strong>';
    echo $a / $b;
    echo '<br> <strong>modulo :<br></strong>';
    echo $a % $b;
    echo '</br>';

    //Raccourcis d'écritures:

    $a += $b; // $a = $a + $b
    echo '</br><strong> += équivaut à $a = $a + $b </strong></br>' . $a;

    $a = 'bonjour';
    $b = ' le monde';
    $a .= $b; // $a = $a . $b
    echo '</br><strong> +.= équivaut à $a = $a . $b </strong></br>' . $a;

    $i = 0;
    $i++; // $i = $i + 1
    echo '</br><strong> $i++ équivaut à $i = $i + 1 </strong></br>' . $i;
    $i++; 
    echo '</br>' . $i;

    ?>
    
    <h2>Conditions</h2>
    
    <?php 

    $vrai = true;
    if($vrai){
        echo '$vrai est vrai';
    }

    $faux = false;
    if($faux){ // la condition n'es pas vérifiée, on entre pas dans la condition.
        echo '</br>$faux est vrai</br>';
    }else {
        echo '</br>$faux est faux</br>';
    }

    if($faux){ // la condition n'es pas vérifiée, on entre pas dans la condition.
        echo '</br>$faux est vrai</br>';
    }else if($vrai){
        echo '</br>$faux est faux $vrai est vrai</br>';
    }
    else {
        echo '</br>$faux est faux</br>';
    }


    $str = 'test';

    
    if ($str == 'test'){ // test l'égalité
        echo '</br>$str vaut "test"</br>';
    }
    
    if ($str != 'bonjour'){ // test l'inégalité
        echo '</br>$str ne vaut pas "bonjour"</br>';
    }

    $a = 10; // INT
    $b = '10'; // STRING

    echo '</br>';
    var_dump($a == $b); // vrai : même valeur
    echo '</br>';
    
    echo '</br>';
    var_dump($a != $b); // faux : même valeur
    echo '</br>';

    echo '</br>';
    var_dump($a === $b); // faux : même valeur, mais pas le même type;
    echo '</br>';
    
    echo '</br>';
    var_dump($a !== $b); // vrai : même valeur, mais pas le même type;
    echo '</br>';
    
    $a = 1;
    $b = 2;
    
    echo '</br>';
    var_dump($a > $b); // $a supérieur à $b (faux);
    echo '</br>';
    var_dump($a < $b); // $a inférieur à $b (vrai);
    echo '</br>';
    var_dump($a >= $b); // $a supérieur ou égale à $b (faux);
    echo '</br>';
    var_dump($a <= $b); // $a inférieur ou égale à $b (vrai);
    echo '</br>';
    
    
    if(isset($a)){ // Détermine si une variable est définie et est différente de NULL
        echo'$a existe et n\'est pas nul';
    }
    echo '</br>';

    if(!empty($a)){ // Détermine si une variable est définie et est différente de NULL
        echo'$a existe et n\'est pas vide';
    }
    // sont vide : null, 0 , 0.0, false, '0', '0.0', '', []. 
    echo '</br>';
    
    $a = 1;
    $b = 2;
    $c = 3;
    $d = 4;
    
    // ET logique : &&
    if ( $b > $a && $c > $b ) {
        echo '$b > $a ET $c > $b ';
        echo '</br>';
    }

    // OU logique : ||
    if ( $b > $a || $c > $b ) {
        echo '$b > $a OU $c > $b ';
        echo '</br>';
    }

    // OU exclusif : XOR
    if ( $b > $a XOR $c > $b ) {
        echo '$b > $a OU $c > $b MAIS PAS les 2 à la fois';
        echo '</br>';
    }

    // Priorité du ET sur le OU 
    if ( $b > $a || $c > $b && $c > $d) {
        echo '$b > $a OU ($c > $b ET $c > $d)';
        echo '</br>';
    }

    // le sparenthèses pour forcer la priorité sur le OU
    if ( ($b > $a || $c > $b) && $c > $d) {
        echo '($b > $a OU $c > $b) ET $c > $d';
        echo '</br>';
    }

    ?>

    <h2>Switch</h2>

    <?php 
    
    $couleur = 'bleu';

    switch ($couleur) {
        case 'rouge':
            echo '</br>la couleur est rouge</br>';
            break;
        case 'bleu':
            echo '</br>la couleur est bleu</br>';
            break;
        case 'jaune':
            echo '</br>la couleur est jaune</br>';
            break;
        default:// optionnel
            echo '</br>la couleur est inconnue</br>';
    }
    
    if ($couleur === 'rouge') {
        echo '</br>la couleur est rouge</br>';
    }else if ($couleur === 'bleu') {
        echo '</br>la couleur est bleu</br>';
    }else if ($couleur === 'jaune') {
        echo '</br>la couleur est jaune</br>';
    }else{
        echo '</br>la couleur est inconnue</br>';
    }
    ?>

</body>
<script src="assets/js/main.js"></script>
</html>
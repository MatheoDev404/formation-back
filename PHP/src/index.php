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

</body>
<script src="assets/js/main.js"></script>
</html>
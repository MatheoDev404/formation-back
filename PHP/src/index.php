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
    
    // var_dump() affiche les informations structurées d'une variable, y compris son type et sa valeur.
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
    echo '$a le monde'; // simple quote, la variable n'est pas interpr
    echo "</br>$a le monde";// double quote, la variable n'est pas interpr
    ?>
</body>
<script src="assets/js/main.js"></script>
</html>
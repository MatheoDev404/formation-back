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
        echo '<br/><strong> du text </strong>';

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
        echo '<br/>' . $a . ' to the ' . $b;

        $c = 2;
        // devient une string 'Un plus un font 2'
        $d = 'Un plus un font ' . 2;
        echo '<br>' . $d

    ?>

    <h2>Guillemets</h2>

    <?php 

        $a = 'Bonjour';
        echo '$a le monde'; // simple quote, la variable n'est pas interprété.
        echo "<br/>$a le monde";// double quote, la variable est interprété.

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
    echo '<br/>';

    //Raccourcis d'écritures:

    $a += $b; // $a = $a + $b
    echo '<br/><strong> += équivaut à $a = $a + $b </strong><br/>' . $a;

    $a = 'bonjour';
    $b = ' le monde';
    $a .= $b; // $a = $a . $b
    echo '<br/><strong> +.= équivaut à $a = $a . $b </strong><br/>' . $a;

    $i = 0;
    $i++; // $i = $i + 1
    echo '<br/><strong> $i++ équivaut à $i = $i + 1 </strong><br/>' . $i;
    $i++; 
    echo '<br/>' . $i;

    ?>
    
    <h2>Conditions</h2>
    
    <?php 

    $vrai = true;
    if($vrai){
        echo '$vrai est vrai';
    }

    $faux = false;
    if($faux){ // la condition n'es pas vérifiée, on entre pas dans la condition.
        echo '<br/>$faux est vrai<br/>';
    }else {
        echo '<br/>$faux est faux<br/>';
    }

    if($faux){ // la condition n'es pas vérifiée, on entre pas dans la condition.
        echo '<br/>$faux est vrai<br/>';
    }else if($vrai){
        echo '<br/>$faux est faux $vrai est vrai<br/>';
    }
    else {
        echo '<br/>$faux est faux<br/>';
    }


    $str = 'test';

    
    if ($str == 'test'){ // test l'égalité
        echo '<br/>$str vaut "test"<br/>';
    }
    
    if ($str != 'bonjour'){ // test l'inégalité
        echo '<br/>$str ne vaut pas "bonjour"<br/>';
    }

    $a = 10; // INT
    $b = '10'; // STRING

    echo '<br/>';
    var_dump($a == $b); // vrai : même valeur
    echo '<br/>';
    
    echo '<br/>';
    var_dump($a != $b); // faux : même valeur
    echo '<br/>';

    echo '<br/>';
    var_dump($a === $b); // faux : même valeur, mais pas le même type;
    echo '<br/>';
    
    echo '<br/>';
    var_dump($a !== $b); // vrai : même valeur, mais pas le même type;
    echo '<br/>';
    
    $a = 1;
    $b = 2;
    
    echo '<br/>';
    var_dump($a > $b); // $a supérieur à $b (faux);
    echo '<br/>';
    var_dump($a < $b); // $a inférieur à $b (vrai);
    echo '<br/>';
    var_dump($a >= $b); // $a supérieur ou égale à $b (faux);
    echo '<br/>';
    var_dump($a <= $b); // $a inférieur ou égale à $b (vrai);
    echo '<br/>';
    
    
    if(isset($a)){ // Détermine si une variable est définie et est différente de NULL
        echo'$a existe et n\'est pas nul';
    }
    echo '<br/>';

    if(!empty($a)){ // Détermine si une variable est définie et est différente de NULL
        echo'$a existe et n\'est pas vide';
    }
    // sont vide : null, 0 , 0.0, false, '0', '0.0', '', []. 
    echo '<br/>';
    
    $a = 1;
    $b = 2;
    $c = 3;
    $d = 4;
    
    // ET logique : &&
    if ( $b > $a && $c > $b ) {
        echo '$b > $a ET $c > $b ';
        echo '<br/>';
    }

    // OU logique : ||
    if ( $b > $a || $c > $b ) {
        echo '$b > $a OU $c > $b ';
        echo '<br/>';
    }

    // OU exclusif : XOR
    if ( $b > $a XOR $c > $b ) {
        echo '$b > $a OU $c > $b MAIS PAS les 2 à la fois';
        echo '<br/>';
    }

    // Priorité du ET sur le OU 
    if ( $b > $a || $c > $b && $c > $d) {
        echo '$b > $a OU ($c > $b ET $c > $d)';
        echo '<br/>';
    }

    // le sparenthèses pour forcer la priorité sur le OU
    if ( ($b > $a || $c > $b) && $c > $d) {
        echo '($b > $a OU $c > $b) ET $c > $d';
        echo '<br/>';
    }

    ?>

    <h2>Switch</h2>

    <?php 
    
    $couleur = 'bleu';

    switch ($couleur) {
        case 'rouge':
            echo '<br/>la couleur est rouge<br/>';
            break;
        case 'bleu':
            echo '<br/>la couleur est bleu<br/>';
            break;
        case 'jaune':
            echo '<br/>la couleur est jaune<br/>';
            break;
        default:// optionnel
            echo '<br/>la couleur est inconnue<br/>';
    }
    
    if ($couleur === 'rouge') {
        echo '<br/>la couleur est rouge<br/>';
    }else if ($couleur === 'bleu') {
        echo '<br/>la couleur est bleu<br/>';
    }else if ($couleur === 'jaune') {
        echo '<br/>la couleur est jaune<br/>';
    }else{
        echo '<br/>la couleur est inconnue<br/>';
    }
    ?>

    <h2>Opérateur ternaire</h2>

    <?php 
    
    $a = 1;

    $b = ($a == 1)  // condition
        ? '$a vaut 1' // si vrai
        : '$a ne vaut pas 1' // si faux
    ;

    // revient à écrire :
    if($a == 1){
        $b = '$a vaut 1';
    }else {
        $b = '$a ne vaut pas 1';
    }

    ?>
    <h2>Boucles</h2>

    <?php 
    $i = 0;
    while ($i < 3) {
        echo $i ;
        $i++;
        
    }
    
    $j = 1;
    while ($j < 5) {
        if ($j % 3 == 0) {
            echo 'fin';
            break;
        }
        echo $j ;
        $j++;
        
    }
 
    for ($i=0; $i < 3; $i++) { 
        if ($j % 3 == 0) {
            echo 'fin';
            break;
        }
        echo $i ;
    }
    ?>

    <!-- Construire une liste déroulante  -->
    <form action="" methode="get">
        <select name="" id="">
            <?php
            for($i=1;$i<=31;$i++){echo"<option value=\"$i\">$i</option>";}
            ?>
        </select>
    </form>
    
    <!-- Construire un tableau d'une ligne sur 8 case sur 8 colonnes  -->
    <table style="background-color: red">
        <?php


        for ($j=0; $j <= 8 ; $j++) { 
            
            echo "<tr style=\"background-color: green\">";
            
            for ($i= 1; $i <= 8 ; $i++){  
                    if($j%2 == 1){
                        if ($i%2 == 1){
                            echo "<td style=\"background-color: gray\">$i</td>";
                        }else{
                            echo "<td style=\"background-color: pink\">$i</td>";
                        }
                    }else{
                        if ($i%2 == 0){
                            echo "<td style=\"background-color: gray\">$i</td>";
                        }else{
                            echo "<td style=\"background-color: pink\">$i</td>";
                        }
                    }
                }

            echo "</tr>";

        }
        ?>
    </table>
    <table>
        <?php 
        for ($j=0; $j <= 8 ; $j++) { 
            
            echo "<tr>";
            
            for ($i= 1; $i <= 8 ; $i++){  
                    $style =  (($i + $j) % 2 == 0)
                            ? 'style="background-color:orange"'
                            : ''
                    ;
                    echo "<td $style> $i - $j </td>";
                }

            echo "</tr>";

        }
        ?>
    </table>

    <h2>Array</h2>

    <?php 
    
    $tab = array(); // Crée un noueau tableau.
    $tab = []; // notation courte.
    
    $tab = array('a', 2, true); // tableau à trois éléments.
    $tab = ['a', 2, true]; // notation courte.

    var_dump($tab);
    $tab[] = 'b'; // ajout d'un élément au tableau.
    var_dump($tab[0]);
    
    $tab[1] = 3; // remplace la valeur à la position 1.
    
    // Même tableau en spécifiant les clés.
    $tab = [
        0 => 'a',
        1 => 2,
        2 => true
    ];
    // Tableau associatif, avec des clés en chaîne de caractères.
    $assoc = [
        'a' => 'A',
        'b' => 'B',
        'c' => 'C'
    ];
    var_dump($assoc['a']);
    // Ajout d'un élément en spécifiant la clé.
    $assoc['d'] = 'D';
    // Si on ajoute un élément sans précisé la clé, il prend l'indice 0.
    $assoc[] = 'E';
    
    var_dump($assoc);
    
    $assoc[5] = 'F'; // Ajoute un élément a l'indice 5.
    $assoc[] = 'G'; // Ajoute un élément à l'indice 6, le plus grand indice numérique +1.
    
    $test = 'test';
    unset($test); // suprime une variable
    unset($assoc['c']); // suprime l'élément du tableau à l'indice 'c'.
    ?>

    <h2>Boucle FOREACH</h2>

    <?php
    // $value est une variable créée dans la déclaration du foreach pour faire référence dans la boucle à  l'élément sur lequel on est en train de boucler. Pareil pour $key.

    foreach ($assoc as $key => $value) {
        echo $key . ' : ' . $value . '<br/>';
    }

    // Ne modifie pas la valeur dans le tableau ($value est une copie).
    foreach ($assoc as $value) {
        if($value == 'A'){
            $value = 'Z';
        }
    }

    // Modifie la valeur dans le tableau.
    foreach ($assoc as $key => $value) {
        if($value == 'A'){
            $assoc[$key] = 'Z';
        }
    }
    ?>

    <h2>Tableau multi-dimentionnel</h2>

    <?php 

    $users = [
            [
                'prenom'    => 'Mathéo',
                'nom'       => 'Stunault'
            ],
            [
                'prenom'    => 'Liam',
                'nom'       => 'tardieu'
            ]
        ];

    foreach ($users as $user) {
        echo $user['prenom'] . ' ' . $user['nom'] . '<br/>';
    }

    // Affiche le prénom du 2ème user.
    echo $users[1]['prenom'];

    ?>
 
    <h2>Fonctions prédéfinies</h2>

    <?php 
    echo strlen('toto'); // renvois 4
    echo '<br/>';
    echo date('d/m/Y H:i:s'); //affiche date et heure actuelle au format français.
    
    
    ?>

    <h2>Fonctions utilisateur</h2>

    <?php 

    // déclaration d'une fonction
    function separateur(){

        echo '<hr/>';
    }
    
    // appel de la fonction
    separateur();

    // déclaration d'une fonction
    function bonjour($qui){
        echo 'Bonjour ' . $qui . '<br/>';
    }

    // appel de la fonction
    bonjour( 'Mathéo' );
    $nom = 'Liam';
    // $qui dans l'execution de la fonction vaut 'Liam'.
    bonjour( $nom );

    function test(){
        // $nom fait partit du scope global et n'est pa saccessible dans la fonction.
        // global : inclut une variable du scope global dans la fonction.
        global $nom;
        var_dump($nom);
    }


    // fonction à deux param, dont un optionnel (avec une valeur par defaut).
    function hello($prenom, $nom = ''){
        $str = "Bonjour $prenom";
        if(!empty($nom)){
            $str .= " $nom";
        }
        echo $str;
    }

    hello('liam');

    function foisDix($nombre){
        return $nombre * 10;
    }

    function refuseDix($nombre){
        if($nombre == 10){
            return 'ko';
        }
        return 'ok';
    }

    refuseDix(54);
    refuseDix(10);

    function calculPrix($prix,$tva = 20){
        $prixTtc =  $prix * (1 + ($tva / 100));
        return $prixTtc;
    }
    echo '<br/>';
    echo calculPrix(100);

    ?>
     
    <h2>Références</h2>

    <?php 

    $a = 1;
    $b = $a; // On affecte la valeur de $a à $b quand $a vaut 1
    $a++; // Quand on modifie $a, ça ne modifie pas $b.

    

    $c = 1;
    $d = &$c; // le & LIE $c à $d.

    $c++; // Quand on modifie $c, $b prend en compte la modification.
    var_dump($c, $d);
    echo '<br/>';

    $d++; // Quand on modifie $d, $c prend aussi en compte la modification.
    var_dump($c, $d);
    echo '<br/>';

    function ajoute1($nb){
        $nb++;
    }

    $nombre = 1;
    ajoute1($nombre);

    //$nombre vaut 1, car $nb est dans le scope de la fonction.
    var_dump($nombre);
    echo '<br/>';

    function ajoute2(&$nb){
        $nb += 2;
    }
    $nombre = 1;
    ajoute2($nombre);

    //$nombre vaut 12, car $nb est dans le scope de la fonction mais il est lié grace au & dans les parametres de la fonctionq.
    var_dump($nombre);
    echo '<br/>';

    ajoute1(1);
    // ajoute2(1); // FATAL ERROR , il faut forcement passer une variable

    ?>
      

</body>
<script src="assets/js/main.js"></script>
</html>
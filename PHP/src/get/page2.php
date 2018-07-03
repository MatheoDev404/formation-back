<?php
var_dump($_GET);

echo '<br/>';
echo $_GET['prenom'] . ' ' . $_GET['nom'];

function test(){
    var_dump($_GET);
    
}

echo '<br/>';
test();

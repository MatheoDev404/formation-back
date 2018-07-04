
<?php 

if(isset($_GET['langue'])){
    $langue = $_GET['langue'];
    $unAn = 365 * 24 * 60 * 60; // Un an en seconde : 31536000 
    
    // setcookie('nomDuCookie', valeur, timestamp d'axpiration)
    setcookie('langue', $langue, time() + $unAn);
}elseif (isset($_COOKIE['langue'])) {
    $langue = $_COOKIE['langue'];
    
}else {
    $langue = "fr";
}

?>

<p>Votre langue</p>
<ul>
    <li>
        <a href="index.php?langue=fr">Français</a>
    </li>
    <li>
        <a href="index.php?langue=en">English</a>
    </li>
    <li>
        <a href="index.php?langue=es">Espanol</a>
    </li>
</ul>

<h1>


<?php 

switch ($langue) {
    case 'en':
        echo 'Hello';   
        break;

    case 'es':
        echo 'Hola';   
        break;
    
    default:
        echo 'Bonjour';
        break;
}

?>



</h1>
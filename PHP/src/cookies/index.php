
<?php 

if(isset($_GET['langue'])){
    $langue = $_GET['langue'];
    setcookie('langue', $langue);
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
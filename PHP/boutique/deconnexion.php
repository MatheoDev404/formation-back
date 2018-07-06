<?php 

require_once __DIR__  . '/include/init.php';


unset($_SESSION['utilisateur']);


// Redirection
header("location: index.php");

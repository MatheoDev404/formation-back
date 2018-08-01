<?php
require_once 'Foo/A.php';
require_once 'Bar/A.php';

// instanciation de la classe A dans Foo
$a = new Foo\A();
echo '<br>';
// instanciation de la classe A dans Bar
$b = new Bar\A();
<?php

include __DIR__ . '/../layout/top.php';

?>

<h1>Accueil</h1>

<?php

echo '<p>Bonjour ' . $abonne->getPrenom() . '</p>';

include __DIR__ . '/../layout/bottom.php';
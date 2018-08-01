<?php

include __DIR__ . '/../layout/top.php';

?>

<h1>Editer un Abonné</h1>

<form class="form" method="POST">

    <div class="form-group">
        <label for="prenom">Prénom :</label>
        <input id="prenom" name="prenom" type="text" value="<?= $abonne->getPrenom(); ?>">
    </div>
    <input id="id" name="id" type="hidden" value="<?php if(!empty($_GET['id'])){ echo $_GET['id']; } ?>">
    <div class="form-btn-group">
        <button type="submit" class="btn btn-success">Ajouter</button>
        <a href="abonne.php" class="btn btn-primary">Retour</a>
    </div>
</form>

<?php

include __DIR__ . '/../layout/bottom.php';
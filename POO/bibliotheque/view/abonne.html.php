<?php

include __DIR__ . '/../layout/top.php';

?>

<h1>Abonnés</h1>
<p><a href="abonne-edit.php">Ajouter un abonné</a></p>
<table class="table">
    <tr>
        <th>Id</th>
        <th>Prénom</th>
        <th width="200px"></th>
        <th width="200px"></th>
    </tr>

    <?php 
    foreach($abonnes as $abonne) :
    ?>
    <tr>
        <td><?= $abonne->getId(); ?></td>
        <td><?= $abonne->getPrenom(); ?></td>
        <td>
            <a class="btn btn-primary" href="abonne-edit.php?id=<?= $abonne->getId() ?>" > MODIFIRUERER </a>
        </td>
        <td>
            <a class="btn btn-danger" href="abonne-delete.php?id=<?= $abonne->getId() ?>" > SUPPRIMERERZ </a>
        </td>
    </tr>
    <?php 
    endforeach;
    ?>
</table>

<?php

include __DIR__ . '/../layout/bottom.php';
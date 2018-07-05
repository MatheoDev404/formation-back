
<?php

require_once __DIR__  . '/../include/init.php';




// lister les catégories dans un tableau html

// requetage ici:
$stmt =  $pdo->query('SELECT * FROM categorie');
$categories = $stmt->fetchAll();

require __DIR__  . '/../layout/top.php';


?>

<h1>Géstion catégories</h1>

<p><a class="btn btn-primary" href="categorie-edit.php">Ajouter une catégorie</a></p>
<!-- le tableau html ici  -->
<table class="table table-dark">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        foreach ($categories as $categorie) :
        ?>
        <?php
        // Alternative :
        // foreach ($categories as $categorie) {
        //     echo '<tr><td>' . $categorie['id'] . '</td><td>' . $categorie['nom'] . '</td></tr>';
        // }
        ?> 
            <tr>
                <td><?= $categorie['id']; ?></td>
                <td><?= $categorie['nom']; ?></td>
            </tr>

        <?php 
        endforeach;
        ?>
    </tbody>
</table>

<?php

require __DIR__  . '/../layout/bottom.php';
dump($categories);
?>

<?php

require_once __DIR__  . '/../include/init.php';

//http://localhost/matheo_stunault/formation-back/PHP/boutique/admin/produits.php
adminSecurity();


// lister les catégories dans un tableau html

// requetage ici:
$stmt =  $pdo->query('SELECT * FROM produit');
$produits = $stmt->fetchAll();

require __DIR__  . '/../layout/top.php';


?>

<h1>Géstion catégories</h1>

<p><a class="btn btn-primary" href="produit-edit.php">Ajouter une catégorie</a></p>
<!-- le tableau html ici  -->
<table class="table table-dark">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th width="100px"></th>
            <th width="100px"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        foreach ($produits as $produit) :
        ?>
        <?php
        // Alternative :
        // foreach ($produits as $produit) {
        //     echo '<tr><td>' . $produit['id'] . '</td><td>' . $produit['nom'] . '</td><td><a class="btn btn-primary" href="produit-edit.php?id=' . $produit['id'] . '"></a></td></tr>';
        // }
        ?> 
            <tr>
                <td><?= $produit['id']; ?></td>
                <td><?= $produit['nom']; ?></td>
                <td><a class="btn btn-primary" href="produit-edit.php?id=<?= $produit['id']; ?>">Modifier</a></td>
                <td><a class="btn btn-danger" href="produit-delete.php?id=<?= $produit['id']; ?>">Supprimer</a></td>
            </tr>

        <?php 
        endforeach;
        ?>
    </tbody>
</table>

<?php

require __DIR__  . '/../layout/bottom.php';
dump($produits);
?>
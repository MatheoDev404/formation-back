
<?php

require_once __DIR__  . '/../include/init.php';

adminSecurity();


// lister les catégories dans un tableau html

// requetage ici:
$stmt =  $pdo->query(
    ' SELECT p.id, p.nom, p.reference, p.prix, p.categorie_id, c.nom as categorie
        FROM produit p
        JOIN categorie c
        ON p.categorie_id = c.id '
);
$produits = $stmt->fetchAll();

// dump($produits);

require __DIR__  . '/../layout/top.php';


?>

<h1>Géstion produits</h1>

<p><a class="btn btn-primary" href="produit-edit.php">Ajouter un produit</a></p>
<!-- le tableau html ici  -->
<table class="table table-dark">
    <thead>
        <tr>
            <th>Catégorie</th>
            <th>Nom</th>
            <th>Référence</th>
            <th>Prix</th>
            <th width="100px"></th>
            <th width="100px"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        foreach ($produits as $produit) :

        ?>
            <tr>
                <td><?= $produit['categorie']; ?></td>
                <td><?= $produit['nom']; ?></td>
                <td><?= $produit['reference']; ?></td>
                <td><?= prixFr($produit['prix']); ?></td>
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
?>
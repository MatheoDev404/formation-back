
<?php

require_once __DIR__  . '/../include/init.php';

require __DIR__  . '/../layout/top.php';



// lister les catégories dans un tbleau html

// requetage ici:
$stmt =  $pdo->query('SELECT * FROM categorie');
$categories = $stmt->fetchAll();



?>

<h1>Géstion catégories</h1>

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
<?php
// Afficher le nom de la catégorie en titre de la page 
// Lister les produits appartenants à la catégorie avec leurs photos si il en ont une
//



require_once __DIR__ . '/include/init.php';
$query ='SELECT nom FROM categorie WHERE id=' . (int)$_GET['id'];
$stmt = $pdo->prepare($query);
$stmt->execute();
$categorie = $stmt->fetchColumn();

$query = 'SELECT * FROM produit WHERE categorie_id=' . (int)$_GET['id'];
$stmt = $pdo->prepare($query);
$stmt->execute();
$produits = $stmt->fetchAll();


require __DIR__  . '/layout/top.php';

?>

<h1><?= $categorie; ?></h1>




<div class="group-item d-flex justify-content-between flex-wrap">

    <?php
    foreach ($produits as $produit) :

    $imgUrl = ($produit['photo'] != '')
                    ? PHOTO_WEB . $produit['photo']
                    : PHOTO_DEFAULT
                ;
    ?>
        <div mainheight="400px" class="col-5">
            <a href="produit.php?id=<?= $produit['id'] ?>" class="d-flex list-group-item list-group-item-action">
                <div class="col-7  justify-content-between flex-wrap">


                    <h5 class="col-12 md-1"><?= $produit['nom']; ?></h5>
                    <span class="col-12 text-muted"><small>ref : <?= $produit['reference']; ?></small></span>
                    <p class="col-12 "><?= prixFr($produit['prix']); ?></p>
                    

                </div>
                <div class="col-2">
                    <img src="<?= $imgUrl ?>" height="100px">
                
                </div>
            </a>
        </div>

    <?php 
    endforeach;
    ?>

</div>






<?php 

require __DIR__  . '/layout/bottom.php';

?>
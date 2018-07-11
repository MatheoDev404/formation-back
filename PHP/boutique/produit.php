<?php
// Afficher le nom de la catégorie en titre de la page 
// Lister les produits appartenants à la catégorie avec leurs photos si il en ont une
//



require_once __DIR__ . '/include/init.php';


$query = 'SELECT * FROM produit WHERE id=' . (int)$_GET['id'];
$stmt = $pdo->prepare($query);
$stmt->execute();
$produit = $stmt->fetch();


require __DIR__  . '/layout/top.php';

$imgUrl = ($produit['photo'] != '')
                    ? PHOTO_WEB . $produit['photo']
                    : PHOTO_DEFAULT
                ;
?>



<div class="d-flex list-group-item list-group-item-action">
    <div class="col-4 flex-wrap">
        <img class="col" src="<?= $imgUrl ?>" >
        <p class="col-12"><?= prixFr($produit['prix']); ?></p>
    
    </div>
    <div class="col-8 d-flex justify-content-between flex-wrap">
        <h5 class="col-12 md-1"><?= $produit['nom']; ?></h5>
        <p class="col-12"><?= nl2br($produit['description']); ?></p>
        <span class="col-12 text-muted"><small>ref : <?= $produit['reference']; ?></small></span>
        
        <a class="col-12" href="#">Ajouter au panier</a>

    </div>
</div>



<?php 

require __DIR__  . '/layout/bottom.php';


?>
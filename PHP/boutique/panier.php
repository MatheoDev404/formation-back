<?php

require_once __DIR__ . '/include/init.php';

$totalPanier = 0;

dump($_POST);
// $_SESSION['panier'] = [];

if(isset($_POST['modifierQuantite'])){
    modifierQuantitePanier($_POST['produitId'],$_POST['quantite'] );
    header('location: panier.php');
    die;
}


require __DIR__  . '/layout/top.php';
?>

<h1 style="text-align:center;">Panier</h1>

<?php
if(!empty($_SESSION['panier'])) :
?>

<table class="table table-bordered" style="width:100%">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Produit</th>
        <th scope="col">Prix unitaire</th>
        <th scope="col">Quantité</th>
        <th scope="col">Total</th>
    </tr>
    </thead>
    <tbody>

        <?php
        
        foreach ($_SESSION['panier'] as $produitId => $produit) :
        ?>
        <tr>
            <td scope="col"><?= $produit['nom'] ?></td>
            <td scope="col"><?= prixFr($produit['prix']) ?></td>
            <td scope="col">
                <form method="post">
                    <div class="form-group d-flex">
                        <input class="col-6 form-control" type="number" min="0" name="quantite" value="<?= $produit['quantite'];?>" >
                        <input type="hidden" name="produitId" value="<?=  $produitId ?>">
                        <button name="modifierQuantite" class="offset-1 col-5 btn btn-primary" type="submit" >Modifier</button>
                    </div>
                </form>
            </td>

            <td scope="col"><?=  prixFr($produit['quantite']*$produit['prix'])?></td>
        </tr>

        <?php 
        endforeach;
        ?>

        <tr>
            <th colspan="3">Prix total du panier</th>
            
            <th><?= totalPanier() ?></th>
        </tr>
    </tbody>
</table>

<div class="text-right">
    <button type="button" class="btn btn-primary">Payer</button>
</div>

<?php
else:
?>

<div class="alert alert-info">
    <h5>Votre panier est vide</h5>
</div>

<?php 
endif;
?>


<?php 

require __DIR__  . '/layout/bottom.php';

?>
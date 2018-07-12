<?php

require_once __DIR__ . '/include/init.php';


// dump($_SESSION['panier']);
// $_SESSION['panier'] = [];

if(isset($_POST['commander'])){
    
    $query=<<<SQL
INSERT INTO commande(
    utilisateur_id,
    montant_total
) VALUES (
    :utilisateur_id,
    :montant_total
)
SQL;
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':utilisateur_id' => $_SESSION['utilisateur']['id'],
        ':montant_total' => totalPanier()
    ]);
    
    // Récuperration d l'id de la commande que l'on vient d'inserer.
    $commandeId = $pdo->lastInsertId();

    $query =<<<SQL
INSERT INTO detail_commande(
    commande_id,
    produit_id,
    prix,
    quantite
) VALUES (
    :commande_id,
    :produit_id,
    :prix,
    :quantite
)
SQL;
    $stmt = $pdo->prepare($query);

    foreach ($_SESSION['panier'] as $produitId => $produit) {
        $stmt->execute([
            ':commande_id' => $commandeId ,
            ':produit_id' => $produitId,
            ':prix' => $produit['prix'],
            ':quantite' => $produit['quantite']
        ]);
    }

    $_SESSION['panier'] = [];

    setFlashMessage('La commande a bien été enregistrée.');
 
}

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
<?php
if(!isUserConnected()):
?>

<div class="alert alert-info">
    Vous devez vous connecter ou vous inscrire pour valider la commande.
</div>

<?php
else:
?>
<form action="" method="post">
    <p class="text-right">
        <button type="submit" name="commander" class="btn btn-primary">Valider la commande</button>
    </p>
</form>


<?php 
endif;
?>



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
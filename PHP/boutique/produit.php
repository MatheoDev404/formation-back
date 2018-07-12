<?php
// Afficher le nom de la catégorie en titre de la page 
// Lister les produits appartenants à la catégorie avec leurs photos si il en ont une
//



require_once __DIR__ . '/include/init.php';


$query = 'SELECT * FROM produit WHERE id=' . (int)$_GET['id'];
$stmt = $pdo->prepare($query);
$stmt->execute();
$produit = $stmt->fetch();


if(!empty($_POST)){
    ajoutPanier($produit, $_POST['quantite']);
    // dump($_SESSION['panier']);
    setFlashMessage('Le produit a bien été ajouté au panier.');
    // On redirige vers la pas sur laquelle on se trouve 
    // Permet de ne pas renvoyer les informations de formulaire
    // à l'actualisation de la page.
    header('location: produit.php?id='. $_GET['id']);
    die;
}

require __DIR__  . '/layout/top.php';

$imgUrl = ($produit['photo'] != '')
                    ? PHOTO_WEB . $produit['photo']
                    : PHOTO_DEFAULT
                ;
?>

<div class="d-flex list-group-item list-group-item-action flex-wrap">
    <div class="col-4 flex-wrap">
        <img class="col" src="<?= $imgUrl ?>" >
        <p class="col-12"><?= prixFr($produit['prix']); ?></p>

        <form action="" method="post">
            <div class="form-group d-flex">
                <label class="col-4"for="quantite">Quantité :</label>
                <select class="col form-control" name="quantite" id="quantite">
                    <?php
                    for ($i=1; $i <= 10; $i++) :
                        ?>
                    <option class="list-item" value="<?= $i ?>"><?= $i ?></option>
                    <?php  
                    endfor;
                    ?>
                </select>
            </div>
            <button class="btn btn-success col-12" href="#">Ajouter au panier</button>
        </form>
    </div>
    <div class="col-8 d-flex justify-content-between flex-wrap">
        <h2 class="col-12 md-1"><?= $produit['nom']; ?></h2>
        <p class="col-12"><?= nl2br($produit['description']); ?></p>
        <span class="col-12 text-muted"><small>ref : <?= $produit['reference']; ?></small></span>
    </div>
</div>



<?php 

require __DIR__  . '/layout/bottom.php';


?>
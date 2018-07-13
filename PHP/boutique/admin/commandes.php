<?php

require_once __DIR__  . '/../include/init.php';

adminSecurity();

if(isset($_POST['statutCommande'])){
    dump($_POST);

    $query = 'UPDATE commande SET statut = :statut, date_statut = now() WHERE id = :id ';
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':statut' => $_POST['statut'],
        ':id' => $_POST['commandeId']
    ]);

    setFlashMessage('Le statut est modifié');
    header('Location: commandes.php'); 
    die;
}


$stmt = $pdo->query('SELECT c.*, u.nom, u.prenom FROM commande c JOIN utilisateur u ON c.utilisateur_id = u.id');
$stmt->execute();
$commandes = $stmt->fetchAll();

$statuts = [
    "en cours",
    "envoyé",
    "livré",
    "annulé",
];


require __DIR__  . '/../layout/top.php';

?>

<h1 style="text-align:center;">Commandes</h1>

<table class="table table-bordered" style="width:100%">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Utilisateur</th>
        <th scope="col">Montant</th>
        <th scope="col">Date</th>
        <th scope="col">Statut</th>
        <th scope="col">Date changement de statut</th>
    </tr>
    </thead>
    <tbody>
        <?php
        // dump($commandes);
        foreach($commandes as $commande) :
        ?>
  
        <tr>
            <td scope="col"><?= $commande['id']; ?></td>
            <td scope="col"><?= $commande['prenom'] . ' ' . $commande['nom']; ?></td>
            <td scope="col"><?= prixFr($commande['montant_total']); ?></td>
            <td scope="col"><?= datetimeFr($commande['date_commande']); ?></td>
            <td scope="col">
                <form method="post"> 
                    <div class="form-group d-flex">
                        <select class="form-control" name="statut" id="statut">

                        <?php 
                        
                        foreach($statuts as $statut) :
                            $selected = ($statut == $commande['statut']) ? 'selected': '';
                        ?>
                            <option <?= $selected ?> value="<?= $statut ?>"><?= $statut ?></option>

                        <?php 
                        endforeach;
                        ?>
                        </select>
                        <input type="hidden" name="commandeId" value="<?= $commande['id']; ?>">
                        <button name="statutCommande" class="offset-1 col-5 btn btn-primary" type="submit" >Modifier</button>
                    </div>
                </form>
            </td>
            <td scope="col"><?= datetimeFr($commande['date_statut']) ?></td>
        </tr>
        <?php 
        endforeach;
        ?>

    </tbody>
</table>



<?php

require __DIR__  . '/../layout/bottom.php';

?>

<!-- lister les commandes dans un tableau html:
- id de la commande
- nom preno de l'user de la commande
- montant formaté
- statut
- date du statut
- passert le statu en liste deroulante avec un boutton modifier (input[type=hidden])

 -->
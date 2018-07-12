<?php

require_once __DIR__  . '/../include/init.php';


$stmt = $pdo->query('SELECT c.*, u.nom, u.prenom FROM commande c JOIN utilisateur u ON c.utilisateur_id = u.id');
$stmt->execute();
$commandes = $stmt->fetchAll();


if(isset($_POST['statutCommande'])){
    dump($_POST);

    $query = 'UPDATE commande SET statut = :statut WHERE id = :id ';
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':statut' => $_POST['statut'],
        ':id' => $_POST['commandeId']
    ]);

    setFlashMessage('Le statut est modifié');
    header('Location: commandes.php');
    die;
}
require __DIR__  . '/../layout/top.php';

?>

<h1 style="text-align:center;">Commandes</h1>



<table class="table table-bordered" style="width:100%">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Utilisateur</th>
        <th scope="col">Montant</th>
        <th scope="col">Statut</th>
        <th scope="col">Date</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
        <?php
        // dump($commandes);
        foreach($commandes as $commande) :

            $statut = ($commande['statut'] == $_POST['statut'])
                            ?'selected'
                            : ''
                    ;
        ?>
  
        <tr>
            <td scope="col"><?= $commande['id'] ?></td>
            <td scope="col"><?= $commande['prenom'] . ' ' . $commande['nom']; ?></td>
            <td scope="col"><?= prixFr($commande['montant_total']) ?></td>
            <td scope="col"><?= $commande['statut'] ?></td>
            <td scope="col"><?= $commande['date_statut'] ?></td>
            <td scope="col">
                <form method="post"> 
                    <div class="form-group d-flex">
                        <select class="form-control" name="statut" id="statut">
                            <option <?= $statut ?> value="en cour">En cours</option>
                            <option <?= $statut ?>  value="envoye">Envoyé</option>
                            <option <?= $statut ?>  value="livre">Livré</option>
                            <option <?= $statut ?>  value="annule">Annulé</option>
                        </select>
                        <input type="hidden" name="commandeId" value="<?= $commande['id']; ?>">
                        <button name="statutCommande" class="offset-1 col-5 btn btn-primary" type="submit" >Modifier</button>
                    </div>
                </form>
            </td>
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
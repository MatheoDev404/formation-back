<?php

require_once __DIR__  . '/../include/init.php';

$errors = [];
$nom = '';

if (!empty($_POST)) {
    // nettoyage (cf: inclue/fonctions.php).
    sanitizePost();

    extract($_POST);
    dump($_POST);
    // test de la saisie du champ text
    if (empty($_POST['nom'])){
        $errors[] = 'Le nom est obligatoire.';
    }elseif (strlen($_POST['nom']) > 50) {
        $errors[] = 'Le nom est trop long, 1 à 50 caractères.';
    }

    // si le tableau qui contient mes erreures est vide, alors je met à jour ma base de donnée
    if (empty($errors)) {
        if(isset($_GET['id'])){ // Modification
            $query = 'UPDATE produit SET nom = :nom WHERE id = :id';
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                ':nom' => $nom,
                ':id' => $_GET['id']
            ]);
             // enregistrement du message dans $_SESSION.
             setFlashMessage('la produit a bien été modifiée.');
        }else { // création
            // insertion en bdd
            $query = 'INSERT INTO produit(nom) VALUES (:nom)';
            $stmt = $pdo->prepare($query);
            $stmt->execute([':nom' => $nom]);  

            // enregistrement du message dans $_SESSION.
            setFlashMessage('la produit a bien été enregistrée.');
        }
        
        // Redirection
        header("location: produits.php");
        die; // Termine l'execution du script
    }
}elseif (isset($_GET['id'])){ // SI j'ai un id dans l'url, alors je recupère les infos de la produit correspondante.
    // requete en se servant de l'id renvoyée en $_GET
    $query = 'SELECT * FROM produit WHERE id=' . (int)$_GET['id'];
    $stmt = $pdo->query($query);

    // fetch() du resultat de la requete
    $produit = $stmt->fetch();

    // on rempli la variable $nom, pour préremplir les champs.
    $nom = $produit['nom'];

    // si on reçois un id dans l'url
}

require __DIR__  . '/../layout/top.php';

if(!empty($errors)) :
?>

<div class="alert alert-danger">
    <h5 class="alert-heading">Le formulaire contient des erreurs</h5>
    <?= implode('<br/>', $errors); // implode() : transforme un tableau en string, en separant chaques éléments par un séparateur. ?>
</div>

<?php 
endif;
?>
<h1>Edition produit</h1>
<form action="" method="post">
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" name="nom" class="form-control" value="<?= $nom ?>" />
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" name="description" class="form-control" value="<?= $description ?>" />
    </div>
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" name="nom" class="form-control" value="<?= $reference ?>" />
    </div>

    <div class="form-btn-group text-right">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="produits.php" class="btn btn-secondary">Retour</a>
    </div>
</form>
<?php

require __DIR__  . '/../layout/bottom.php';

?>
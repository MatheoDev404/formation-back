<?php
require_once __DIR__  . '/../include/init.php';
adminSecurity();
$errors = [];
$nom = $description = $reference = $prix =    '';
$categorie_id = 0;
// requetage ici:
$stmt =  $pdo->query(
    'SELECT * FROM categorie ORDER BY nom'
);
$categories = $stmt->fetchAll();
if (!empty($_POST)) {
    // nettoyage (cf: inclue/fonctions.php).
    sanitizePost();
    // extract renvois un tableau avec l'attribut name du champ en clé valeur.
    extract($_POST);
    dump($_POST);
    // test de la saisie du champ text nom
    if (empty($_POST['nom'])){
        $errors[] = 'Le nom est obligatoire.';
    }elseif (strlen($_POST['nom']) > 255) {
        $errors[] = 'Le nom est trop long, 1 à 255 caractères.';
    }
    // test de la saisie du champ text description
    if (empty($_POST['description'])){
        $errors[] = 'La déscription est obligatoire.';
    }
    // test de la saisie du champ text reference
    if (empty($_POST['reference'])){
        $errors[] = 'La reference est obligatoire.';
    }elseif(strlen($_POST['reference']) > 50){
        $errors[] = 'Le nom est trop long, 1 à 50 caractères.';
    }else{
        $query = "SELECT * FROM produit WHERE reference = :reference";
        $stmt =  $pdo->prepare( $query );
        $stmt->execute([':reference' => $reference]);
        $produits = $stmt->fetchAll();
        foreach ($produits as $produit) {
            if (($produit['reference'] == $reference) && ($produit['id'] != $_GET['id'])) {
                $errors[] = 'Cet Réference est déjà utilisée.'; 
            }  
        }
    }
    // test de la saisie du champ text prix
    if (empty($_POST['prix'])){
        $errors[] = 'Le prix est obligatoire.';
    }elseif(!is_numeric($prix)){
        $errors[] = 'Le prix doit etre un chiffre.';
    }
    // test de la saisie du champ text prix
    if ($categorie_id == 0){
        $errors[] = 'La catégorie est obligatoire.';
    }
    // si le tableau qui contient mes erreures est vide, alors je met à jour ma base de donnée
    if (empty($errors)) {
        if(isset($_GET['id'])){ // Modification
            $query = 'UPDATE produit SET nom = :nom, description = :description, reference = :reference, prix = :prix, categorie_id = :categorie_id WHERE id = :id';
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                ':nom' => $nom,
                ':description' => $description,
                ':reference' => $reference,
                ':prix' => $prix,
                ':categorie_id' => $categorie_id,
                ':id' => $_GET['id']
            ]);
             // enregistrement du message dans $_SESSION.
             setFlashMessage('le produit a bien été modifiée.');
        }else { // création
            // insertion en bdd
            $query = 'INSERT INTO produit(nom, description, reference, prix, categorie_id)  VALUES (:nom, :description, :reference, :prix, :categorie_id)';
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                ':nom' => $nom,
                ':description' => $description,
                ':reference' => $reference,
                ':prix' => $prix,
                ':categorie_id' => $categorie_id,
                ]);  
            // enregistrement du message dans $_SESSION.
            setFlashMessage('le produit a bien été enregistrée.');
        }
        // Redirection
        header("location: produits.php");
        die; // Termine l'execution du script
    }
}elseif (isset($_GET['id'])){ // SI j'ai un id dans l'url, alors je recupère les infos de la catégorie correspondante.
    // requete en se servant de l'id renvoyée en $_GET
    $query = 'SELECT * FROM produit WHERE id=' . (int)$_GET['id'];
    $stmt = $pdo->query($query);
    // fetch() du resultat de la requete
    $produit = $stmt->fetch();
    // on rempli la variable $nom, pour préremplir les champs.
    $nom = $produit['nom'];
    $description = $produit['description'];
    $reference = $produit['reference'];
    $prix = $produit['prix'];
    $categorie_id = $produit['categorie_id'];
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
<h1>Edition Produit</h1>
<form action="" method="post">
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" name="nom" class="form-control" value="<?= $nom ?>" />
    </div>
    <div class="form-group">
        <label for="description">Déscription</label>
        <textarea class="form-control" name="description" id="description"><?= $description ?></textarea>
    </div>
    <div class="form-group">
        <label for="reference">Réference</label>
        <input type="text" name="reference" class="form-control" value="<?= $reference ?>" />
    </div>
    <div class="form-group">
        <label for="prix">Prix</label>
        <input type="text" name="prix" class="form-control" value="<?= $prix ?>" />
    </div>
    <div class="form-group">
        <label for="categorie">Categorie</label>
        <select class="form-control" name="categorie_id" id="categorie">
            <option value="0">Choisissez une catégorie</option>
            <?php foreach($categories as $categorie) :?>
                <option 
                    <?php 
                       if ($categorie_id ==  $categorie['id']){
                           echo 'selected';
                        }
                    ?>
                    value="<?=  $categorie['id'] ?>"
                >
                    <?= $categorie['nom'] ?>
                </option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="form-btn-group text-right">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="produits.php" class="btn btn-secondary">Retour</a>
    </div>
</form>
<?php
require __DIR__  . '/../layout/bottom.php';
?>
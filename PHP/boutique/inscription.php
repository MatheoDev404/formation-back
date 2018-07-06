<?php
require_once __DIR__  . '/include/init.php';

$errors = [];

$civilite = $nom = $prenom = $email = $ville = $cp = $adresse = '' ;

if (!empty($_POST)) {
    sanitizePost();
    extract($_POST);

// verification des champs
    if(empty($civilite)){
        $errors[] = 'La civilité est obligatoire.';
    }
    
    if(empty($nom)){
        $errors[] = 'Le nom est obligatoire.';
    }
    
    if(empty($prenom)){
        $errors[] = 'Le prénom est obligatoire.';
    }
    
    if(empty($email)){
        $errors[] = 'L\'email est obligatoire.';
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){ // Test de la validité de l'email.
        $errors[] = 'Veuillez rentrer un email valide.';
    }else{// test de l'unicité de l'email dans la base de données.
        $query = 'SELECT count(*) AS nb FROM utilisateur WHERE email = :email';
        $stmt = $pdo->prepare($query);
        $stmt->execute([':email' => $_POST['email']]);
        //récupère directement le résultat du count
        $nb = $stmt->fetchColumn();
        if ($nb != 0) {
            $errors[] = 'Cet email est déjà utilisé.'; 
        }
    }
    
    if(empty($ville)){
        $errors[] = 'La ville est obligatoire.';
    }
    
    if(empty($cp)){
        $errors[] = 'Le code postal est obligatoire.';
    }elseif (strlen($cp) != 5 || !ctype_digit($cp)) { // ctype_digit() vérifie que la string ne contient que des chiffres
        $errors[] = 'Veuillez rentrer un code postal valide.';
    }
    
    if(empty($adresse)){
        $errors[] = 'L\'adresse est obligatoire.';
    }

    if(empty($mdp)){
        $errors[] = 'Le mot de passe est obligatoire.';
    }elseif(!preg_match('/^[a-zA-Z0-9_-]{6,20}$/', $mdp)){
        $errors[] = 'Le mot de passe doit faire entre 6 et 20 caractère, et ne contenir que des chiffres, des lettres ou les caractères _ et -';
    }
    
    if($_POST['mdp'] != $_POST['mdp_confirm']){
        $errors[] = 'Le mot de passe et sa confirmation ne sont pas identique.';
    }

    if (empty($errors)) {
        $query = <<<EOS
INSERT INTO utilisateur (
    nom,
    prenom,
    email,
    mdp,
    civilite,
    ville,
    cp,
    adresse
) VALUES (
    :nom,
    :prenom,
    :email,
    :mdp,
    :civilite,
    :ville,
    :cp,
    :adresse
)      
EOS;
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':nom' => $_POST['nom'],
            ':prenom' => $_POST['prenom'],
            ':email' => $_POST['email'],
            ':mdp' => password_hash($_POST['mdp'],PASSWORD_BCRYPT), // Hashing du mdp avant l'enregistrement
            ':civilite' => $_POST['civilite'],
            ':ville' => $_POST['ville'],
            ':cp' => $_POST['cp'],
            ':adresse' => $_POST['adresse']
        ]);

        setFlashMessage('Votre compte a bien été créé.');
        header('location: index.php');
        die;
    }
}



require __DIR__  . '/layout/top.php';

if(!empty($errors)) :
?>

<div class="alert alert-danger">
    <h5 class="alert-heading">Le formulaire contient des erreurs</h5>
    <?= implode('<br/>', $errors); // implode() : transforme un tableau en string, en separant chaques éléments par un séparateur. ?>
</div>

<?php 
endif;
?>

<h1>Inscription</h1>

<form action="" method="post" class="row">
    <div class="form-group col-4">
        <label>Civilité</label>
        <select name="civilite" id="" class="form-control">
            <option value=""></option>
            <option value="Mme" <?php if($civilite == 'Mme'){echo 'selected';} ?>>Mme</option>
            <option value="M." <?php if($civilite == 'M.'){echo 'selected';} ?>>M.</option>
        </select>
    </div>
    <div class="form-group col-8">
        <label>Nom</label>
        <input type="text" name="nom" class="form-control" value="<?=  $nom;  ?>">
        <label>Prénom</label>
        <input type="text" name="prenom" class="form-control" value="<?=  $prenom;  ?>">
    </div>
    <hr>
    <div class="form-group col-12">
        <label>Email</label>
        <input type="text" name="email" class="form-control" value="<?=  $email;  ?>">
    </div>
    <div class="form-group col-6">
        <label>Ville</label>
        <input type="text" name="ville" class="form-control" value="<?=  $ville;  ?>">
    </div>
    <div class="form-group col-6">
        <label>Code postal</label>
        <input type="text" name="cp" class="form-control" value="<?=  $cp;  ?>">
    </div>
    <div class="form-group col-12">
        <label>Adresse</label>
        <textarea name="adresse" class="form-control"><?=  $adresse;  ?></textarea>
    </div>
    <div class="form-group col-12">
        <label>Mot de passe</label>
        <input type="password" name="mdp" class="form-control">

        <label>Confirmation du mot de passe</label>
        <input type="password" name="mdp_confirm" class="form-control">
    </div>
    <div class="form-btn-group col-12">
        <button type="submit" class="btn btn-primary">Valider</button>
    </div>
</form>

<?php
require __DIR__  . '/layout/bottom.php';
?>
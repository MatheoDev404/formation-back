<?php
require_once __DIR__  . '/include/init.php';



$email = '';
$errors = [];

if (!empty($_POST)) {
    sanitizePost();
    extract($_POST);

    if(empty($email)){
        $errors[] = 'L\'email est obligatoire.';
    }

    if(empty($_POST['mdp'])){
        $errors[] = 'L\'mot de passe est obligatoire.';
    }
    if (empty($errors)) {
        $query = 'SELECT * FROM utilisateur WHERE email = :email' ; 
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':email' => $_POST['email'],
            ]);
        $utilisateur = $stmt->fetch();
            dump($utilisateur);
        if(!empty($utilisateur)){
            if(password_verify($_POST['mdp'],$utilisateur['mdp'])){

                // Connecter un utilisateru c'est l'enregistrer en session
                $_SESSION['utilisateur'] = $utilisateur;
                
                header('location: index.php');
                die;
            }
            $errors[] = 'Identifiants incorrect';
        }
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

<h1>Connexion</h1>

<form action="" method="post">

    <div class="form-group col-12">
        <label>Email</label>
        <input type="text" name="email" class="form-control" value="<?=  $email;  ?>">
    </div>
    <div class="form-group col-12">
        <label>Mot de passe</label>
        <input type="password" name="mdp" class="form-control">
    </div>
    <div class="form-btn-group col-12">
        <button type="submit" class="btn btn-primary">Valider</button>
    </div>
</form>

<?php
require __DIR__  . '/layout/bottom.php';
?>
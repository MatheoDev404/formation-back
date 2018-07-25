<?php 

require_once __DIR__ . '/cnx.php';


    $data = [];   
    
    if(!empty($_POST['categorieNom'])){
        $query = 'INSERT INTO categorie (nom) VALUES (:nom)';
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':nom' => $_POST['categorieNom'],
            ]);

        $data = [
            'statut' => 'ok',
            'message' => 'C\'est bon c\'est vert',
        ];
        
    }else {
        $data = [
            'statut' => 'ko',
            'message' => 'C\'est mort c\'est rouge',
        ];
    }
    
echo json_encode($data);
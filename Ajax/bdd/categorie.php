<!-- faire un formulaire pour ajouter une categorie en ajax:
        - faire un formulaire avec un champ nom
        - intercepter le submit en js
        - envoyer la valeur du champ nom en ajax en POST vers un fichier PHP.
        - ce fichier verifie que le champ nom n'est pas vide
        - si il n'est pas vide INSERT en bdd dans categorie
        - ce fichier retourne un JSON avec 2 informations :
                - statut : ok ou ko
                - message : de confirmation ou d'erreur
        - En retour d'appel Ajax, afficher le message en vert si c'est ok ou rouge si c'est ko.

 -->
<?php 

require_once __DIR__ . '/cnx.php';

?>

 <!DOCTYPE html>
 <html lang="fr">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body>
     <form id="ajouterCategorie">
            <label for="categorie">Nom de la categorie :</label>
            <input type="text" id="categorieNom" name="categorieNom" placholder="chaussure">

            <input type="submit" id="soumettre" value="soumettre">
     </form>
     <div id="message">
     </div>
     <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
     <script>   
            $(function () {


                $('#ajouterCategorie').submit(function (event) {
                    event.preventDefault();
                    
                    $.post(
                        'add-cat.php',
                        $(this).serialize(),
                        function (response) { 
                            // console.log(response);
                            $('#message').html(response['message']);
                            if(response['statut'] == 'ok'){
                                $('#message').css('border','1px solid green');
                            }else if(response['statut'] == 'ko'){
                                $('#message').css('border','1px solid red');
                            }
                        },
                        'json'
                    );
                 
                });


            });
        </script>    
        
 </body>
 </html>
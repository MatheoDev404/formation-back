<?php
// Crée une class abstraite Véhicule
// Créé 2 classes qui e héritent : Voiture et Moto
// Qui contiennent des méthodes pour retourner
// - le nombre de roues (lié au type de véhicule)
// - leur type de carburant (essence/diesel)
// - leur vitesse maximale


// - ajouter 2 attributs contenanceReservoir et litresEssence
//   - ajouter aux vehicule une methode fairePlein() qui prend une pompe en parametre 
//     qui remplis le reservoir et enlève autant d'essence à la pompe
// - créé une classe Pompe
//   - avec un attribut litreEssence
//   - gerer le cas ou la pompe ne permet pas de faire le plein

require 'Vehicule.php';
require 'Voiture.php';
require 'Moto.php';


$moto1 = new Moto('diesel', '250km/h', 60, 50);
echo $moto1->getRoue();
echo '</br>';
echo $moto1->getCarburant();
echo '</br>';
echo $moto1->getVitesseMax();
echo '</br>';
echo $moto1->getLitreEssence() . '/' . $moto1->getcontenanceReservoir() . 'L';
echo '</br>';

$voiture1 = new Voiture('essence', '300km/h', 160, 150);
echo $voiture1->getRoue();
echo '</br>';
echo $voiture1->getCarburant();
echo '</br>';
echo $voiture1->getVitesseMax();
echo '</br>';
echo $voiture1->getLitreEssence() . '/' . $voiture1->getcontenanceReservoir() .'L';
echo '</br>';

$pompe1 = new Pompe(100000, 100000);
$pompe2 = new Pompe(100000, 1);

echo $moto1->getLitreEssence() . '/' . $moto1->getcontenanceReservoir() .'L';
echo '</br>';
echo $pompe1->getLitreEssence() . 'L';
echo '</br>';
echo $moto1->fairePlein($pompe1);
echo '</br>';
echo $pompe1->getLitreEssence() . 'L';
echo '</br>';
echo $moto1->getLitreEssence() . '/' . $moto1->getcontenanceReservoir() .'L';
echo '</br>';

echo $voiture1->getLitreEssence() . '/' . $voiture1->getcontenanceReservoir() .'L';
echo '</br>';
echo $pompe2->getLitreEssence() . 'L';
echo '</br>';
echo $voiture1->fairePlein($pompe2);
echo '</br>';
echo $pompe2->getLitreEssence() . 'L';
echo '</br>';
echo $voiture1->getLitreEssence() . '/' . $voiture1->getcontenanceReservoir() .'L';
echo '</br>';
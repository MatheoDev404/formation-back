<?php
// créer un class abstraite Vehicule
// 2 classes qui en héritent : Voiture et Moto
// qui vont contenir des méthodes pour retourner
// le nombre de roues (lié au type de véhicule)
// le type de carburant (essence ou diesel)
// la vitesse maximale
// instancier une voiture et une moto

// ajouter 2 attributs contenanceReservoir et litresEssence
// créer une classe Pompe (à essence)
// avec 2 attributs contenance et litresEssence
// ajouter au véhicule une méthode fairePlein() qui prend
// une pompe en paramètre qui remplit le réservoir du véhicule
// et enlève autant d'essence à la pompe
// Bonus : gérer le cas où la pompe ne contient pas
// assez d'essence pour faire le plein

require_once 'Voiture.php';
require_once 'Moto.php';
require_once 'Pompe.php';

$voiture = new Voiture('diesel', 180, 80, 30);
$moto = new Moto('essence', 210, 30, 15);
$pompe = new Pompe(2000, 1500);

$voiture->fairePlein($pompe);
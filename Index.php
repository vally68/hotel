<?php
include "chambre.php";
include "hotel.php";
include "client.php";

$h1 = new hotel("Hilton",4,30,"Strasbourg","10 rue de la gare", "67000");
$c1 = new chambre(120, 15, false, false);
$c2 = new chambre(135, 19, true, true);
$cl1 = new client ("Micka","MURMANN");




echo "<h3>Statut des chambres de (recup infos hotel)</h3>"; // rendre dynamique
$h1->AfficherInfos();



$c1->AfficherTarif();
$c1->AfficherWifi();
$c1->AfficherEtat();
$c2->AfficherTarif();
$c2->AfficherWifi();
$c2->AfficherEtat();

$cl1->AfficherInfosClient();




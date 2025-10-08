<?php
include "chambre.php";
include "hotel.php";
include "client.php";
//include "reservation.php";
include "test.php";


$h1 = new hotel("Hilton",4,30,"Strasbourg","10 rue de la gare", "67000",27,3);
$c1 = new chambre(120, 15, false, false);
$c2 = new chambre(135, 19, true, true);
$cl1 = new client ("Micka","MURMANN");
$resv1 = new Reservation("Micka","MURMANN",3,new DateTime("2021-03-11"),new DateTime("2021-03-15"),500,true,2,120);
$resv2 = new Reservation("Micka","MURMANN",4,new DateTime("2021-04-01"),new DateTime("2021-04-17"),500,true,2,120);





$h1->AfficherInfos();
$cl1->AfficherInfosClient();
$resv1->AfficherResa();
$resv2->AfficherResa();
// $c1->AfficherTarif();
// $c1->AfficherWifi();
// $c1->AfficherEtat();
$c2->AfficherTarif();
$c2->AfficherWifi();
$c2->AfficherEtat();







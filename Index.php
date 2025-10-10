<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "chambre.php"; 
include "hotel.php";
include "client.php";
include "reservation.php";

// Création des chambres
$chambres = [
    new chambre(120, 1, false, true),
    new chambre(120, 2, false, true),
    new chambre(120, 3, false, false),
    
    new chambre(300, 16, true, true),
    new chambre(300, 17, true, false),
    new chambre(300, 18, true, true),
    new chambre(300, 19, true, true),
    new chambre(300, 21, true, true),
];


$h1 = new hotel("Hilton", 4, 30, "Strasbourg", "10 rue de la gare", "67000", 27, 3);
$h2 = new hotel("Regent", 4, 25, "Paris", "10 rue de la paix", "75000", 22, 3);

$cl1 = new client("Micka", "MURMANN");
$cl2 = new client("Virgile", "GIBELLO");

$resv1 = new Reservation("Micka", "MURMANN", 3, new DateTime("2021-03-11"), new DateTime("2021-03-15"),0, true, 2, 120, "Hilton");
$resv1->calculerPrixTotal();

$resv2 = new Reservation("Micka", "MURMANN", 4, new DateTime("2021-04-01"), new DateTime("2021-04-17"),0, true, 2, 120, "Hilton");
$resv2->calculerPrixTotal();

$resv3 = new Reservation("Virgile", "GIBELLO", 17, new DateTime("2021-01-01"), new DateTime("2021-01-01"),0, true, 1, 120, "Hilton");

// Mettre les réservations dans un tableau
$reservations = [$resv1, $resv2,$resv3];

// Compter les réservations par hôtel
$nbResahotel = Reservation::ReservationsHotel($reservations, "Hilton");
$nbResahotel2 = Reservation::ReservationsHotel($reservations, "Regent");

echo "<h4>Hotel Hilton : $nbResahotel réservation(s).</h4>";
echo $cl1->AfficherInfosClient(), $resv1->AfficherResa(), $resv2->AfficherResa();;
echo $cl2->AfficherInfosClient(), $resv3->AfficherResa();
echo "<h4>Hotel Regent : $nbResahotel2 réservation(s).</h4>";


$h1->AfficherInfos();
$cl1->AfficherInfosClient();


$nbResaMicka = Reservation::ReservationsClient($reservations, "Micka", "MURMANN");
echo "<h4>$nbResaMicka réservation(s).</h4>";


$resv1->AfficherResa();
$resv2->AfficherResa();

$totalresv = $resv1->getPrixTotal() + $resv2->getPrixTotal();
echo "Total : {$totalresv} €.<br>";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Statuts des chambres</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>Statuts des chambres de Hilton **** Strasbourg</h1>

        <table class="room-table">
            <thead>
                <tr>
                    <th>CHAMBRE</th>
                    <th>PRIX</th>
                    <th>WIFI</th>
                    <th>ETAT</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                foreach ($chambres as $chambre) {
                    
                    if ($count == 3) {
                        echo '<tr class="separator-row"><td colspan="4"></td></tr>';
                    }
                    $chambre->AfficherStatutChambre();
                    $count++;
                }
                ?>
            </tbody>
        </table>
    </div>
    
  
</body>
</html>
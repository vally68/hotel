<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "Chambre.php"; 
include "Hotel.php";
include "Client.php";
include "Reservation.php";






// Création des chambres pour Hilton
$chambres = [];
for ($i = 1; $i <= 5; $i++) {
    $etat = ($i <= 3) ? false : true; // 3 premières chambres réservées
    $prix = ($i <= 15) ? 120 : 300;
    $wifi = ($i % 2 == 0);
    $chambres[] = new Chambre($prix, $i, $wifi, $etat);
}

//création des hotels
$hotel1 = new Hotel("Hilton", 4, "Strasbourg", "10 rue de la gare", "67000");
$hotel2 = new Hotel("Regent", 4, "Paris", "10 rue de la paix", "75000");

// Ajout des chambres à Hilton
foreach ($chambres as $ch) {
    $hotel1->ajouterChambre($ch);
}


// $cl1 = new client("Micka", "MURMANN");
// $cl2 = new client("Virgile", "GIBELLO");


// $resv1 = new Reservation("Micka", "MURMANN", 3, new DateTime("2021-03-11"), new DateTime("2021-03-15"),
//     0, true, 2, 120, "Hilton", $cl1, $chambres[0]);
// $resv1->calculerPrixTotal();

// $resv2 = new Reservation("Micka", "MURMANN", 4, new DateTime("2021-04-01"), new DateTime("2021-04-17"),
//     0, true, 2, 120, "Hilton", $cl1, $chambres[1]);
// $resv2->calculerPrixTotal();

// $resv3 = new Reservation("Virgile", "GIBELLO", 17, new DateTime("2021-01-01"), new DateTime("2021-01-02"),
//     0, true, 1, 120, "Hilton", $cl2, $chambres[16]);
//     $resv3->calculerPrixTotal();

// $reservations = [$resv1, $resv2, $resv3];


// $nbResahotel = Reservation::ReservationsHotel($reservations, "Hilton");
// $nbResahotel2 = Reservation::ReservationsHotel($reservations, "Regent");

// echo "<h4>Hotel Hilton : $nbResahotel réservation(s).</h4>";
// echo $cl1->AfficherInfosClient(), $resv1->AfficherResa(), $resv2->AfficherResa();
// echo $cl2->AfficherInfosClient(), $resv3->AfficherResa();
// echo "<h4>Hotel Regent : $nbResahotel2 réservation(s).</h4>";


// $hotel1->AfficherInfos();

// $nbResaMicka = Reservation::ReservationsClient($reservations, "Micka", "MURMANN");
// echo "<h4>$nbResaMicka réservation(s) pour Micka MURMANN.</h4>";



// $totalresv = $resv1->getPrixTotal() + $resv2->getPrixTotal();
// echo "<p>Total : {$totalresv} €.</p>";

 $hotel1-> getReservClient();
 var_dump($hotel1);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Statut des chambres</title>
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
                  
                    if ($count == 30) {
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
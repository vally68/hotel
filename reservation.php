<?php
 // la classe est à revoir, trop d'infos inutile et qui surcharge le code 
class Reservation {
   // private string $_nomreservation; // est-ce utile vu qu'on peut les récupérer de client?
  //  private string $_prenomreservation; // est-ce utile vu qu'on peut les récupérer de client?
    private int $_nbchambrer;
    private DateTime $_datedebut;
    private DateTime $_datefin;
    private int $_prixtotal;
    private bool $_wifietat;
    private int $_nblit;
    private int $_prixchambre;
    private string $_hotelreserver;
    private Client $_client; 
    private Chambre $_chambre;

    public function __construct(
        //string $_nomreservation,
       // string $_prenomreservation,
        int $_nbchambrer,
        DateTime $_datedebut,
        DateTime $_datefin,
        int $_prixtotal,
        bool $_wifietat,
        int $_nblit,
        int $_prixchambre,
        string $_hotelreserver,
        Client $_client,
        Chambre $_chambre
    ) {
      //  $this->_nomreservation = $_nomreservation;
      //  $this->_prenomreservation = $_prenomreservation;
        $this->_nbchambrer = $_nbchambrer;
        $this->_datedebut = $_datedebut;
        $this->_datefin = $_datefin;
        $this->_prixtotal = $_prixtotal;
        $this->_wifietat = $_wifietat;
        $this->_nblit = $_nblit;
        $this->_prixchambre = $_prixchambre;
        $this->_hotelreserver = $_hotelreserver;
        $this->_client = $_client;
        $this->_chambre = $_chambre;

        // Lien bidirectionnel
        $_client->ajouterReservation($this);
        $_chambre->ajouterReservation($this);
    }

    // --- GETTERS ---
    public function getClient(): Client { return $this->_client; }
    public function getChambre(): Chambre { return $this->_chambre; }
   // public function getNomReservation(): string { return $this->_nomreservation; }
   // public function getPrenomReservation(): string { return $this->_prenomreservation; }
    public function getNbchambrer(): int { return $this->_nbchambrer; }
    public function getDateDebut(): DateTime { return $this->_datedebut; }
    public function getDateFin(): DateTime { return $this->_datefin; }
    public function getPrixTotal(): int { return $this->_prixtotal; }
    public function getWifi(): bool { return $this->_wifietat; }
    public function getNblit(): int { return $this->_nblit; }
    public function getPrixchambre(): int { return $this->_prixchambre; }
    public function getHotelr(): string { return $this->_hotelreserver; }

    // --- SETTERS ---
    public function setPrixTotal(int $prixtotal): void {
        $this->_prixtotal = $_prixtotal;
    }

    public function setDateFin(DateTime $datefin): void {
        $this->_datefin = $_datefin;
    }

    // --- AFFICHAGE ---
    public function __toString(): string {
        return "Réservation du " . $this->_datedebut->format('d/m/Y') .
               " au " . $this->_datefin->format('d/m/Y') .
               " (" . $this->_hotelreserver . ")";
    }

    public function afficherResa(): void {
        echo "Chambre {$this->_nbchambrer} ({$this->_nblit} lits, {$this->_prixchambre} €";
        echo ", WiFi : " . ($this->_wifietat ? "Oui" : "Non") . ")";
        echo " — Du " . $this->_datedebut->format('d-m-Y') . " au " . $this->_datefin->format('d-m-Y');
        echo " — Sous-total : {$this->_prixtotal} €<br>";
    }

    // --- MÉTHODES DE CALCUL ---
    public function calculerSousTotal(): int {
        $interval = $this->_datedebut->diff($this->_datefin);
        $nbJours = $interval->days ?: 1; // minimum 1 jour
        $this->_prixtotal = $this->_prixchambre * $nbJours;
        return $this->_prixtotal;
    }

    // --- STATIQUES ---
    public static function ReservationsClient(array $reservations, string $nom, string $prenom): int {
        $compteur = 0;
        foreach ($reservations as $resa) {
            if (
                strtolower($resa->getNomReservation()) === strtolower($nom) &&
                strtolower($resa->getPrenomReservation()) === strtolower($prenom)
            ) {
                $compteur++;
            }
        }
        return $compteur;
    }

    public static function ReservationsHotel(array $reservations, string $hotelNom): int {
        $compteur = 0;
        foreach ($reservations as $resa) {
            if (strtolower($resa->getHotelr()) === strtolower($hotelNom)) {
                $compteur++;
            }
        }
        return $compteur;
    }

       // --- TOTAL GÉNÉRAL ---
    public static function calculerTotalReservations(array $reservations): int {
        return array_sum(array_map(fn($resa) => $resa->calculerSousTotal(), $reservations));
    }

//  public function afficherResatotal(): void {
//     foreach($reservations as $resa){
//         echo "Chambre {$this->_nbchambrer} ({$this->_nblit} lits, {$this->_prixchambre} €";
//         echo ", WiFi : " . ($this->_wifietat ? "Oui" : "Non") . ")";
//         echo " — Du " . $this->_datedebut->format('d-m-Y') . " au " . $this->_datefin->format('d-m-Y');
//         echo " — Sous-total : {$this->_prixtotal} €<br>"; }
//     }

}

<?php

class Reservation {
    private string $_nomreservation;
    private string $_prenomreservation;
    private int $_nbchambrer;
    private DateTime $_datedebut;
    private DateTime $_datefin;
    private int $_prixtotal;
    private bool $_wifir;
    private int $_nblit;
    private int $_prixchambre;
    private string $_hotelr;
    private Client $_client;
    private Chambre $_chambre;

    public function __construct(
        string $_nomreservation,
        string $prenomreservation,
        int $nbchambrer,
        DateTime $datedebut,
        DateTime $datefin,
        int $prixtotal,
        bool $wifir,
        int $nblit,
        int $prixchambre,
        string $hotelr,
        Client $client,
        Chambre $_chambre
    ) {
        $this->_nomreservation = $_nomreservation;
        $this->_prenomreservation = $prenomreservation;
        $this->_nbchambrer = $nbchambrer;
        $this->_datedebut = $datedebut;
        $this->_datefin = $datefin;
        $this->_prixtotal = $prixtotal;
        $this->_wifir = $wifir;
        $this->_nblit = $nblit;
        $this->_prixchambre = $prixchambre;
        $this->_hotelr = $hotelr;
        $this->_client = $client;
        $this->_chambre = $_chambre;

        // Lien bidirectionnel
        $client->ajouterReservation($this);
        $_chambre->ajouterReservation($this);
    }

    // --- GETTERS ---
    public function getClient(): Client { return $this->_client; }
    public function getChambre(): Chambre { return $this->_chambre; }
    public function getNomReservation(): string { return $this->_nomreservation; }
    public function getPrenomReservation(): string { return $this->_prenomreservation; }
    public function getNbchambrer(): int { return $this->_nbchambrer; }
    public function getDateDebut(): DateTime { return $this->_datedebut; }
    public function getDateFin(): DateTime { return $this->_datefin; }
    public function getPrixTotal(): int { return $this->_prixtotal; }
    public function getWifi(): bool { return $this->_wifir; }
    public function getNblit(): int { return $this->_nblit; }
    public function getPrixchambre(): int { return $this->_prixchambre; }
    public function getHotelr(): string { return $this->_hotelr; }

    // --- SETTERS ---
    public function setPrixTotal(int $prixtotal): void {
        $this->_prixtotal = $prixtotal;
    }

    public function setDateFin(DateTime $datefin): void {
        $this->_datefin = $datefin;
    }

    // --- AFFICHAGE ---
    public function __toString(): string {
        return "Réservation du " . $this->_datedebut->format('d/m/Y') .
               " au " . $this->_datefin->format('d/m/Y') .
               " (" . $this->_hotelr . ")";
    }

    public function afficherResa(): void {
        echo "Chambre {$this->_nbchambrer} ({$this->_nblit} lits, {$this->_prixchambre} €";
        echo ", WiFi : " . ($this->_wifir ? "Oui" : "Non") . ")";
        echo " — Du " . $this->_datedebut->format('d-m-Y') . " au " . $this->_datefin->format('d-m-Y');
        echo " — Sous-total : {$this->_prixtotal} €<br>";
    }

    // --- MÉTHODES DE CALCUL ---
    public function calculerPrixTotal(): int {
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
}

<?php

class Reservation {
    private string $_nomr;
    private string $_prenomr;
    private int $_nbchambrer;
    private DateTime $_datedebut;
    private DateTime $_datefin;
    private int $_prixtotal;
    private bool $_wifir;
    private bool $_etatr;
    private int $_nblit;
    private int $_prixchambre;
    private string $_hotelr;

    public function __construct(string $_nomr, string $_prenomr, int $_nbchambrer, DateTime $_datedebut,
                                DateTime $_datefin, int $_prixtotal, bool $_wifir, int $_nblit,int $_prixchambre,  string $_hotelr) {
        $this->nomr = $_nomr;
        $this->prenomr = $_prenomr;
        $this->nbchambrer = $_nbchambrer; 
        $this->datedebut = $_datedebut;
        $this->datefin = $_datefin;
        $this->prixtotal = $_prixtotal;
        $this->wifir = $_wifir;
        $this->nblit = $_nblit;
        $this->prixchambre = $_prixchambre;
        $this->hotelr = $_hotelr;
    }

    // Getters
    public function getNomr(): string {
        return $this->nomr;
    }

    public function getPrenomr(): string {
        return $this->prenomr;
    }

    public function getNbchambrer(): int {
        return $this->nbchambrer;
    }

    public function getDateDebut(): DateTime {
        return $this->datedebut;
    }

    public function getDateFin(): DateTime {
        return $this->datefin;
    }

    public function getPrixTotal(): int {
        return $this->prixtotal;
    }

    public function getWifi(): bool {
        return $this->wifir;
    }

  
    // public function afficherWifi(): void {
    //     if ($this->wifir) {
    //         echo "Cette chambre possède le WiFi.<br>";
    //     } else {
    //         echo "Cette chambre n'a pas de WiFi.<br>";
    //     }
    // }

   public function getNblit(): int {
        return $this->nblit;
    }

    public function getPrixchambre(): int {
        return $this->prixchambre;
    }

    public function getHotelr(): string {
        return $this->hotelr;
    }
    // Setters
    public function setPrixTotal(int $_prixtotal): void {
        $this->prixtotal = $_prixtotal;
    }

    public function setDateFin(DateTime $_datefin): void {
        $this->datefin = $_datefin;
    }

    public function __toString(): string {
        return $this->datedebut->format('Y-m-d') . " au " . $this->datefin->format('Y-m-d');
    }

    public function AfficherResa(): void {
        echo "Chambre : {$this->nbchambrer} ";
        echo "( {$this->nblit} lits ";
        echo "{$this->prixchambre} €. ";
        echo " WiFi : " . ($this->wifir ? "Oui" : "Non") . ") ";
        echo "Du " . $this->datedebut->format('d-m-Y') . " au " . $this->datefin->format('d-m-Y') . ". ";
        echo "Sous-Total : {$this->prixtotal} €. <br>"; 
    }


public function calculerPrixTotal(): int {
    // Calcul du nombre de jours
    $interval = $this->datedebut->diff($this->datefin);
    $nbJours = $interval->days;

    $prixBase =  $this->prixchambre * $nbJours;

    $total = $prixBase ;

    $this->prixtotal = $total;

    return $total;
}

public static function ReservationsClient(array $reservations, string $nom, string $prenom): int {
    $compteur = 0;

    foreach ($reservations as $resa) {
        
        if (strtolower($resa->getNomr()) === strtolower($nom)
            && strtolower($resa->getPrenomr()) === strtolower($prenom)) {
            $compteur++;
        }
    }

    return $compteur;
}

public static function ReservationsHotel(array $reservationshh, string $hotelNom): int {
        $compteur = 0;
        foreach ($reservationshh as $resahh) {
            if (strtolower($resahh->getHotelr()) === strtolower($hotelNom)) {
                $compteur++;
            }
        }
        return $compteur;
    }
}
                 

 
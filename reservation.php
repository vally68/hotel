<?php
// Reservation.php

class Reservation {

    private int $_prixtotal;
    private DateTime $_datedebut;
    private DateTime $_datefin;

    public function __construct(int $_prixtotal, DateTime $_datedebut, DateTime $_datefin) {
        $this->prixtotal = $_prixtotal;
        $this->datedebut = $_datedebut;
        $this->datefin = $_datefin;
    }

    // Getters
    public function getPrixTotal(): int {
        return $this->prixtotal;
    }

    public function getDateDebut(): DateTime {
        return $this->datedebut;
    }

    public function getDateFin(): DateTime {
        return $this->datefin;
    }

    // Setters
    public function setPrixTotal(int $prixtotal): void {
        $this->prixtotal = $_prixtotal;
    }

    public function setDateDebut(DateTime $datedebut): void {
        $this->datedebut = $_datedebut;
    }

    public function setDateFin(DateTime $datefin): void {
        $this->datefin = $_datefin;
    }

    public function __toString()
{
    return $this->datedebut->format('Y-m-d') . " au " . $this->datefin->format('Y-m-d');
}


public function AfficherDate(): void {
    echo "Du " . $this->datedebut->format('d-m-Y') . " au " . $this->datefin->format('d-m-Y') . ".";
    echo "Tarif : {$this->prixtotal} €. <br>";
}


}

echo"future fonction reservation(reprendre base fonction getage) dynamique ou dur?";


?>
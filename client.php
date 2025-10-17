<?php
class Client {
    private string $_nom;
    private string $_prenom;
    private array $_reservations = []; // Tableau des réservations du client

    public function __construct(string $_nom, string $_prenom) {
        $this->_nom = $_nom;
        $this->_prenom = $_prenom;
    }

    public function getNom(): string {
        return $this->_nom;
    }

    public function getPrenom(): string {
        return $this->_prenom;
    }

    public function getReservations(): array {
        return $this->_reservations;
    }

    public function ajouterReservation(Reservation $reservation): void {
        $this->_reservations[] = $reservation;
    }

    // Afficher les infos du client et ses réservations
    public function afficherInfosClient(): void {
        echo "<h4>Réservations de {$this->_nom} {$this->_prenom} </h4>";
        
        if (empty($this->_reservations)) {
            echo "<p>Aucune réservation.</p>";
        } else {
            echo "<ul>";
            foreach ($this->_reservations as $reservation) {
                echo "<li>{$reservation}</li>"; 
            }
            echo "</ul>";
        }
    }

    public function __toString(): string {
        return "{$this->_prenom} {$this->_nom}";
    }

    
}
?>

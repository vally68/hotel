<?php
// client.php
class Client {
    private string $_nom;
    private string $_prenom;
    private array $_reservations = []; // Tableau des réservations par  client
 

    public function __construct(string $_nom, string $_prenom) {
        $this->nom = $_nom;
        $this->prenom = $_prenom;
      
    }

    public function getNom(): string { return $this->nom; }
    public function getPrenom(): string { return $this->prenom; }
    public function getReservations(): array { return $this->reservations; }

    public function ajouterReservation(Reservation $reservation): void {
        $this->reservations[] = $reservation;
    }

  

    // Afficher les infos du titulaire et ses comptes
    public function afficherInfosClient(): void {
        echo "<h4>Réservations de {$this->prenom} {$this->nom}</h4>";
        if (empty($this->reservations)) {
            echo "<p>Aucune réservation.</p>";
        } else {
            echo "<ul>";
            foreach ($this->reservations as $reservation) {
                echo "<li>{$reservation}</li>";
            }
            echo "</ul>";
        }
    }

      
}




?>
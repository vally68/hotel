<?php
// client.php
class Client {
    private string $_nom;
    private string $_prenom;
 

    public function __construct(string $_nom, string $_prenom) {
        $this->nom = $_nom;
        $this->prenom = $_prenom;
      
    }

    public function getNom(): string { return $this->nom; }
    public function getPrenom(): string { return $this->prenom; }
   

  

    // Afficher les infos du titulaire et ses comptes
    public function AfficherInfosClient(): void {
        echo "Réservations de ";
        echo "{$this->prenom} {$this->nom} <br>";
         echo "récup des infos de reservation? ";
      
        // echo "<strong>Comptes :</strong><br>";
        // foreach ($this->comptes as $compte) {
        //     echo "- " . $compte . "<br>";
        // }
        // echo "<br>";
    }
}




?>

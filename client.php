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
        echo "<h4>Réservations de {$this->nom} {$this->prenom} </h4>";
   
    }
}




?>

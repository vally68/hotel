<?php
// Titulaire.php
class chambre {
    
    private int $_prix;
    private int $_nbchambre;
    private bool $_wifi;
    private bool $_etat;
   // private array $_comptes = [];

    public function __construct(int $_prix,int $_nbchambre, bool $_wifi, bool $_etat) {
        $this->nbetoile = $prix;
        $this->nbchambre = $_nbchambre;
        $this->wifi = $_wifi;
        $this->etat = $_etat;
    }

    
    public function getPrix(): int { return $this->prix; }
    public function getNbchambre(): int { return $this->nbchambre; }
    public function getWifi(): bool { return $this->wifi; }
    public function getEtat(): bool { return $this->etat; }

 

   

    // Afficher les infos du titulaire et ses comptes
    public function AfficherInfos(): void {
        echo "<h3>{$this->nbchambre}</h3>";
        
        echo "Tarif : {$this->prix}<br>";
        // echo "<strong>Comptes :</strong><br>";
        // foreach ($this->comptes as $compte) {
        //     echo "- " . $compte . "<br>";
        // }
        // echo "<br>";
    }
}



?>

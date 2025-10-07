<?php
// Titulaire.php
class chambre {
    
    private int $_prix;
    private int $_nbchambre;
    private bool $_wifi;
    private bool $_etat;
   // private array $_comptes = [];

    public function __construct(int $_prix,int $_nbchambre, bool $_wifi, bool $_etat) {
        $this->prix = $_prix;
        $this->nbchambre = $_nbchambre;
        $this->wifi = $_wifi;
        $this->etat = $_etat;
    }

    
    public function getPrix(): int { return $this->prix; }
    public function getNbchambre(): int { return $this->nbchambre; }
    public function getWifi(): bool { return $this->wifi; }
    public function getEtat(): bool { return $this->etat; }

 

   

    // Afficher les infos du titulaire et ses comptes
     public function AfficherTarif(): void {
        echo "<h3>{$this->nbchambre}</h3>";
        echo "Tarif : {$this->prix}<br>";
    }

 public function AfficherWifi(): void {
        if ($this->wifi) {
            echo "Cette chambre possède le WiFi.";
        } else {
            echo "Cette chambre n'a pas de WiFi.";
        }
    }
}



?>

<?php
// Titulaire.php
class chambre {
    
    private int $_prix;
    private int $_nbchambre;
    private bool $_wifi;
    private bool $_etat;
   

    public function __construct(int $_prix,int $_nbchambre, bool $_wifi, bool $_etat) {
        $this->prix = $_prix;
        $this->nbchambre = $_nbchambre;
        $this->wifi = $_wifi;
        $this->etat = $_etat;
    }

    
    public function getPrix(): int { return $this->prix; }
    public function getWifi(): bool { return $this->wifi; }
    public function getNbchambre(): int { return $this->nbchambre; }
    public function getEtat(): bool { return $this->etat; }

 

   

    // Afficher les tarifs chambre
     public function AfficherTarif(): void {
        echo "{$this->nbchambre}";
        echo " {$this->prix} €. ";
    }

 public function AfficherWifi(): void {
        if ($this->wifi) {
            echo "&#128246;";
        } else {
            echo "NON ";
        }
    }


    public function AfficherEtat(): void {
        if ($this->etat) {
            echo "DISPONIBLE<br>";
        } else {
            echo "RÉSERVÉE<br>";
        }
    }
}



?>

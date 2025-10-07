<?php
// Titulaire.php
class hotel {
    private string $_nom;
    private int $_nbetoile;
    private int $_nbchambre;
    private string $_ville;
    private string $_adresse;
    private string $_codepostal;

   // récuperer les chambres dispo? ;

    public function __construct(string $_nom,int $_nbetoile,int $_nbchambre, 
    string $_ville,string $_adresse, string $_codepostal) {
        $this->nom = $_nom;
        $this->nbetoile = $_nbetoile;
        $this->nbchambre = $_nbchambre;
        $this->ville = $_ville;
        $this->adresse = $_adresse;
        $this->codepostal = $_codepostal;
    }

    public function getNom(): string { return $this->nom; }
    public function getNbetoile(): int { return $this->nbetoile; }
    public function getNbchambre(): int { return $this->nbchambre; }
    public function getVille(): string { return $this->ville; }
    public function getAdresse(): string { return $this->adresse; }
    public function getCodepostal(): string { return $this->codepostal; }

 

   

    // Afficher les infos du titulaire et ses comptes
    public function AfficherInfos(): void {
        echo "<h3> Hotel {$this->nom}</h3>";
        echo " {$this->nbetoile} étoiles <br>"; // trouvez comment faire que les nombres deviennent *
        echo "{$this->nbchambre} chambres.<br>";
        echo "{$this->adresse} ";
        echo "{$this->codepostal} ";
        echo " {$this->ville} ";
        // echo "<strong>Comptes :</strong><br>";
        // foreach ($this->comptes as $compte) {
        //     echo "- " . $compte . "<br>";
        // }
        // echo "<br>";
    }
}



?>

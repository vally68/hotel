<?php
// Titulaire.php
class hotel {
    private string $_nom;
    private int $_nbetoile;
    private int $_nbchambre;
    private string $_ville;
    private string $_adresse;
    private string $_codepostal;

   // private array $_comptes = [];

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
        echo "<h3>{$this->nom}</h3>";
        
        echo "Ville : {$this->ville}<br>";
        // echo "<strong>Comptes :</strong><br>";
        // foreach ($this->comptes as $compte) {
        //     echo "- " . $compte . "<br>";
        // }
        // echo "<br>";
    }
}



?>

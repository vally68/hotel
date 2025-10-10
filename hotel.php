<?php


class hotel {
    private string $_nom;
    private int $_nbetoile;
    private int $_nbchambre;
    private string $_ville;
    private string $_adresse;
    private string $_codepostal;
    private int $_chambreresa;
    private int $_chambredispo;

   // récuperer les chambres dispo? ;

    public function __construct(string $_nom,int $_nbetoile,int $_nbchambre, 
    string $_ville,string $_adresse, string $_codepostal,int $_chambreresa,int $_chambredispo) {
        $this->nom = $_nom;
        $this->nbetoile = $_nbetoile;
        $this->nbchambre = $_nbchambre;
        $this->ville = $_ville;
        $this->adresse = $_adresse;
        $this->codepostal = $_codepostal;
        $this->chambreresa = $_chambreresa;
        $this->chambredispo = $_chambredispo;
    }

    public function getNom(): string { return $this->nom; }
    public function getNbetoile(): int { return $this->nbetoile; }
    public function getNbchambre(): int { return $this->nbchambre; }
    public function getVille(): string { return $this->ville; }
    public function getAdresse(): string { return $this->adresse; }
    public function getCodepostal(): string { return $this->codepostal; }
    public function getChambreresa(): int { return $this->chambreresa; }
    public function getChambredispo(): int { return $this->chambredispo; }

 

   

    // Afficher les infos de l'hotel
    public function AfficherInfos(): void {
        echo "<h3> {$this->nom} {$this->nbetoile} {$this->ville}</h3>";
        echo "{$this->adresse} ";
        echo "{$this->codepostal} ";
        echo " {$this->ville} <br>";
        echo "Nombre de chambres: {$this->nbchambre} <br>";
        echo "Nombre de chambres réservées: {$this->chambreresa} <br>";
        echo "Nombre de chambres dispo: {$this->chambredispo} ";
        // echo " {$this->nbetoile} étoiles <br>"; // trouvez comment faire que les nombres deviennent *
     
    }


}



?>

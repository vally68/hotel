<?php

class Hotel {
    private string $_nom;
    private int $_nbetoile;
    private string $_ville;
    private string $_adresse;
    private string $_codepostal;
    private array $_chambres = [];
   
   

    public function __construct(string $nom, int $nbetoile, string $ville, string $adresse, 
    string $codepostal) {
        $this->_nom = $nom;
        $this->_nbetoile = $nbetoile;
        $this->_ville = $ville;
        $this->_adresse = $adresse;
        $this->_codepostal = $codepostal;
        $this->_chambres = [];
     
    }
    // Ajouter une chambre
    public function ajouterChambre(Chambre $chambre): void {
        $this->_chambres[] = $chambre; 
    }
    
    // Getters pour info chambres
    public function getNbChambres(): int {
        return count($this->_chambres); 
    }

    public function getNbChambresReservees(): int {
        $count = 0;
        foreach ($this->_chambres as $chambre) {
            if (!$chambre->getEtat()) $count++;
        }
        return $count;
    }

    public function getNbChambresDisponibles(): int {
        $count = 0;
        foreach ($this->_chambres as $chambre) { 
            if ($chambre->getEtat()) $count++;
        }
        return $count;
    }

    public function getReservClient() {
    foreach ($this->_chambres as $chambre)  {
       
           //echo tableau reservation foreach dans un foreach ;
           //   foreach ($this->_reservations as $resa)
            // echo $resa;
        }

}

    public function __toString(): string {
    return $this->getNomReservation();
    vardump($chambers);
}


    // Afficher infos
    public function afficherInfos(): void {
        $etoiles = str_repeat("*", $this->nbetoile);

        echo "<h2>{$this->nom} {$etoiles} de {$this->ville}</h2>";
        echo "<p>{$this->adresse}, {$this->codepostal} {$this->ville}</p>";
        echo "<p>Nombre total de chambres : {$this->getNbChambres()}</p>";
        echo "<p>Chambres réservées : {$this->getNbChambresReservees()}</p>";
        echo "<p>Chambres disponibles : {$this->getNbChambresDisponibles()}</p>";
   

       
    }
}

?>
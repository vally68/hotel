<?php

class Hotel {
    private string $_nom;
    private int $_nbetoile;
    private string $_ville;
    private string $_adresse;
    private string $_codepostal;
    private array $_chambres = []; // Liste des chambres de l'hôtel
   // private Chambre $_etat;

    // --- CONSTRUCTEUR ---
    public function __construct(string $nom, int $nbetoile, string $ville, string $adresse, string $codepostal) {
        $this->_nom = $nom;
        $this->_nbetoile = $nbetoile;
        $this->_ville = $ville;
        $this->_adresse = $adresse;
        $this->_codepostal = $codepostal;

        
    }

    // --- GETTERS ---
    public function getNom(): string { return $this->_nom; }
    public function getNbEtoiles(): int { return $this->_nbetoile; }
    public function getVille(): string { return $this->_ville; }
    public function getAdresse(): string { return $this->_adresse; }
    public function getCodePostal(): string { return $this->_codepostal; }
    public function getChambres(): array { return $this->_chambres; }
    

    // --- GESTION DES CHAMBRES ---
    public function ajouterChambre(Chambre $chambre): void {
        $this->_chambres[] = $chambre; 
    }

    public function getNbChambres(): int {
        return count($this->_chambres); 
    }

//fonction en cours de création, non fini, true dispo, false reserve

 public function getEtat(): array {
    $chambrereserve = 0;
    $chambrelibre = 0; 

    foreach ($this->_chambres as $chambre) {
        if ($chambre->getEtat() === true) {
           $chambrelibre++;
        } else {
           $chambrereserve++;
        }
    }

    return [
        'disponible' => $chambrelibre,
        'reservee' => $chambrereserve
    ];
}


    // public function getNbChambresReservees(): int {
    //     $count = 0;
    //     foreach ($this->_chambres as $chambre) {
    //         if (!$chambre->getEtat()) $count++;
    //     }
    //     return $count;
    // }

    // public function getNbChambresDisponibles(): int {
    //     $count = 0;
    //     foreach ($this->_chambres as $chambre) { 
    //         if ($chambre->getEtat()) $count++;
    //     }
    //     return $count;
    // }

   
    public function getReservClient(): array {
        $map = [];

        foreach ($this->_chambres as $_chambre) {
            $reservations = $_chambre->getReservations();

            if (!is_array($reservations)) {
                continue; // sécurité
            }

            foreach ($reservations as $resa) {
                
                $nom = method_exists($resa, 'getNomReservation') ? $resa->getNomReservation() : '';
                $prenom = method_exists($resa, 'getPrenomReservation') ? $resa->getPrenomReservation() : '';
                $key = strtolower(trim($nom . ' ' . $prenom));

                if ($key === '') $key = '__inconnu__';

                if (!isset($map[$key])) {
                    $map[$key] = [];
                }
                $map[$key][] = $resa;
            }
        }

        return $map;
    }

   
    public function getReservationsForClient(string $nom, string $prenom): array {
        $key = strtolower(trim($nom . ' ' . $prenom));
        $all = $this->getReservClient();
        return $all[$key] ?? [];
    }

   
    public function afficherReservationsClient(string $nom, string $prenom): void {
        $reservations = $this->getReservationsForClient($nom, $prenom);

        echo "<h3>Réservations pour {$prenom} {$nom} — Hôtel {$this->_nom}</h3>";

        if (empty($reservations)) {
            echo "<p>Aucune réservation trouvée pour {$prenom} {$nom}.</p>";
            return;
        }

        echo "<ul>";
        foreach ($reservations as $resa) {
            if (method_exists($resa, '__toString')) {
                echo "<li>{$resa}</li>";
            } else {
                $debut = method_exists($resa, 'getDateDebut') ? $resa->getDateDebut()->format('d-m-Y') : 'N/A';
                $fin   = method_exists($resa, 'getDateFin')   ? $resa->getDateFin()->format('d-m-Y')   : 'N/A';
                echo "<li>Du {$debut} au {$fin}</li>";
            }
        }
        echo "</ul>";
    }

    
    public function afficherInfos(): void {
        $etoiles = str_repeat("⭐", $this->_nbetoile);
        $etat = $this->getEtat();
        echo "<h2>{$this->_nom} {$etoiles} - {$this->_ville}</h2>";
        echo "<p>{$this->_adresse}, {$this->_codepostal} {$this->_ville}</p>";
        echo "<p><strong>Nombre total de chambres :</strong> {$this->getNbChambres()}</p>";
        // echo "<p><strong>Chambres réservées :</strong> {$this->getNbChambresReservees()}</p>";
        // echo "<p><strong>Chambres disponibles :</strong> {$this->getNbChambresDisponibles()}</p>";
        

        echo "<p><strong>Chambres disponibles :</strong> {$etat['disponible']} - <strong>Chambres réservées :</strong> {$etat['reservee']}</p>";

    }

   
    public function __toString(): string {
        return "{$this->_nom} ({$this->_ville}, {$this->_nbetoile}*)";
    }
}

?>

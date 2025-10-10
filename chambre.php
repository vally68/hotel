<?php

class chambre {
    
     
    private int $prix;
    private int $nbchambre;
    private bool $wifi;
    private bool $etat; // true = DISPONIBLE, false = RÉSERVÉE
    

    public function __construct(int $prix, int $nbchambre, bool $wifi, bool $etat) {
        $this->prix = $prix;
        $this->nbchambre = $nbchambre;
        $this->wifi = $wifi;
        $this->etat = $etat;
    }

    
    public function getPrix(): int { return $this->prix; }
    public function getWifi(): bool { return $this->wifi; }
    public function getNbchambre(): int { return $this->nbchambre; }
    public function getEtat(): bool { return $this->etat; }

    
    
    public function AfficherStatutChambre(): void {
        $etat_texte = $this->etat ? 'DISPONIBLE' : 'RÉSERVÉE';
        $etat_classe = $this->etat ? 'disponible' : 'reservée';
        $wifi_classe = $this->wifi ? '<span class="wifi-icon">&#128246;</span>' : ''; 
        echo '<tr class="room-row">';
        echo '    <td class="col-chambre">Chambre ' . $this->nbchambre . '</td>';
        echo '    <td class="col-prix">' . $this->prix . ' €</td>';
        echo '    <td class="col-wifi">' . $wifi_classe . '</td>';
        echo '    <td class="col-etat">';
        echo '        <span class="' . $etat_classe . '">' . $etat_texte . '</span>';
        echo '    </td>';
        echo '</tr>';
    }
}
?>
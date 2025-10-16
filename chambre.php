<?php

class Chambre {
    private int $_prix;
    private int $_nbchambre;
    private bool $_wifi;
    private bool $_etat; // true = DISPONIBLE, false = RÉSERVÉE
    private array $_reservations = []; // tableau de réservations

    public function __construct(int $_prix, int $_nbchambre, bool $_wifi, bool $_etat) {
        $this->_prix = $_prix;
        $this->_nbchambre = $_nbchambre;
        $this->_wifi = $_wifi;
        $this->_etat = $_etat;
    }

    public function getPrix(): int { return $this->_prix; }
    public function getWifi(): bool { return $this->_wifi; }
    public function getNbchambre(): int { return $this->_nbchambre; }
    public function getEtat(): bool { return $this->_etat; }
    public function getReservations(): array { return $this->_reservations; }

    public function ajouterReservation(Reservation $reservation): void {
        $this->_reservations[] = $reservation;
        $this->_etat = false; // la chambre devient réservée
    }

    public function afficherStatutChambre(): void {
        $etat_texte = $this->_etat ? 'DISPONIBLE' : 'RÉSERVÉE';
        $etat_classe = $this->_etat ? 'disponible' : 'reservée';
        $wifi_classe = $this->_wifi ? '<span class="wifi-icon">&#128246;</span>' : ''; 

        echo '<tr class="room-row">';
        echo '    <td class="col-chambre">Chambre ' . $this->_nbchambre . '</td>';
        echo '    <td class="col-prix">' . $this->_prix . ' €</td>';
        echo '    <td class="col-wifi">' . $wifi_classe . '</td>';
        echo '    <td class="col-etat">';
        echo '        <span class="' . $etat_classe . '">' . $etat_texte . '</span>';
        echo '    </td>';
        echo '</tr>';
    }
  
}
?>

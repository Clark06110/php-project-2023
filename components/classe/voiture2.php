<?php
require_once 'vehicule.php';

class Voiture implements vehicule {
    private $_marque;
    private $_immatriculation;
    private $_prix;

    public function set_marque($newMarque) {
        $this->_marque = $newMarque;
    }
    public function set_immatriculation($newImmatriculation) {
        $this->_immatriculation = $newImmatriculation;
    }
    public function set_Prix($newPrix) {
        $this->_prix = $newPrix;
    }
    public function get_informations() {
        echo 'Voiture ' . $this->_marque . ', d\'immatriculation ' . $this->_immatriculation . '<br>';
    }

    public function demarrer() {
        echo "La ". $this->_marque . " démarre <br>";
    }
    public function rouler() {
        echo "La ". $this->_marque . " roule <br>";
    }
    public function stopper() {
        echo "La ". $this->_marque . " stoppe <br>";
    }

    
    public function __construct($marque, $immatriculation, $prix) {
        $this->_marque = $marque;
        $this->_immatriculation = $immatriculation;
        $this->_prix = $prix;
    }

    public function __destruct() {
        echo "Desctruction de voitures<br>";
    }
    
}

?>